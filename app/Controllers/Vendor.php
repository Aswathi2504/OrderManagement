<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Models\ProductsModel;
use App\Models\OrderModel;

class Vendor extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $condition = ['role' =>"vendor"]; 
        $data['result'] = $model->getDataWithWhere($condition);
        //print_r($data); exit;
        return view('vendor', $data);
    }
    public function customers($id)
   {
      $customer = new CustomerModel();
      $condition = ['vendor_id' =>$id]; 
      $data['result'] = $customer->getDataWithWhere($condition);
      return view('vend_customer', $data);
    }
    public function products($id)
   {
      $product = new ProductsModel();
      $condition = ['vendor_id' =>$id]; 
      $data['result'] = $product->getDataWithWhere($condition);
      return view('vend_products', $data);
    }
    public function productlist()
    {
        $id = session()->get('id'); 
        $customer = new CustomerModel();
        $condition = ['customers.user_id' =>$id]; 
        $data['result'] = $customer->getJoinedData($condition);
        //print_r($data); exit;
        // $customer_id = session()->get('id');
        // $orders = new OrderModel();
        // $condition = ['customer_id' =>$customer_id]; 
        // $data['result2'] = $orders->getDataWithWhere($condition);
        //print_r($data['result2']); exit;
        return view('list_products', $data);
    }

    public function orders($id)
    {
       $customer_id = session()->get('id'); 
       $orders = new OrderModel();
       $data1 = [
        'product_id' => $id,
        'customer_user_id'    => $customer_id,
        
       ];
       $orders->insert($data1);
       return redirect()->to('/orderlist');
       
     }
     public function orderlist()
     {
        $id = session()->get('id'); 
        $orders = new OrderModel();
        $condition = ['orders.customer_user_id' =>$id]; 
        $data['result'] = $orders->getJoinedData($condition);
        //print_r($data); exit;
        return view('list_orders', $data);
     }
     public function removeorder($id)
     {
       
        $orders = new OrderModel();
		$orders->delete($id);
		return redirect()->to('/orderlist');
     }
     public function customer_order($id)
     {
        $orders = new OrderModel();
        $condition = ['orders.customer_user_id' =>$id]; 
        $data['result'] = $orders->getJoinedData($condition);
        //print_r($data); exit;
        return view('customer_orders', $data);

     }
     public function orderapprove($id)
     {
        $orders = new OrderModel();
        $data = [
            'status' => '1',
            
        ];
        $orders->update($id, $data);
        return redirect()->to('/customer');
    
     }
     public function orderreject($id)
     {
        $orders = new OrderModel();
        $data = [
            'status' => '2',
            
        ];
        $orders->update($id, $data);
        return redirect()->to('/customer');

     }

    
   
}
