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
        <div class="d-flex">
        <h3>Add Customer</h3>
                  <a href="<?php echo base_url('index.php/customer'); ?>" class="btn btn-primary ms-auto mb-1" >List All Customers</a>
                    </div>
                    <form action="<?php echo base_url('index.php/customer/store_customer'); ?>" method="post">
                    <div class="mb-3">
                            <label for="name" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('name') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('email') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('password') ?></small>
                            <?php endif;?>
                        </div>
                        
                        <div class="m-auto gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Add Now</button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     
</div></div>
  
<?=$this->endSection()?>