<?php

namespace App\Controllers;

use App\Models\BooksModel;
use App\Models\LoansModel;
use App\Models\PaymentsModel;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class Payment extends ResourceController
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
        $loanModel = new LoansModel();
        $bookModel = new BooksModel();
        $userModel = new UsersModel();

        $data['payments'] = $loanModel->join('tb_books', 'tb_books.book_id = tb_loans.book_id')->join('tb_users', 'tb_users.user_id = tb_loans.user_id')->findAll();
        //dd($data['loans']);

        return view('pages/dashboard/payment/show_payment', $data);
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

    public function return($id = null)
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
