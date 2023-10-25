<?php

namespace App\Controllers;

use App\Models\BooksModel;
use App\Models\LoansModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Book extends ResourceController
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
        session();

        $booksModel = new BooksModel();

        $data['books'] = $booksModel->findAll();

        return view('pages/dashboard/book/show_book', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        session();
        $bookModel = new BooksModel();
        $loansModel = new LoansModel();

        $data['books'] = $bookModel->where('slug', $id)->first();
        $data['loans'] = $loansModel->where('book_id', $data['books']['book_id'])->findAll();
        //dd($data['books']);
        return view('pages/book_detail', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
        return view('pages/dashboard/book/add_book');
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

        if ($this->request->getMethod() == 'post') {
            //dd($this->request->getVar());
            $rules = [
                'title' => [
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'Title is required',
                        'min_length' => 'Title is too short',
                        'max_length' => 'Title is too long',
                    ],
                ],
                'synopsis' => [
                    'rules' => 'required|min_length[3]',
                    'errors' => [
                        'required' => 'Synopsis is required',
                        'min_length' => 'Synopsis is too short',
                    ],
                ],
                'author' => [
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'Author is required',
                        'min_length' => 'Author is too short',
                        'max_length' => 'Author is too long',
                    ],
                ],
                'publisher' => [
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'Publisher is required',
                        'min_length' => 'Publisher is too short',
                        'max_length' => 'Publisher is too long',
                    ],
                ],
                'published_year' => [
                    'rules' => 'required|exact_length[4]',
                    'errors' => [
                        'required' => 'Published Year is required',
                        'exact_length' => 'Published Year must be 4 digits',
                    ],
                ],
                'genre' => [
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'Genre is required',
                        'min_length' => 'Genre is too short',
                        'max_length' => 'Genre is too long',
                    ],
                ],
                'price' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Price is required',
                        'numeric' => 'Price must be numeric',
                    ],
                ],
                'book_img' => [
                    'rules' => 'uploaded[book_img]|max_size[book_img,10240]|is_image[book_img]',
                    'errors' => [
                        'uploaded' => 'Photo is required',
                        'max_size' => 'Photo is too big',
                        'is_image' => 'Photo is not valid',
                    ],
                ],
                'quantity_available' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Quantity is required',
                        'numeric' => 'Quantity must be numeric',
                    ],
                ],
            ];

            if (!$this->validate($rules)) {
                dd($this->validator->listErrors());
                return redirect()->to('/dashboard/book')->withInput();
            } else {
                $bookModel = new BooksModel();

                $title              = $this->request->getVar('title');
                $slug               = url_title($title, '-', true);
                $synopsis           = $this->request->getVar('synopsis');
                $author             = $this->request->getVar('author');
                $publisher          = $this->request->getVar('publisher');
                $published_year     = $this->request->getVar('published_year');
                $genre              = $this->request->getVar('genre');
                $book_img           = $this->request->getFile('book_img');
                $price              = $this->request->getVar('price');
                $quantity_available = $this->request->getVar('quantity_available');

                //handling slug
                $slugDb = $bookModel->where('slug', $slug)->first()['slug'];
                if($slugDb){
                    session()->setFlashData('error', 'Title already exist');
                    return redirect()->to('/book/add')->withInput();
                }

                //handling img upload
                $bookImgName = $book_img->getRandomName();
                $book_img->move('img/books', $bookImgName);

                $data = [
                    'title' => $title,
                    'slug' => $slug,
                    'synopsis' => $synopsis,
                    'author' => $author,
                    'publisher' => $publisher,
                    'published_year' => $published_year,
                    'genre' => $genre,
                    'book_img' => $bookImgName,
                    'price' => $price,
                    'quantity_available' => $quantity_available,
                ];

                $bookModel->insert($data);

                session()->setFlashdata('success', 'Book has been added');

                return redirect()->to('/book');
            }
        } else {
            session()->setFlashdata('error', 'Failed to add book');
            return redirect()->to('/book/add');
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
        $bookModel = new BooksModel();

        $data['book'] = $bookModel->where('slug', $id)->first();
        return view('pages/dashboard/book/edit_book', $data);
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
            //dd($this->request->getVar());
            $rules = [
                'title' => [
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'Title is required',
                        'min_length' => 'Title is too short',
                        'max_length' => 'Title is too long',
                    ],
                ],
                'synopsis' => [
                    'rules' => 'required|min_length[3]',
                    'errors' => [
                        'required' => 'Synopsis is required',
                        'min_length' => 'Synopsis is too short',
                    ],
                ],
                'author' => [
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'Author is required',
                        'min_length' => 'Author is too short',
                        'max_length' => 'Author is too long',
                    ],
                ],
                'publisher' => [
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'Publisher is required',
                        'min_length' => 'Publisher is too short',
                        'max_length' => 'Publisher is too long',
                    ],
                ],
                'published_year' => [
                    'rules' => 'required|exact_length[4]',
                    'errors' => [
                        'required' => 'Published Year is required',
                        'exact_length' => 'Published Year must be 4 digits',
                    ],
                ],
                'genre' => [
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'Genre is required',
                        'min_length' => 'Genre is too short',
                        'max_length' => 'Genre is too long',
                    ],
                ],
                'price' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Price is required',
                        'numeric' => 'Price must be numeric',
                    ],
                ],
                'book_img' => [
                    'rules' => 'max_size[book_img,10240]|is_image[book_img]',
                    'errors' => [
                        //'uploaded' => 'Photo is required',
                        'max_size' => 'Photo is too big',
                        'is_image' => 'Photo is not valid',
                    ],
                ],
                'quantity_available' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Quantity is required',
                        'numeric' => 'Quantity must be numeric',
                    ],
                ],
            ];

            if (!$this->validate($rules)) {
                //dd($this->validator->listErrors());
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to('/book/edit/' . $id)->withInput();
            } else {
                $bookModel = new BooksModel();

                $title          = $this->request->getVar('title');
                $slug           = url_title($title, '-', true);
                $synopsis       = $this->request->getVar('synopsis');
                $author         = $this->request->getVar('author');
                $publisher      = $this->request->getVar('publisher');
                $published_year = $this->request->getVar('published_year');
                $genre          = $this->request->getVar('genre');
                $book_img       = $this->request->getFile('book_img');
                $price          = $this->request->getVar('price');
                $quantity_available = $this->request->getVar('quantity_available');
                //$is_borrowed    = $this->request->getVar('is_borrowed');

                //handling slug
                if ($slug == $id) {
                    $slug = $id;
                } else {
                    if ($bookModel->findAll() != 0) {
                        $slugDb = $bookModel->where('slug', $slug)->first();
                        if ($slugDb) {
                            if ($slugDb == $slug) {
                                session()->setFlashData('error', 'Title already exist');
                                return redirect()->to('/book/edit/' . $id)->withInput();
                            }
                        }
                    }
                }

                //handling img upload
                $oldImgName = $bookModel->where('slug', $id)->first()['book_img'];
                $bookImgName = $book_img->getName();
                if ($book_img->getError() == 4) {
                    $bookImgName = $oldImgName;
                } else {
                    if ($oldImgName != 'default.jpg') {
                        unlink('img/books/' . $oldImgName);
                    }
                    $bookImgName = $book_img->getRandomName();
                    $book_img->move('img/books', $bookImgName);
                }


                $data = [
                    'title' => $title,
                    'slug' => $slug,
                    'synopsis' => $synopsis,
                    'author' => $author,
                    'publisher' => $publisher,
                    'published_year' => $published_year,
                    'genre' => $genre,
                    'book_img' => $bookImgName,
                    'price' => $price,
                    'quantity_available' => $quantity_available,
                    //'is_borrowed' => $is_borrowed,
                ];

                $book_id = $bookModel->where('slug', $id)->first()['book_id'];

                $bookModel->update($book_id, $data);

                session()->setFlashdata('success', 'Book has been updated');

                return redirect()->to('/book');
            }
        } else {
            session()->setFlashdata('error', 'Failed to update book');
            return redirect()->to('/book/edit');
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
        $bookModel = new BooksModel();

        $bookModel->where('slug', $id)->delete();

        session()->setFlashdata('message', 'Book has been deleted');

        return redirect()->to('/book');
    }
}
