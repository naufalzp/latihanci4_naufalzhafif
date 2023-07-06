<?php

		namespace App\Controllers;
		use App\Models\UserModel;

		class AccountController extends BaseController
		{
			protected $account;

			function __construct()
			{
				helper('form');
				$this->validation = \Config\Services::validation();
				$this->account = new UserModel();
			}

			public function index()
			{
				$data['accounts'] = $this->account->findAll();
				return view('pages/account_view', $data);
			}

			public function create()
			{
				
			}

			public function edit($id)
			{
				$data = $this->request->getPost();
				if($data){
					if($data['roleKey']==false){
						$dataForm = [
							'isActive' => $this->request->getPost('isActive')
						];
					} else {
						$dataForm = [
							'email' => $this->request->getPost('email'),
							'role' => $this->request->getPost('role')
						];
					}
					$this->account->update($id, $dataForm);

					return redirect('account')->with('success','Data has been updated.');
				}else{
					return redirect('account')->with('failed','Data failed to update.');
				}
				
			}

			public function delete($id)
			{
				$dataAccount = $this->account->find($id);
				
				$this->account->delete($id);

				return redirect('account')->with('success','Data has been deleted.');
			}
		}