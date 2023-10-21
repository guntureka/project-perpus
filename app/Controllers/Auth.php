<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
    public function index(): string
    {
        helper(['form']);
        return view('pages/login');
    }

    public function loginAuth(){
        $session = session();

        $userModel = new UsersModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);

            if($verify_pass){
                $ses_data = [
                    'user_id' => $data['user_id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'logged_in' => TRUE
                ];

                $session->set($ses_data);
                $session->setFlashdata('success', 'Welcome Back '.$data['name'].'!');
                return redirect()->to('/');
            }else{
                $session->setFlashdata('error', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('error', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
