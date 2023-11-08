<?php

namespace App\Controllers;

use App\Models\BooksModel;
use App\Models\LoansModel;
use App\Models\PaymentsModel;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

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
        $loanModel = new LoansModel();
        $bookModel = new BooksModel();
        $userModel = new UsersModel();

        $data['loans'] = $loanModel->join('tb_books', 'tb_books.book_id = tb_loans.book_id')->join('tb_users', 'tb_users.user_id = tb_loans.user_id')->findAll();
        //dd($data['loans']);

        return view('pages/dashboard/loan/show_loan', $data);
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
                // $loan_date = date('Y-m-d', strtotime('-7 days'));
                // $return_date = date('Y-m-d', strtotime('-3 days'));

                $data = [
                    'book_id' => $book_id,
                    'user_id' => $user_id,
                    'loan_date' => $loan_date,
                    'return_date' => $return_date,
                    'is_loan' => true,
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

    public function return($id = null)
    {
        //
        $loanModel = new LoansModel();
        $bookModel = new BooksModel();
        $paymentModel = new PaymentsModel();

        $loan = $loanModel->where('loan_id', $id)->first();
        $book = $bookModel->where('book_id', $loan['book_id'])->first();

        if($loan['is_loan'] == false){
            session()->setFlashdata('error', 'Book already returned');
            return redirect()->to('/loan')->withInput();
        }

        if($loan['return_date'] < date('Y-m-d')){
            $datetime1 = new DateTime($loan['return_date']);
            $datetime2 = new DateTime(date('Y-m-d'));
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');

            $paymentModel->insert([
                'loan_id' => $id,
                'amount' => $book['price'] + ($book['price'] * 0.1 * $days),
                'created_at' => date('Y-m-d H:i:s'),
            ]); 
        }else{
            $paymentModel->insert([
                'loan_id' => $id,
                'amount' => $book['price'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $bookModel->update($loan['book_id'], ['quantity_available' => $book['quantity_available'] + 1]);
        $loanModel->update($id, ['is_loan' => false]);

        session()->setFlashdata('success', 'Return success');
        return redirect()->to('/loan')->withInput();
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $loanModel = new LoansModel();
        $bookModel = new BooksModel();

        $loan = $loanModel->where('loan_id', $id)->first();
        $book = $bookModel->where('book_id', $loan['book_id'])->first();

        if($loan['is_loan'] == true){
            session()->setFlashdata('error', 'Book is still loaned');
            return redirect()->to('/loan')->withInput();
        }

        $bookModel->update($loan['book_id'], ['quantity_available' => $book['quantity_available'] + 1]);
        $loanModel->delete($id);

        session()->setFlashdata('success', 'Delete success');
        return redirect()->to('/loan')->withInput();
    }
}
