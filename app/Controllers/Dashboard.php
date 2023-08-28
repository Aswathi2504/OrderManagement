<?php

namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProductsModel;
 
class Dashboard extends BaseController
{
    public function index()
    {
      $id = session()->get('id'); 
      $user = new UserModel();
      $data['result'] = $user->find($id);
      return view('dashboard',$data);
    }
    public function profile()
    {
      $id = session()->get('id'); 
      $user = new UserModel();
      $data['result'] = $user->find($id);
      return view('profile',$data);
    }
    public function vendorproducts()
    {
      $id = session()->get('id'); 
      $model = new ProductsModel();
      $condition = ['vendor_id' =>$id]; 
      $data['result'] = $model->getDataWithWhere($condition);
      return view('myproducts',$data);
    }
  }