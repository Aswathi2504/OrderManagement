<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\UserModel;
use  App\Models\OrderModel;


class Customer extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }
    public function index()
    {
        $id = session()->get('id'); 
        $model = new CustomerModel();
        $condition = ['vendor_id' => $id]; 
        $data['result'] = $model->getDataWithWhere($condition);
        //print_r($data); exit;
        return view('customer', $data);
    }
    public function add_customer()
    {
        $data = [];
        return view('add_customer', $data);
    }
    public function store_customer()
    {
       
        
        $rules = [
            'name' =>  ['rules' => 'required|min_length[3]|max_length[255]'],
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[customers.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            
        ];
           
 
        if($this->validate($rules))
        {
            $user = new UserModel();
            $data1 = [
            'name' => $this->request->getVar('name'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => "customer"
           ];
            $user->insert($data1); 
           // print_r($data1); exit;
            $model = new CustomerModel();
            $vendor = session()->get('id');
            $data = [
                'name' => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'user_id' =>$user->insertID(),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'vendor_id'=> session()->get('id')
            ];
            //print_r($data); exit;
            $model->save($data);
            
            return redirect()->to('/customer');
        }
        else
        {
            $data['validation'] = $this->validator;
            return view('add_customer', $data);
        }
         
    }
    public function orders($id)
    {
        $orders = new OrderModel();
        $condition = ['orders.customer_user_id' =>$id]; 
        $data['result'] = $orders->getJoinedData($condition);
        //print_r($data); exit;
        return view('order_approv', $data);

    }
}
