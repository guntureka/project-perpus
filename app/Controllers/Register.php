<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Register extends BaseController
{
    public function index()
    {
        return view('pages/auth/register');
    }

    public function create()
    {
        helper(['form']);

        if ($this->request->getMethod() == "post") {

            $rules = [
                'name' => [
                    'rules' => 'required|min_length[3]|max_length[20]',
                    'errors' => [
                        'required' => 'Name is required',
                        'min_length' => 'Name is too short',
                        'max_length' => 'Name is too long',
                    ],
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[tb_users.email]',
                    'errors' => [
                        'required' => 'Email is required',
                        'valid_email' => 'Email is not valid',
                        'is_unique' => 'Email has already registered',
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
                        'required' => 'Password Confirm is required',
                        'matches' => 'Password Confirm is not match',
                    ],
                ],
                'user_img' => [
                    'rules' => 'uploaded[user_img]|max_size[user_img,10240]|is_image[user_img]',
                    'errors' => [
                        'uploaded' => 'Photo is required',
                        'max_size' => 'Photo is too big',
                        'is_image' => 'Photo is not valid',
                    ],
                ],
            ];

            if (!$this->validate($rules)) {
                $errors = $this->validator->getErrors();
                $errors = implode('<br>', $errors);
                session()->setFlashdata('errors', $errors);
                return redirect()->to('/register')->withInput();
            } else {
                $userModel = new UsersModel();

                $name = $this->request->getVar('name');
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $user_img = $this->request->getFile('user_img');

                $userImgName = $user_img->getRandomName();
                $user_img->move('img/profile', $userImgName);

                $data = [
                    'name' => $name,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'user_img' => $userImgName,
                ];

                $userModel->insert($data);

                session()->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/login');
            }
        } else {
            return redirect()->to('/register');
        }
    }
}
