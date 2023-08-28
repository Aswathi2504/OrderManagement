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
        <h3>View All Products</h3>
        <a href="<?= site_url('/profile')?>" class="btn btn-success ms-auto mb-1">Profile</a>
        <a href="<?= site_url('/profile')?>" class="btn btn-success ms-auto mb-1">All Products</a></div>
    <table class="table table-secondary table-striped text-center">
            <thead>
                <th>SL NO</th>
                <th>NAME</th>
                <th>TYPE</th>
                <th>AMOUNT</th>
                <th>ACTIONS</th>
            </thead>
            <tbody>
              <?php  if(count($result) > 0){
                    $i=1;
                    foreach  ($result as $row) {
                        if(count($result2) > 0)
                        {
                           foreach($result2 as $row2)
                           {
                             $customer_id = session()->get('id');
                          //echo 'sssssss'.$row2['product_id'];exit;
                                if(($row['id'] === $row2['product_id'] && $row2['customer_id'] === $customer_id)) 
                                {?>
                           
                    <tr> 
                        <td><?php echo $i; ?></td>
                        <td><?php echo  $row['name'] ;?></td>
                        <td><?php echo  $row['type'] ;?></td>
                        <td><?php echo  $row['amount'] ;?></td>
                        <td> 
                        <a href="<?= site_url('vendor/order/' . $row['id']); ?>" class="btn btn-light" onclick="return confirm('Are you sure')">Order Now</a>
                                <?php 
                                }
                                ?>
                     </tr> 
                     <?php }
                        }  ?>
                    <?php $i++ ;
                              }
                            }
                    else
                    { ?>
           
            <tr><td colspan="5">No Records Found</td></tr>
            <?php }  ?>
            </tbody>
         </table>

    </div>


 </div>

<?=$this->endSection()?>