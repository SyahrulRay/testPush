<?php

namespace App\Controllers;

use App\Models\StockModel;
use App\Controllers\BaseController;

class MainController extends BaseController
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
        return view('content/home');
    }

    public function product()
    {
        $this->data['page_title'] = "Product";
        $this->data['list'] = $this->stock_model->select('*')->get()->getResult();
        return view('content/product', $this->data);
    }

    
}
