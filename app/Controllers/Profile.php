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
        $userModel = new UsersModel();
        $loanModel = new LoansModel();
        $data['loans'] = $loanModel->where('user_id', session()->get('user_id'))->findAll();
        $data['user'] = $userModel->where('user_id', session()->get('user_id'))->first();
        
        return view('pages/profile', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
        $userModel = new UsersModel();
        $data['user'] = $userModel->where('user_id', $id)->first();
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
    }
}
