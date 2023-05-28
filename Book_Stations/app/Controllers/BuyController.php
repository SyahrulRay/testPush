<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockModel;
use App\Models\UsersModel;
use App\Models\PaymentModel;
use App\Models\CourierModel;

class BuyController extends BaseController
{
    protected $session;
    protected $data;

    protected $stock_model;
    protected $users;
    protected $payment;
    protected $courier;

    public function __construct()
    {
        $this->stock_model = new StockModel();
        $this->users = new UsersModel();
        $this->courier = new CourierModel();
        $this->payment = new PaymentModel();
        $this->data['session'] = $this->session;
    }

    public function display($id = '')
    {
        $this->data['page_title'] = "Buy";
        $qry = $this->stock_model->select('*')->where(['id' => $id]);

        $this->data['data'] = $qry->first();
        $this->data['courier'] = $this->courier->findAll();
        $this->data['payment'] = $this->payment->findAll();
        return view('content/buy', $this->data);
    }
}
