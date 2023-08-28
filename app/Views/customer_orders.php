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
        <div class="d-flex ms-auto">
        <a href="<?= site_url('/vendor')?>" class="btn btn-danger ms-auto mb-1"> Vendors </a>
      </div>
        <h4 class="text-center">View All Products</h4>
      
    <table class="table table-secondary table-striped text-center">
            <thead>
                <th>SL NO</th>
                <th>NAME</th>
                <th>TYPE</th>
                <th>AMOUNT</th>
               
               
            </thead>
            <tbody>
              <?php  if(count($result) > 0){
                    $i=1;
                    foreach  ($result as $row)
                     {
                       ?>
                     <tr> 
                        <td><?php echo $i; ?></td>
                        <td><?php echo  $row['name'] ;?></td>
                        <td><?php echo  $row['type'] ;?></td>
                        <td><?php echo  $row['amount'] ;?></td>
                        
                     </tr> 
                     <?php }
                         ?>
                    <?php $i++ ;
                        }
                    else
                    { ?>
           
                <tr><td colspan="4">No Records Found</td></tr>
                <?php }  ?>
                </tbody>
            </table>

    </div>


 </div>

<?=$this->endSection()?>