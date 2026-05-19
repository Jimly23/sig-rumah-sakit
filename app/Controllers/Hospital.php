<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Hospital as HospitalModel;

class Hospital extends BaseController
{
    public function index()
    {
        $search = $this->request->getGet('search');
        $hospitalModel = new HospitalModel();
        
        if ($search) {
            $data['hospitals'] = $hospitalModel->like('nama', $search)->findAll();
            $data['search'] = $search;
        } else {
            $data['hospitals'] = $hospitalModel->findAll();
            $data['search'] = '';
        }
        return view('hospital_list', $data);
    }

    public function detail($id)
    {
        $hospitalModel = new HospitalModel();
        $data['hospital'] = $hospitalModel->find($id);

        if (empty($data['hospital'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Rumah sakit tidak ditemukan');
        }

        return view('hospital_detail', $data);
    }
}
