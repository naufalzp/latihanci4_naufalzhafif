<?php

		namespace App\Controllers;

		use App\Models\userModel;
		use CodeIgniter\Email\Email;
		
		class AuthController extends BaseController
		{
			protected $email;
		    protected $user;

		    function __construct()
		    {
		        helper('form');
				helper('text');
				$this->validation = \Config\Services::validation();

		        $this->user = new userModel();
				// Load the email library
				$this->email = \Config\Services::email();
				
				// Set up your email configuration
				$this->email->initialize([
					'protocol' => 'smtp',
					'SMTPHost' => 'smtp.gmail.com',
					'SMTPPort' => '587',
					'SMTPUser' => 'naufalarya0@gmail.com',
					'SMTPPass' => 'lirehiiozdnshakt',
					'mailType' => 'html',
					'charset' => 'utf-8',
					'newline' => "\r\n"
				]);
				
		    }

		    public function login()
		    {
		        if ($this->request->getPost()) {
		            $username = $this->request->getVar('username');
		            $password = $this->request->getVar('password');

		            $dataUser = $this->user->where(['username' => $username])->first();
					
		            if ($dataUser) {
						if($dataUser['isActive']==1){
							if (md5($password) == $dataUser['password']) {
								session()->set([
									'user_id' => $dataUser['id'],
									'username' => $dataUser['username'],
									'role' => $dataUser['role'],
									'isLoggedIn' => TRUE
								]);
	
								return redirect()->to(base_url('/'));
							} else {
								session()->setFlashdata('failed', 'Username & password incorrect.');
								return redirect()->back();
							}
						} else {
							session()->setFlashdata('failed', "Please verify your account using the code sent to your email.");
							return redirect()->to(base_url('/validate-code'));
						}
		            } else {
		                session()->setFlashdata('failed', "Username doesn't exists.");
		                return redirect()->back();
		            }
		        } else {
		            return view('login_view');
		        }
		    }
			public function register()
			{
				if ($this->request->getPost()) {
					$username = $this->request->getVar('username');
					$password = $this->request->getVar('password');
					$email = $this->request->getVar('email');

					$data = $this->request->getPost();
					$validate = $this->validation->run($data, 'reg');
					$errors = $this->validation->getErrors();
					if($errors){
						session()->setFlashdata('failed', implode("<br>",$errors));
						return redirect()->back();
					}
					$existingUser = $this->user->where(['username' => $username])->first();
					$existingEmail = $this->user->where(['email' => $email])->first();
			
					if ($existingUser) {
						session()->setFlashdata('failed', 'Username already exists.');
						return redirect()->back();
					}

					if ($existingEmail) {
						session()->setFlashdata('failed', 'Email already used.');
						return redirect()->back();
					}

					$validationCode = random_string('numeric', 6); // Generate a unique code here
					$this->sendValidationEmail($email,$validationCode);
					$hashPw = md5($password);
					
					$this->user->insert([
						'username' => $username,
						'password' => $hashPw,
						'email' => $email,
						'role' => 'user',
						'vcode' => $validationCode
					]);
					session()->setFlashdata('failed', "Please verify your account using the code sent to your email.");
					session()->setFlashdata('success', 'Registration successful.');
					return redirect()->to(base_url('/validate-code'));
				} else {
					return view('register_view');
				}
			}
			public function sendValidationEmail($email,$validationCode)
        	{
				$this->email->setFrom('naufalarya0@gmail.com', 'Toko Keren');
				$this->email->setTo("$email");
				$this->email->setSubject('Account Validation');
				$this->email->setMessage('Please use the following code to validate your account: <b>' . $validationCode.'</b>');
		
				// Send the email
				if ($this->email->send()) {
					echo 'Email sent successfully!';
				} else {
					echo $this->email->printDebugger();
				}
        	}
			public function validateCode()
			{
				if ($this->request->getPost()) {
					$code = implode('', $this->request->getPost('code'));

					// Retrieve the user's data based on the provided validation code
					$user = $this->user->where(['vcode' => $code])->first();

					if ($user) {
						// Update the user's 'isActive' column to activate the account
						$this->user->update($user['id'], ['isActive' => 1]);

						session()->setFlashdata('success', 'Account validation successful. You can now log in.');
						return redirect()->to(base_url('/login'));
					} else {
						session()->setFlashdata('failed', 'Invalid validation code.');
						return redirect()->back();
					}
				} else {
					return view('validate_code_view');
				}
			}

		    public function logout()
		    {
		        session()->destroy();
		        return redirect()->to('login');
		    }
		}