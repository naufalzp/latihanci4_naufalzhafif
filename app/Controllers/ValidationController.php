<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ValidationController extends BaseController
{
        public function sendValidationEmail()
        {
				helper('text');

            // Load the email library
            $email = \Config\Services::email();
            
            // Set up your email configuration
            $email->initialize([
                'protocol' => 'smtp',
                'SMTPHost' => 'smtp.gmail.com',
                'SMTPPort' => '587',
                'SMTPUser' => 'naufalarya0@gmail.com',
                'SMTPPass' => 'lirehiiozdnshakt',
                'mailType' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            ]);
    
            // Generate a validation code
				$validationCode = random_string('numeric', 6); // Generate a unique code here

    
            // Prepare email content
            $email->setFrom('naufalarya0@gmail.com', 'Musuh Anda');
            $email->setTo('aurelwyt@gmail.com');
            $email->setSubject('Account Validation');
            $email->setMessage('Please use the following code to validate your account: <b>' . $validationCode.'</b>');
    
            // Send the email
            if ($email->send()) {
                echo 'Email sent successfully!';
            } else {
                echo $email->printDebugger();
            }
        }
    
    
}
