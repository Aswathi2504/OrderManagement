<?=$this->extend("layout")?>
  
<?=$this->section("content")?>


<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= site_url('/dashboard')?>">Order Management</a>
                    <div class="d-flex">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?php echo base_url('/logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
         </div>
    </div>

    <div class="col-12  m-auto mt-5">
        <div class="d-flex"><h3>View Profile</h3>
        <a href="<?= site_url('/productlist')?>" class="btn btn-success ms-auto mb-1">Product List</a>
        <a href="<?= site_url('/orderlist')?>" class="btn btn-success  m-1 mb-1">My Orders</a></div>

       
     <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center">
        <img src="https://img.freepik.com/premium-vector/avatar-profile-icon_188544-4755.jpg" style="width: 200px; height: 200px;">
       </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center">
            <h4>Details</h4>
          <span>Name : <?= $result['name']?></span><br/>
          <span>Email : <?= $result['email']?></span><br/>
          <span>Profile created at :<?= $result['created_at']?> </span><br/>
        </div>

     </div>
    

   </div>


    
</div>
<?=$this->endSection()?>