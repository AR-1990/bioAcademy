<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Your Free Guide - Biopharma Academy</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6fa; font-family: 'Segoe UI', Arial, Helvetica, sans-serif;">

<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#f4f6fa; padding:30px 0;">
  <tr>
    <td align="center">

      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:640px;">

        <!-- BRAND HEADER BAR -->
        <tr>
          <td style="background:#1c3866; background:linear-gradient(90deg,#1c3866 0%,#284e8d 100%); border-radius:12px 12px 0 0; padding:28px 36px;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
              <tr>
                <td style="vertical-align:middle;">
                  <img src="https://biopharmaacademy.com/admin/images/academy-logo-white.png"
                       alt="Biopharma Academy"
                       width="220"
                       style="display:block; max-width:220px; height:auto; line-height:0; border:0; outline:none; text-decoration:none; color:#ffffff;">
                </td>
                <td style="vertical-align:middle; text-align:right; color:#ffffff; font-size:12px; opacity:0.92;">
                  <span style="display:block; font-weight:600; letter-spacing:0.5px;">BIOPHARMA ACADEMY</span>
                  <span style="display:block; margin-top:3px; opacity:0.85;">Clinical Research Excellence</span>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- HERO / THANK YOU BANNER -->
        <tr>
          <td style="background:#ffffff; padding:0;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
              <tr>
                <td style="padding:36px 40px 8px 40px;">
                  <h1 style="margin:0 0 12px 0; font-size:26px; line-height:1.25; color:#1c3866; font-weight:700;">
                    Thank you, {{ isset($data['name']) ? trim(explode(' ', $data['name'])[0]) : 'there' }}!
                  </h1>
                  <p style="margin:0; font-size:15px; line-height:1.65; color:#4a5568;">
                    Your complimentary copy of&nbsp;
                    <strong style="color:#1c3866;">{{ $data['form_type'] ?? 'Clinical Research Excellence Starter Guide' }}</strong>
                    &nbsp;is ready.
                  </p>
                </td>
              </tr>
              <tr>
                <td style="padding:0 40px;">
                  <hr style="border:0; border-top:1px solid #e6ebf3; margin:24px 0;" />
                </td>
              </tr>

              <!-- ATTACHMENT NOTICE CARD -->
              <tr>
                <td style="padding:0 40px 0 40px;">
                  <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                         style="background:#f0f5ff; border:1px solid #d6e3ff; border-radius:10px;">
                    <tr>
                      <td style="padding:18px 20px;">
                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                          <tr>
                            <td width="48" style="vertical-align:top; padding-right:14px;">
                              <div style="width:48px; height:48px; background:#1c3866; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                                <span style="font-family:Arial, sans-serif; font-size:22px; color:#ffffff; font-weight:700;">PDF</span>
                              </div>
                            </td>
                            <td style="vertical-align:middle;">
                              <div style="font-size:15px; font-weight:700; color:#1c3866; margin-bottom:4px;">
                                {{ $data['form_type'] ?? 'Clinical Research Excellence Starter Guide' }}
                              </div>
                              <div style="font-size:13px; color:#54607a;">
                                Attached to this email &bull; Please check your attachments.
                              </div>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- DETAILS -->
              <tr>
                <td style="padding:28px 40px 6px 40px;">
                  <p style="margin:0 0 16px 0; font-size:14px; line-height:1.7; color:#2d3748;">
                    We appreciate your interest in building a career in clinical research. This guide is our small
                    contribution to help you take the next step with confidence.
                  </p>
                  <p style="margin:0 0 14px 0; font-size:14px; line-height:1.7; color:#2d3748;">
                    Here are the details you submitted:
                  </p>
                </td>
              </tr>
              <tr>
                <td style="padding:0 40px;">
                  <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                         style="border:1px solid #e6ebf3; border-radius:10px; overflow:hidden;">
                    <tr>
                      <td style="padding:12px 18px; background:#f8fafc; border-bottom:1px solid #e6ebf3; width:140px; font-size:13px; color:#54607a; font-weight:600;">
                        Full Name
                      </td>
                      <td style="padding:12px 18px; border-bottom:1px solid #e6ebf3; font-size:14px; color:#1a202c;">
                        {{ $data['name'] ?? '—' }}
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:12px 18px; background:#f8fafc; border-bottom:1px solid #e6ebf3; font-size:13px; color:#54607a; font-weight:600;">
                        Email
                      </td>
                      <td style="padding:12px 18px; border-bottom:1px solid #e6ebf3; font-size:14px; color:#1a202c;">
                        {{ $data['email'] ?? '—' }}
                      </td>
                    </tr>
                    @if(!empty($data['phone']))
                    <tr>
                      <td style="padding:12px 18px; background:#f8fafc; font-size:13px; color:#54607a; font-weight:600;">
                        Phone
                      </td>
                      <td style="padding:12px 18px; font-size:14px; color:#1a202c;">
                        {{ $data['phone'] }}
                      </td>
                    </tr>
                    @endif
                  </table>
                </td>
              </tr>

              <!-- CTA -->
              <tr>
                <td style="padding:28px 40px 10px 40px; text-align:center;">
                  <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                      <td align="center">
                        <div style="margin-bottom:10px; font-size:14px; color:#2d3748;">
                          Ready to explore our programs?
                        </div>
                        <a href="https://biopharmaacademy.com/"
                           target="_blank" rel="noopener"
                           style="display:inline-block; padding:14px 28px; background:#1c3866; color:#ffffff; text-decoration:none; font-weight:700; font-size:14px; border-radius:8px; letter-spacing:0.3px;">
                          Visit Biopharma Academy &rarr;
                        </a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- SIGNATURE -->
              <tr>
                <td style="padding:30px 40px 32px 40px;">
                  <p style="margin:0 0 6px 0; font-size:14px; color:#2d3748; line-height:1.6;">
                    Best regards,
                  </p>
                  <p style="margin:0; font-size:15px; color:#1c3866; font-weight:700; line-height:1.4;">
                    The Biopharma Academy Team
                  </p>
                  <p style="margin:2px 0 0 0; font-size:13px; color:#54607a;">
                    <a href="https://biopharmaacademy.com/"
                       style="color:#284e8d; text-decoration:none;">https://biopharmaacademy.com</a>
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- FOOTER -->
        <tr>
          <td style="background:#eef2f8; border-radius:0 0 12px 12px; padding:22px 36px;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
              <tr>
                <td style="font-size:12px; color:#6b778c; line-height:1.6;">
                  &copy; {{ date('Y') }} Biopharma Academy of Clinical Research. All rights reserved.
                  <br />
                  This email was sent to&nbsp;
                  <span style="color:#284e8d;">{{ $data['email'] ?? '' }}</span>.
                  If you did not request this, please disregard.
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
