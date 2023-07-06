<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;

class TransaksidataController extends BaseController
{
    protected $transaksi;

    function __construct()
    {
        helper('form');
        helper('text');
        helper('number');
        $this->validation = \Config\Services::validation();
        $this->transaksi = new TransaksiModel();
    }

    public function index()
    {
        $data['transaksis'] = $this->transaksi->findAll();
        return view('pages/transaksi_view', $data);
    }

    public function edit($id)
    {
        $data = $this->request->getPost();
        if($data){           
            $dataForm = [
                'status' => $this->request->getPost('status')
            ];
            $this->transaksi->update($id, $dataForm);

            return redirect('transaksi')->with('success','Data has been updated.');
        }else{
            return redirect('transaksi')->with('failed','Data failed to update.');
        }
        
    }

    public function delete($id)
    {
        $dataTransaksi = $this->transaksi->find($id);
        
        $this->transaksi->delete($id);

        return redirect('transaksi')->with('success','Data has been deleted.');
    }
}
