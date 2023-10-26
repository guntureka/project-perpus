<?php

namespace App\Controllers;

use App\Models\BooksModel;
use App\Models\LoansModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Loan extends ResourceController
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
        helper(['form']);
        if($this->request->getMethod() == 'post'){
            $rules = [
                // 'book_id' => 'required',
                // 'user_id' => 'required',
                // 'loan_date' => 'required',
                // 'return_date' => 'required',
                'slug' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Book id is required'
                    ]
                ]
            ];
            if(!$this->validate($rules)){
                //session()->setFlashdata('error', $this->validator->listErrors());
                dd($this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{
                $loanModel = new LoansModel();
                $bookModel = new BooksModel();

                $slug = $this->request->getVar('slug');
                
                $book = $bookModel->where('slug', $slug)->first();

                $book_id = $book['book_id'];
                $user_id = session()->get('user_id');
                $loan_date = date('Y-m-d');
                $return_date = date('Y-m-d', strtotime('+7 days'));

                $data = [
                    'book_id' => $book_id,
                    'user_id' => $user_id,
                    'loan_date' => $loan_date,
                    'return_date' => $return_date,
                    'is_loan' => true,
                    'fine' => 0,
                ];

                $loanModel->insert($data);
                $bookModel->update($book_id, ['quantity_available' => $book['quantity_available'] - 1]);

                session()->setFlashdata('success', 'Loan success');
                return redirect()->to('/')->withInput();
            }
        }else{
            return redirect()->to('/')->withInput();
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
