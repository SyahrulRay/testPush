<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockModel;

class AdminController extends BaseController
{

    protected $session;
    protected $data;

    protected $stock_model;

    public function __construct()
    {
        $this->stock_model = new StockModel();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['page_title'] = "add Data";
        $this->data['list'] = $this->stock_model->select('*')->get()->getResult();
        return view('content/addproduct', $this->data);
    }

    public function update_stock()
    {
        $addStock = $this->request->getPost('stock');
        $post =     [
            'name' => $this->request->getPost('item_name'),
            'price' => $this->request->getPost('price'),
            'desc' => $this->request->getPost('desc')
        ];
        $this->stock_model->where(['id' => $this->request->getPost('id')])->set($post)->update();
        $this->stock_model->where(['id' => $this->request->getPost('id')])->set('stock', "stock + $addStock", FALSE)->update();
        return redirect()->back();
    }

    public function addItem()
    {
        if (!$this->validate([
            'image1' => [
                'rules' => 'uploaded[image1]|mime_in[image1,image/jpg,image/jpeg,image/gif,image/png]|',
                'errors' => [
                    'uploaded' => 'No Uploaded Files',
                    'mime_in' => 'File Extention Must Be jpg, jpeg, gif, png',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            session()->setFlashdata('success', 'Item Berhasil Ditambahkan');
        }

        $dataImage1 = $this->request->getFile('image1');
        $fileName1 = $dataImage1->getRandomName();
        $this->stock_model->insert([
            'imagePath' => "assets/content/$fileName1",
            'name' => $this->request->getPost('ItemName'),
            'price' => $this->request->getPost('ItemPrice'),
            'desc' => $this->request->getPost('ItemDesc'),
            'stock' => $this->request->getPost('ItemStock')
        ]);
        $dataImage1->move('assets/content', $fileName1);
        return redirect()->to(base_url('product'));
    }

    public function delete_stock()
    {
        $this->stock_model->where(['id' => $this->request->getPost('id')])->delete();

        return redirect()->to('product');
    }
}
