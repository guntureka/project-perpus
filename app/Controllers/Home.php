<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        $session = session();
        $data = $session->get();
        return view('pages/home', $data);
    }
}
