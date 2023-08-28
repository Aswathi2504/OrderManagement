<?=$this->extend("layout")?>
  
<?=$this->section("content")?>
  
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= site_url('/dashboard')?>">Dashboard</a>
                    
                    <div class="d-flex">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="<?php echo base_url('/logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
         </div>
    </div>
                      <?php 
                        $role =  $result['role'];
                        if( $role === 'admin'):?>
                        <h3 class="text-center mt-5 text-danger"> Welcome Admin </h3>
                        <div class="mt-5 text-center">
                        <a href="<?= site_url('/vendor')?> " class="text-light btn btn-danger"> Vendor Details</a>
                        </div>
                        <?php elseif($role === 'vendor'):?>
                        <h4 class="text-center mt-5 text-primary"> Welcome Vendor </h4>
                        <div class="mt-5 text-center">
                        <a href="<?= site_url('/customer')?>" class="text-light btn btn-primary">List All Customers</a>
                        <a href="<?= site_url('/addcustomer')?>" class="text-light btn btn-primary">Add New Customers</a>
                        <a href="<?= site_url('/vendorproducts')?>" class="text-light btn btn-primary">My Products</a>
                        </div>
 
                        <?php elseif($role ==='customer') :?>
                        <h3 class="text-center mt-5 text-success"> Welcome Customer </h3>
                        <div class="text-center mt-5">
                        <a href="<?= site_url('/profile')?>" class="text-light btn btn-success">My Profile</a>
                        <a href="<?= site_url('/orderlist')?>" class="text-light btn btn-success">My Orders</a>
                        <a href="<?= site_url('/productlist')?>" class="text-light btn btn-success">Product List</a>  </div>
                        <?php else :?>
                            <h2 class="text-center mt-5"> Welcome User </h2>
                        <?php endif; ?>
    </div
<?=$this->endSection()?>