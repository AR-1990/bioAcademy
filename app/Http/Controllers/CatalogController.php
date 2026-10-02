<?php

namespace App\Http\Controllers;

use App\Mail\CatalogFormNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CatalogController extends Controller
{
    public function index()
    {
        return view('university.catalog');
    }

    public function download(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:20',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'required|email|max:190',
            'communication' => 'required|in:email,none',
        ]);

        $email = strtolower(trim($validated['email']));

        try {
            DB::beginTransaction();

            $user = User::whereRaw('LOWER(email) = ?', [$email])->first();

            if (! $user) {
                $user = new User();
                $user->status = 'Not contacted';
                $user->gender = '-';
                $user->city = '-';
                $user->state = '-';
                $user->country = '-';
                $user->postal_code = 0;
                $user->source = User::SOURCE_WEBSITE;
                $user->is_enrolled = 0;
                $user->role = 2;
            }

            $user->first_name = $validated['first_name'];
            $user->last_name = $validated['last_name'];
            $user->email = $email;
            $user->phone_number = ! empty($validated['phone']) ? $validated['phone'] : ($user->phone_number ?: '-');
            $user->address_line = ! empty($validated['address']) ? $validated['address'] : ($user->address_line ?: '-');
            $user->save();

            if (! $user->wasRecentlyCreated && ! $user->wasChanged()) {
                $user->touch();
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Catalog form lead save failed', ['error' => $e->getMessage()]);

            return redirect()
                ->route('university.catalog')
                ->withInput()
                ->with('error_message', 'Lead could not be saved. Please try again.');
        }

        try {
            Mail::to([
                'rkoenning@biopharmainfo.net',
                'navaid@biopharmainfo.net',
                'abdurrehmanashraf.ghazitech@gmail.com',
            ])->send(new CatalogFormNotification([
                'title' => $validated['title'] ?? null,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $email,
                'phone' => $validated['phone'] ?? null,
                'address' => $validated['address'] ?? null,
                'communication' => $validated['communication'],
            ]));
        } catch (\Throwable $e) {
            Log::error('Catalog form email notification failed', ['error' => $e->getMessage()]);
        }

        return $this->file();
    }

    public function file()
    {
        $candidatePaths = [
            public_path('Biopharma-Academy-Program-Catalog.pdf'),
            public_path('Biopharma Academy — Program Catalog Version 1.0 1.pdf'),
        ];

        $pdfPath = null;

        foreach ($candidatePaths as $candidatePath) {
            if (file_exists($candidatePath)) {
                $pdfPath = $candidatePath;
                break;
            }
        }

        if (! $pdfPath) {
            Log::error('Catalog PDF file not found', ['paths' => $candidatePaths]);

            return redirect()
                ->route('university.catalog')
                ->with('error_message', 'Catalog file is not available right now. Please try again shortly.');
        }

        return response()->download($pdfPath, 'Biopharma-Academy-Program-Catalog.pdf');
    }
}
