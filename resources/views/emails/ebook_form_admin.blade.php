<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>New Ebook Lead - Biopharma Academy</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6fa; font-family: 'Segoe UI', Arial, Helvetica, sans-serif;">

<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#f4f6fa; padding:30px 0;">
  <tr>
    <td align="center">

      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:640px;">

        <!-- HEADER -->
        <tr>
          <td style="background:#1c3866; background:linear-gradient(90deg,#1c3866 0%,#284e8d 100%); border-radius:12px 12px 0 0; padding:22px 36px;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
              <tr>
                <td style="vertical-align:middle;">
                  <img src="https://biopharmaacademy.com/admin/images/academy-logo-white.png"
                       alt="Biopharma Academy"
                       width="180"
                       style="display:block; max-width:180px; height:auto; line-height:0; border:0; outline:none; text-decoration:none; color:#ffffff;">
                </td>
                <td style="vertical-align:middle; text-align:right;">
                  <span style="display:inline-block; background:#ffffff; color:#1c3866; padding:7px 14px; border-radius:20px; font-size:11px; font-weight:700; letter-spacing:0.8px;">
                    NEW LEAD
                  </span>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- CONTENT -->
        <tr>
          <td style="background:#ffffff; padding:32px 40px 8px 40px;">
            <h1 style="margin:0 0 8px 0; font-size:22px; color:#1c3866; font-weight:700; line-height:1.3;">
              New {{ $leadDetails['form_type'] ?? 'Ebook Form' }} Lead
            </h1>
            <p style="margin:0 0 20px 0; font-size:14px; color:#4a5568; line-height:1.6;">
              A new lead has submitted the ebook download form. Details are below.
            </p>

            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                   style="border:1px solid #e6ebf3; border-radius:10px; overflow:hidden;">
              <tr>
                <td style="padding:14px 20px; background:#f8fafc; border-bottom:1px solid #e6ebf3; width:150px; font-size:13px; color:#54607a; font-weight:600;">
                  Form Type
                </td>
                <td style="padding:14px 20px; border-bottom:1px solid #e6ebf3; font-size:14px;">
                  <span style="display:inline-block; padding:5px 12px; background:#e8f0fe; color:#1c3866; border-radius:20px; font-weight:700; font-size:12px;">
                    {{ $leadDetails['form_type'] ?? '—' }}
                  </span>
                </td>
              </tr>
              <tr>
                <td style="padding:14px 20px; background:#f8fafc; border-bottom:1px solid #e6ebf3; font-size:13px; color:#54607a; font-weight:600;">
                  Name
                </td>
                <td style="padding:14px 20px; border-bottom:1px solid #e6ebf3; font-size:14px; color:#1a202c; font-weight:600;">
                  {{ $leadDetails['name'] ?? '—' }}
                </td>
              </tr>
              <tr>
                <td style="padding:14px 20px; background:#f8fafc; border-bottom:1px solid #e6ebf3; font-size:13px; color:#54607a; font-weight:600;">
                  Email
                </td>
                <td style="padding:14px 20px; border-bottom:1px solid #e6ebf3; font-size:14px; color:#1a202c;">
                  <a href="mailto:{{ $leadDetails['email'] ?? '' }}" style="color:#284e8d; text-decoration:none;">
                    {{ $leadDetails['email'] ?? '—' }}
                  </a>
                </td>
              </tr>
              <tr>
                <td style="padding:14px 20px; background:#f8fafc; border-bottom:1px solid #e6ebf3; font-size:13px; color:#54607a; font-weight:600;">
                  Phone
                </td>
                <td style="padding:14px 20px; border-bottom:1px solid #e6ebf3; font-size:14px; color:#1a202c;">
                  @if(!empty($leadDetails['phone']))
                    <a href="tel:{{ $leadDetails['phone'] }}" style="color:#284e8d; text-decoration:none;">
                      {{ $leadDetails['phone'] }}
                    </a>
                  @else
                    <span style="color:#a0aec0;">Not provided</span>
                  @endif
                </td>
              </tr>
              <tr>
                <td style="padding:14px 20px; background:#f8fafc; font-size:13px; color:#54607a; font-weight:600;">
                  Submitted
                </td>
                <td style="padding:14px 20px; font-size:14px; color:#1a202c;">
                  {{ date('F j, Y \a\t g:i A') }}
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <tr>
          <td style="background:#ffffff; padding:22px 40px 34px 40px;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
              <tr>
                <td align="center">
                  <a href="https://biopharmaacademy.com/admin/ebook-downloads"
                     target="_blank" rel="noopener"
                     style="display:inline-block; padding:12px 22px; background:#1c3866; color:#ffffff; text-decoration:none; font-weight:700; font-size:13px; border-radius:8px;">
                    View all Ebook Leads in Admin &rarr;
                  </a>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- FOOTER -->
        <tr>
          <td style="background:#eef2f8; border-radius:0 0 12px 12px; padding:20px 36px;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
              <tr>
                <td style="font-size:12px; color:#6b778c; line-height:1.6; text-align:center;">
                  &copy; {{ date('Y') }} Biopharma Academy &bull; Automated notification from
                  <a href="https://biopharmaacademy.com/" style="color:#284e8d; text-decoration:none;">biopharmaacademy.com</a>
                </td>
              </tr>
            </table>
          </td>
        </tr>

      </table>
    </td>
  </tr>
</table>

</body>
</html>
