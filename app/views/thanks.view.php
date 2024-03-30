<?php $this->view('header') ?>
<?php $this->view('nav') ?>

    
      
      
  
   <div class="container" style="margin-top:8rem;">
    <div class="row">
      <div class="col-md-12 text-center ">
         <?php if(!empty($row)):?>
        <?php foreach($row as $pay):?>
                    <br>
            <?php if($pay->status == 'success'):?>
                <div class="fw-bold h-3 text-success mb-4">Thank you for shopping with us!</div>
                <div class="mb-3 text-warning">Request accepted for processing</div>
                <div class="text-danger">Your order was <?php echo $pay->status ?? "Unkwnon status"?></div>
                
             <?php elseif( $pay->status == 'canceled'):?>
                 <div class="text-danger">Your order was <?php echo $pay->status ?? "Unkwnon status"?></div>
                
            <?php else:?>
                <div class="fw-bold h-3 text-success mb-4">Thank you for shopping with us!</div>
                <div class="mb-3">Your order was <span class="text-success">Request accepted for processing</span></div>
            <?php endif;?>
             <span>What would you like to do next</span>
             <br>
             <a href="<?php echo ROOT?>/shop"><div class="btn btn-secodary mt-3 mb-4">Continue shopping</div></a>
         <?php endforeach;?>
         <?php endif;?>
      </div>
    </div>
     </div>

     <?php $this->view('footer') ?>