<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
    public function index(): string
    {
        helper(['form']);
        return view('pages/auth/login');
    }

    public function loginAuth()
    {
        $session = session();

        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Email is not valid',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password is too short',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            $errors = implode('<br>', $errors);
            session()->setFlashdata('errors', $errors);
            return redirect()->to('/login');
        }

        $userModel = new UsersModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {
                $ses_data = [
                    'user_id' => $data['user_id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'is_admin' => $data['is_admin'],
                    'logged_in' => TRUE
                ];

                $session->set($ses_data);
                $session->setFlashdata('success', 'Welcome Back ' . $data['name'] . '!');
                if($data['is_admin'] == '1')
                    return redirect()->to('/book');
                else return redirect()->to('/');
            } else {
                $session->setFlashdata('error', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/login');
    }

    public function forgotPassword(){
        return view('pages/auth/forgot_password');
    }

    public function changePassword(){
        helper(['form']);

        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Email is not valid',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password is too short',
                ],
            ],
            'password_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password confirmation is required',
                    'matches' => 'Password confirmation is not match',
                ],
            ],
        ];

        if(!$this->validate($rules)){
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->to('/forgot-password');
        }else{
            $userModel = new UsersModel();

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $data = $userModel->where('email', $email)->first();

            if(!$data){
                session()->setFlashdata('error', 'Email not Found');
                return redirect()->to('/forgot-password');
            }else{
                $userModel->update($data['user_id'], ['password' => password_hash($password, PASSWORD_DEFAULT)]);
                session()->setFlashdata('success', 'Password Changed');
                return redirect()->to('/login');
            }
        }
    }
}
