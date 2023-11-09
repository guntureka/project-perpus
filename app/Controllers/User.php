<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;

class User extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

     use ResponseTrait;
    
    public function index()
    {
        //
        $userModel = new UsersModel();

        $data['users'] = $userModel->findAll();

        return view('pages/dashboard/user/show_user', $data);

        // $response = [
        //     'status' => 200,
        //     'error' => null,
        //     'messages' => "Success Get Users",
        //     "data" => $data['users'],
        // ];
        // return $this->respond($response);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
        return view('pages/dashboard/user/add_user');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
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
                'is_admin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role is required',
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
                $isAdmin = $this->request->getVar('is_admin');

                $userImgName = $user_img->getRandomName();
                $user_img->move('img/profile', $userImgName);

                $data = [
                    'name' => $name,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'user_img' => $userImgName,
                    'is_admin' => $isAdmin,
                ];

                $userModel->insert($data);

                session()->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/user');
            }
        } else {

            session()->setFlashdata('error', 'Failed Registration');
            return redirect()->to('/user/add');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        $userModel = new UsersModel();

        $data['user'] = $userModel->find($id);

        return view('pages/dashboard/user/edit_user', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
         helper(['form']);
        if ($this->request->getMethod() == 'post') {
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
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'valid_email' => 'Email is not valid',
                    ],
                ],
                // 'password' => [
                //     'rules' => 'required|min_length[8]',
                //     'errors' => [
                //         'required' => 'Password is required',
                //         'min_length' => 'Password is too short',
                //     ],
                // ],
                // 'password_confirm' => [
                //     'rules' => 'required|matches[password]',
                //     'errors' => [
                //         'required' => 'Password Confirm is required',
                //         'matches' => 'Password Confirm is not match',
                //     ],
                // ],
                'user_img' => [
                    'rules' => 'max_size[user_img,10240]|is_image[user_img]',
                    'errors' => [
                        'max_size' => 'Photo is too big',
                        'is_image' => 'Photo is not valid',
                    ],
                ],
            ];

            if (!$this->validate($rules)) {
                dd($this->validator->listErrors());
                return redirect()->to('/profile/edit/' . $id)->withInput();
            } else {
                $userModel = new UsersModel();

                $name           = $this->request->getVar('name');
                $email          = $this->request->getVar('email');
                $user_img       = $this->request->getFile('user_img');
                $isAdmin        = $this->request->getVar('is_admin');

                //handling email update
                $oldEmail = $userModel->where('user_id', $id)->first()['email'];
                if ($oldEmail == $email) {
                    $email = $oldEmail;
                } else {
                    if ($userModel->where('email', $email)->first()) {
                        session()->setFlashdata('error', 'Email has already registered');
                        return redirect()->to('/profile/edit/' . $id)->withInput();
                    }
                }

                //handling img upload
                $oldImgName = $userModel->where('user_id', $id)->first()['user_img'];
                $userImgName = $user_img->getName();
                if ($user_img->getError() == 4) {
                    $userImgName = $oldImgName;
                } else {
                    if ($oldImgName != 'default.jpg') {
                        unlink('img/profile/' . $oldImgName);
                    }
                    $userImgName = $user_img->getRandomName();
                    $user_img->move('img/profile', $userImgName);
                }

                $data = [
                    'name' => $name,
                    'email' => $email,
                    'user_img' => $userImgName,
                    'is_admin' => $isAdmin,
                ];

                $userModel->update($id, $data);

                session()->setFlashdata('success', 'Successfuly update user');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('error', 'Failed update user');
            return redirect()->to('/user/edit/' . $id);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $userModel = new UsersModel();

        unlink('img/profile/' . $userModel->find($id)['user_img']);

        $userModel->delete($id);

        session()->setFlashdata('success', 'Successful Delete');
        return redirect()->to('/user');
    }

    public function updatePassword($id = null)
    {
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $userModel = new UsersModel();

            $rules = [
                'new_password' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password is too short',
                    ],
                ],
                'password_confirm' => [
                    'rules' => 'required|matches[new_password]',
                    'errors' => [
                        'required' => 'Password Confirm is required',
                        'matches' => 'Password Confirm is not match',
                    ],
                ],
            ];

            if (!$this->validate($rules)) {
                dd($this->validator->listErrors());
                return redirect()->to('/profile/edit/' . $userModel['user_id'])->withInput();
            } else {
                $userModel = new UsersModel();

                $new_password       = $this->request->getVar('new_password');

                $data = [
                    'password' => password_hash($new_password, PASSWORD_DEFAULT),
                ];

                $userModel->update($id, $data);

                session()->setFlashdata('success', 'Successfuly update password');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('error', 'Failed update password');
            return redirect()->to('/user/edit/' . $id);
        }
    }
}