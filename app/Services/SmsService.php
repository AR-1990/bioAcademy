<?php

namespace App\Services;

use Twilio\Rest\Client;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class SmsService
{
    protected $twilio;
    protected $from;

    public function __construct()
    {
        $this->twilio = new Client(
            config('services.twilio.account_sid'),
            config('services.twilio.auth_token')
        );
        $this->from = config('services.twilio.phone_number');
    }

    /**
     * Validate if phone number is in proper E.164 format
     *
     * @param string $phoneNumber
     * @return bool
     */
    public function isValidE164($phoneNumber)
    {
        // E.164 format: + followed by 1-15 digits
        return preg_match('/^\+[1-9]\d{1,14}$/', $phoneNumber);
    }

    /**
     * Validate if phone number appears to be a mobile number
     *
     * @param string $phoneNumber
     * @return bool
     */
    public function isMobileNumber($phoneNumber)
    {
        // Remove + and country code for US numbers
        if (preg_match('/^\+1(\d{10})$/', $phoneNumber, $matches)) {
            $number = $matches[1];
            $areaCode = substr($number, 0, 3);
            
            // Common US mobile area codes (partial list)
            $mobileAreaCodes = [
                '201', '202', '203', '205', '206', '207', '208', '209', '210',
                '212', '213', '214', '215', '216', '217', '218', '219', '224',
                '225', '228', '229', '231', '234', '239', '240', '248', '251',
                '252', '253', '254', '256', '260', '262', '267', '269', '270',
                '276', '281', '301', '302', '303', '304', '305', '307', '308',
                '309', '310', '312', '313', '314', '315', '316', '317', '318',
                '319', '320', '321', '323', '325', '330', '331', '334', '336',
                '337', '339', '347', '351', '352', '360', '361', '386', '401',
                '402', '404', '405', '406', '407', '408', '409', '410', '412',
                '413', '414', '415', '417', '419', '423', '424', '425', '430',
                '432', '434', '435', '440', '443', '458', '469', '470', '475',
                '478', '479', '480', '484', '501', '502', '503', '504', '505',
                '507', '508', '509', '510', '512', '513', '515', '516', '517',
                '518', '520', '530', '540', '541', '551', '559', '561', '562',
                '563', '564', '567', '570', '571', '573', '574', '575', '580',
                '585', '586', '601', '602', '603', '605', '606', '607', '608',
                '609', '610', '612', '614', '615', '616', '617', '618', '619',
                '620', '623', '626', '630', '631', '636', '641', '646', '650',
                '651', '660', '661', '662', '667', '678', '682', '701', '702',
                '703', '704', '706', '707', '708', '712', '713', '714', '715',
                '716', '717', '718', '719', '720', '724', '727', '731', '732',
                '734', '737', '740', '747', '754', '757', '760', '763', '765',
                '770', '772', '773', '774', '775', '781', '785', '786', '801',
                '802', '803', '804', '805', '806', '808', '810', '812', '813',
                '814', '815', '816', '817', '818', '828', '830', '831', '832',
                '843', '845', '847', '848', '850', '856', '857', '858', '859',
                '860', '862', '863', '864', '865', '870', '872', '878', '901',
                '903', '904', '906', '907', '908', '909', '910', '912', '913',
                '914', '915', '916', '917', '918', '919', '920', '925', '928',
                '929', '931', '934', '936', '937', '940', '941', '947', '949',
                '951', '952', '954', '956', '959', '970', '971', '972', '973',
                '978', '979', '980', '984', '985', '989'
            ];
            
            return in_array($areaCode, $mobileAreaCodes);
        }
        
        // For non-US numbers, assume they're valid mobile numbers
        return true;
    }

    /**
     * Normalize phone number to E.164 format
     *
     * @param string $phoneNumber
     * @return string|null
     */
    public function normalizePhoneNumber($phoneNumber)
    {
        if (empty($phoneNumber)) {
            Log::warning('SMS Service: Empty phone number provided');
            return null;
        }

        $originalNumber = $phoneNumber;
        
        // First, trim whitespace and convert to string
        $phoneNumber = trim((string) $phoneNumber);
        
        Log::info('SMS Service: Normalizing phone number', [
            'original' => $originalNumber,
            'trimmed' => $phoneNumber
        ]);
        
        // Handle numbers that start with +
        if (strpos($phoneNumber, '+') === 0) {
            // Handle special case where number starts with + followed by space
            // e.g., "+1 8609048251" should become "+18609048251"
            if (preg_match('/^\+(\d{1,3})\s+(.+)/', $phoneNumber, $matches)) {
                $countryCode = $matches[1];
                $restOfNumber = preg_replace('/[^0-9]/', '', $matches[2]);
                $normalized = '+' . $countryCode . $restOfNumber;
                
                Log::info('SMS Service: Handled spaced international format', [
                    'original' => $originalNumber,
                    'normalized' => $normalized
                ]);
                
                return $normalized;
            }
            
            // For numbers that already start with + but may have formatting characters
             // e.g., "+1-860-904-8251" should become "+18609048251"
             $cleaned = preg_replace('/[^0-9+]/', '', $phoneNumber);
             
             // Only remove leading zeros if there are multiple zeros after country code
             // This prevents removing valid area codes that start with 0
             $cleaned = preg_replace('/^(\+\d{1,3})00+/', '$1', $cleaned);
            
            // Validate that it has at least country code + number
            if (strlen($cleaned) >= 8 && strlen($cleaned) <= 16) {
                Log::info('SMS Service: International format detected', [
                    'original' => $originalNumber,
                    'normalized' => $cleaned
                ]);
                return $cleaned;
            }
            
            Log::warning('SMS Service: Invalid international format - wrong length', [
                'original' => $originalNumber,
                'cleaned' => $cleaned,
                'length' => strlen($cleaned)
            ]);
            return null; // Invalid if too short or too long
        }
        
        // Remove all non-numeric characters for domestic numbers
        $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);
        
        // If it's a 10-digit US number, add +1
        if (strlen($cleaned) == 10) {
            $normalized = '+1' . $cleaned;
            Log::info('SMS Service: 10-digit US number normalized', [
                'original' => $originalNumber,
                'normalized' => $normalized
            ]);
            return $normalized;
        }
        
        // If it's an 11-digit number starting with 1, add +
        if (strlen($cleaned) == 11 && strpos($cleaned, '1') === 0) {
            $normalized = '+' . $cleaned;
            Log::info('SMS Service: 11-digit US number normalized', [
                'original' => $originalNumber,
                'normalized' => $normalized
            ]);
            return $normalized;
        }
        
        // If it's longer than 11 digits, assume it already has country code
        if (strlen($cleaned) > 11 && strlen($cleaned) <= 15) {
            $normalized = '+' . $cleaned;
            Log::info('SMS Service: Long international number normalized', [
                'original' => $originalNumber,
                'normalized' => $normalized
            ]);
            return $normalized;
        }
        
        // For other cases, assume US number and add +1
        if (strlen($cleaned) >= 7) {
            $normalized = '+1' . $cleaned;
            Log::info('SMS Service: Default US normalization applied', [
                'original' => $originalNumber,
                'normalized' => $normalized
            ]);
            return $normalized;
        }
        
        Log::error('SMS Service: Unable to normalize phone number', [
            'original' => $originalNumber,
            'cleaned' => $cleaned,
            'length' => strlen($cleaned)
        ]);
        
        return null;
    }

    /**
     * Send SMS message
     *
     * @param string $to
     * @param string $message
     * @return array
     */
    public function sendSms($to, $message)
    {
        try {
            Log::info('SMS Service: Starting SMS send process', [
                'original_phone' => $to,
                'message_length' => strlen($message)
            ]);
            
            // Normalize the phone number
            $normalizedPhone = $this->normalizePhoneNumber($to);
            
            if (!$normalizedPhone) {
                Log::error('SMS Service: Phone number normalization failed', [
                    'original_phone' => $to
                ]);
                return [
                    'success' => false,
                    'error' => 'Invalid phone number format - unable to normalize',
                    'original_phone' => $to
                ];
            }
            
            // Validate E.164 format
            if (!$this->isValidE164($normalizedPhone)) {
                Log::error('SMS Service: Phone number failed E.164 validation', [
                    'original_phone' => $to,
                    'normalized_phone' => $normalizedPhone
                ]);
                return [
                    'success' => false,
                    'error' => 'Phone number is not in valid E.164 format',
                    'original_phone' => $to,
                    'normalized_phone' => $normalizedPhone
                ];
            }
            
            // Check if it's a mobile number (for US numbers)
            if (!$this->isMobileNumber($normalizedPhone)) {
                Log::warning('SMS Service: Phone number may not be a mobile number', [
                    'original_phone' => $to,
                    'normalized_phone' => $normalizedPhone
                ]);
                // Continue anyway, but log the warning
            }
            
            Log::info('SMS Service: Sending SMS via Twilio', [
                'original_phone' => $to,
                'normalized_phone' => $normalizedPhone,
                'from_number' => $this->from
            ]);

            $options = [
                'body' => $message,
                'statusCallback' => URL::to('/twilio/status-callback')
            ];

            $messagingService = config('services.twilio.messaging_service_sid');
            if ($messagingService) {
                $options['messagingServiceSid'] = $messagingService;
            } else {
                $options['from'] = $this->from;
            }

            $message = $this->twilio->messages->create($normalizedPhone, $options);

            Log::info('SMS Service: SMS sent successfully', [
                'original_phone' => $to,
                'normalized_phone' => $normalizedPhone,
                'message_sid' => $message->sid,
                'status' => $message->status
            ]);

            return [
                'success' => true,
                'message_sid' => $message->sid,
                'status' => $message->status,
                'normalized_phone' => $normalizedPhone,
                'original_phone' => $to
            ];
        } catch (Exception $e) {
            Log::error('SMS Service: Twilio API error', [
                'original_phone' => $to,
                'normalized_phone' => $normalizedPhone ?? null,
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode()
            ]);
            
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'original_phone' => $to,
                'normalized_phone' => $normalizedPhone ?? null
            ];
        }
    }

    /**
     * Send greeting SMS to student
     *
     * @param string $to
     * @param string $studentName
     * @return array
     */
    public function sendStudentGreeting($to, $studentName = null)
    {
        // $message = "Thank you for showing interest in Biopharma Academy of Clinical Research! We’re excited to help you take your first step into the clinical research industry.\n\n";
        // $message .= "You can easily schedule a meeting with our team through this link: https://calendly.com/rkoenning-biopharmainfo/biopharma-academy\n\n";
        // $message .= "We look forward to connecting with you soon!\n\n";
        // $message .= "— Biopharma Academy Team";
        
        $message = "Thank you for showing interest in Biopharma Academy of Clinical Research! We’re excited to help you take your first step into the clinical research industry.\n\n";
        $message .= "You can easily schedule a meeting with our team by calling us on 361-219-6321"; 
        $message .= "We look forward to connecting with you soon!\n\n";
        $message .= "— Biopharma Academy Team";

        return $this->sendSms($to, $message);
    }
}
