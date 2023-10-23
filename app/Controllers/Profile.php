<?php

namespace App\Controllers;

use App\Models\LoansModel;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;

class Profile extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
        session();
        $userModel = new UsersModel();
        $loanModel = new LoansModel();
        $data['loans'] = $loanModel->where('user_id', $id)->findAll();
        $data['user'] = $userModel->where('user_id', $id)->first();
        return view('pages/profile/profile', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
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
        $data['user'] = $userModel->where('user_id', $id)->first();
        return view('pages/profile/edit_profile', $data);
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
        if($this->request->getMethod() == 'post'){
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

            if(!$this->validate($rules)){
                dd($this->validator->listErrors());
                return redirect()->to('/profile/edit/'.$id)->withInput();
            }else{
                $userModel = new UsersModel();

                $name           = $this->request->getVar('name');
                $email          = $this->request->getVar('email');
                $user_img       = $this->request->getFile('user_img');

                //handling email update
                $oldEmail = $userModel->where('user_id', $id)->first()['email'];
                if($oldEmail == $email){
                    $email = $oldEmail;
                }else{
                    if($userModel->where('email', $email)->first()){
                        session()->setFlashdata('error', 'Email has already registered');
                        return redirect()->to('/profile/edit/'.$id)->withInput();
                    }
                }

                //handling img upload
                $oldImgName = $userModel->where('user_id', $id)->first()['user_img'];
                $userImgName = $user_img->getName();
                if($user_img->getError() == 4){
                    $userImgName = $oldImgName;
                }else{
                    if($oldImgName != 'default.jpg'){
                        unlink('img/profile/'.$oldImgName);
                    }
                    $userImgName = $user_img->getRandomName();
                    $user_img->move('img/profile', $userImgName);
                }

                $data = [
                    'name' => $name,
                    'email' => $email,
                    'user_img' => $userImgName,
                ];

                $userModel->update($id, $data);

                session()->setFlashdata('success', 'Successfuly update profile');
                return redirect()->to('/profile/'.$id);    
            }
        }else{
            session()->setFlashdata('error', 'Failed update profile');
            return redirect()->to('/profile/edit/'.$id);
        }
        
    }

    public function updatePassword($id = null){
        helper(['form']);
        if($this->request->getMethod() == 'post'){
            $userModel = new UsersModel();

            $rules = [
                'password' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password is too short',
                    ],
                ],
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

            if(!$this->validate($rules)){
                dd($this->validator->listErrors());
                return redirect()->to('/profile/edit/'.$userModel['user_id'])->withInput();
            }else{
                $userModel = new UsersModel();

                $password       = $this->request->getVar('password');
                $oldPassword    = $userModel->where('user_id', $id)->first()['password'];
                $new_password   = $this->request->getVar('new_password');

                //handling password update
                if(!password_verify($password, $oldPassword)){
                    session()->setFlashdata('error', 'Wrong password');
                    return redirect()->to('/profile/edit/'.$id)->withInput();
                }

                $data = [
                    'password' => password_hash($new_password, PASSWORD_DEFAULT),
                ];

                $userModel->update($id, $data);

                session()->setFlashdata('success', 'Successfuly update password');
                return redirect()->to('/profile/'.$id);    
            }
        }else{
            session()->setFlashdata('error', 'Failed update password');
            return redirect()->to('/profile/edit/'.$id);
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
        $userModel->delete($id);
        session()->setFlashdata('success', 'Successfuly delete profile');
        return redirect()->to('/login');
    }
}
