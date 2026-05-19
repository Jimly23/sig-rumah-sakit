<?php

namespace App\Controllers;
use App\Models\Hospital;

class Home extends BaseController
{
    public function index(): string
    {
        $hospitalModel = new Hospital();
        $data['hospitals'] = $hospitalModel->findAll();
        return view('home', $data);
    }
}
