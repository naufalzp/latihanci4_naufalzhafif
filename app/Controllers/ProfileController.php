<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\TransaksiModel;


class ProfileController extends BaseController
{
    protected $account;
    function __construct(){
        helper('form');
        $this->account = new UserModel();
    }
    public function accountSettings()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        $userId = session()->get('user_id');
        $user = $this->account->find("$userId");
        $data['accounts'] = $user;
        return view('account_settings_view',$data);
    }

    public function updatePassword()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
    
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');
    
        $userId = session()->get('user_id');
        $user = $this->account->find($userId);
        $dbPassword = $user['password'];
    
        if (md5("$currentPassword") !== $dbPassword) {
            session()->setFlashdata('failed', 'Current password is incorrect.');
            return redirect()->to('/account-settings');
        }
    
        if ($newPassword !== $confirmPassword) {
            session()->setFlashdata('failed', 'New password and confirm password do not match.');
            return redirect()->to('/account-settings');
        }
        
        $newHashedPassword = md5("$newPassword");
        $this->account->update($userId, ['password' => $newHashedPassword]);
    
        session()->setFlashdata('success', 'Password updated successfully.');
        return redirect()->to('/account-settings');
    }
    
    public function updateEmail()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($this->request->getPost()) {
            $userId = session()->get('user_id');

            $newEmail = $this->request->getVar('new_email');
            $dataForm = [
                'email' => $newEmail
            ];
            
            $this->account->update($userId,$dataForm);
            session()->setFlashdata('success', 'Email updated successfully.');

            return redirect()->to('/account-settings');
        } else {
            return redirect()->to('/account-settings');
        }
    }
    public function transactionHistory()
    {
        $username = session()->get('username');
    
        $modelTransaksi = new TransaksiModel();
    
        $transactions = $modelTransaksi->where('username', $username)->findAll();
    
        return view('transaction_history_view', ['transactions' => $transactions]);
    }
    
}
