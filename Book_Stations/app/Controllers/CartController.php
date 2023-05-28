<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourierModel;
use App\Models\PaymentModel;
use App\Models\TransactionModel;
use App\Models\UsersModel;
use App\Models\StockModel;
use Dompdf\Dompdf;

class CartController extends BaseController
{
    protected $data;
    protected $transaction;
    protected $courier;
    protected $payment;
    protected $stock;
    protected $user;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
        $this->stock = new StockModel();
        $this->courier = new CourierModel();
        $this->payment = new PaymentModel();
        $this->user = new UsersModel();
    }

    public function index()
    {
        $arrayPending = array('user' => session("name"), 'status' => 'pending');
        $this->data["pending"] = $this->transaction->select('*')->orderBy("created_at", "DESC")->where($arrayPending)->get()->getResult();
        return view('content/cart', $this->data);
    }

    public function history()
    {
        $arrayComplete = array('user' => session("name"), 'status' => 'paid');
        $this->data["complete"] = $this->transaction->select('*')->orderBy("created_at", "DESC")->where($arrayComplete)->get()->getResult();
        return view('content/history', $this->data);
    }

    public function cancel($id = '')
    {
        $this->transaction->where(['id' => $id])->delete();
        return redirect()->back();
    }
}
