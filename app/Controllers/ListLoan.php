<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\LoansModel;
use CodeIgniter\RESTful\ResourceController;

class ListLoan extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
        $id = session()->get('user_id');
        $userModel = new UsersModel();
        $loanModel = new LoansModel();

        $data['loans'] = $loanModel->where('user_id', $id)->where('is_loan', true)->join('tb_books', 'tb_books.book_id = tb_loans.book_id')->findAll();

        return view('pages/list/list_loan', $data);
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
