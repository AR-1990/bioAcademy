<?php

namespace App\Http\Controllers;

use App\Mail\EbookDownloadUserEmail;
use App\Mail\EbookFormAdminNotification;
use App\Models\EbookDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EbookController extends Controller
{
    const DEFAULT_FORM_TYPE = 'Clinical Research Starter guide Form';
    const DEFAULT_PDF_FILE  = 'Clinical Research Excellence Starter Guide.pdf';
    const SITE_URL          = 'https://biopharmaacademy.com';

    public function index(Request $request)
    {
        $prefill = [
            'name'      => $request->query('name',  ''),
            'email'     => $request->query('email', ''),
            'phone'     => $request->query('phone', ''),
            'form_type' => $request->query('form_type', self::DEFAULT_FORM_TYPE),
        ];

        $downloadReady = false;
        $downloadUrl   = null;
        if (session('ebook_download_ready')) {
            $downloadReady = true;
            $file = session('ebook_download_file', self::DEFAULT_PDF_FILE);
            $downloadUrl = asset($file);
        }

        return view('university.ebook', compact('prefill', 'downloadReady', 'downloadUrl'));
    }

    public function download(Request $request)
    {
        $rules = [
            'name'      => [
                'required',
                'string',
                'min:2',
                'max:150',
                'regex:/^[\pL\s\-\.\']+$/u',
            ],
            'email'     => [
                'required',
                'string',
                'email:rfc,dns,filter',
                'max:190',
            ],
            'phone'     => [
                'required',
                'string',
                'max:30',
            ],
            'form_type' => [
                'nullable',
                'string',
                'max:150',
            ],
        ];

        $messages = [
            'name.required'  => 'Please enter your full name.',
            'name.min'       => 'Name must be at least 2 characters.',
            'name.max'       => 'Name cannot exceed 150 characters.',
            'name.regex'     => 'Name can only contain letters, spaces, hyphens, dots, and apostrophes.',

            'email.required' => 'Please enter your email address.',
            'email.email'    => 'Please enter a valid email address (e.g. name@example.com).',
            'email.max'      => 'Email cannot exceed 190 characters.',

            'phone.required' => 'Please enter your phone number.',
            'phone.max'      => 'Phone number cannot exceed 30 characters.',
        ];

        $validated = $request->validate($rules, $messages);

        $formType = !empty($validated['form_type'])
            ? $validated['form_type']
            : self::DEFAULT_FORM_TYPE;

        $name  = trim($validated['name']);
        $email = strtolower(trim($validated['email']));
        $phone = !empty($validated['phone']) ? trim($validated['phone']) : null;

        try {
            DB::beginTransaction();

            EbookDownload::create([
                'name'      => $name,
                'email'     => $email,
                'phone'     => $phone,
                'form_type' => $formType,
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Ebook download lead save failed: '.$e->getMessage(), [
                'name'  => $name,
                'email' => $email,
            ]);

            return redirect()
                ->route('university.ebook')
                ->withInput()
                ->with('error_message', 'We could not process your request. Please try again.');
        }

        $pdfPath = $this->resolvePdfPath($request);

        try {
            $adminRecipients = [
                // 'rkoenning@biopharmainfo.net',
                // 'navaid@biopharmainfo.net',
                'abdurrehmanashraf.ghazitech@gmail.com',
            ];

            Mail::to($adminRecipients)->send(new EbookFormAdminNotification([
                'name'      => $name,
                'email'     => $email,
                'phone'     => $phone,
                'form_type' => $formType,
            ]));
        } catch (\Throwable $e) {
            Log::error('Ebook form admin notification email failed: '.$e->getMessage());
        }

        try {
            Mail::to($email)->send(new EbookDownloadUserEmail([
                'name'      => $name,
                'email'     => $email,
                'phone'     => $phone,
                'form_type' => $formType,
            ], $pdfPath));
        } catch (\Throwable $e) {
            Log::error('Ebook user email failed: '.$e->getMessage());
        }

        if (! file_exists($pdfPath)) {
            Log::error('Ebook PDF not found at '.$pdfPath);

            return redirect()
                ->route('university.ebook')
                ->with('success_message', 'Thank you! Your ebook has been emailed to '.$email.'.');
        }

        $pdfAssetName = basename($pdfPath);

        return redirect()
            ->route('university.ebook')
            ->with([
                'success_message'         => 'Thank you! Your guide is ready. Your copy has also been emailed to '.$email.'.',
                'ebook_download_ready'    => true,
                'ebook_download_file'     => $pdfAssetName,
                'ebook_download_autourl'  => asset($pdfAssetName),
            ]);
    }

    public function adminIndex()
    {
        $ebookDownloads = EbookDownload::orderBy('created_at', 'desc')->get();

        return view('admin.ebook_downloads', compact('ebookDownloads'));
    }

    public function destroy(EbookDownload $ebookDownload)
    {
        $ebookDownload->delete();

        return response()->json(['status' => 'ok']);
    }

    protected function resolvePdfPath(Request $request): string
    {
        $candidate = trim((string) $request->input('pdf_file', ''));
        if ($candidate) {
            $path = public_path($candidate);
            if (file_exists($path)) {
                return $path;
            }
        }

        return public_path(self::DEFAULT_PDF_FILE);
    }
}
