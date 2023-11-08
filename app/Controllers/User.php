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
                    //'user_img' => $userImgName,
                    'is_admin' => $isAdmin,
                ];

                $userModel->insert($data);

                session()->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/user');
                // $response = [
                //     'status' => 200,
                //     'error' => null,
                //     'messages' => "Success Registration",
                //     "data" => $data,
                // ];
                // return $this->respond($response);
            }
        } else {

            session()->setFlashdata('error', 'Failed Registration');
            return redirect()->to('/user/add');

            // $response = [
            //     'status' => 400,
            //     'error' => null,
            //     'messages' => "Failed Registration",
            //     "data" => null,
            // ];
            // return $this->respond($response);
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
}
