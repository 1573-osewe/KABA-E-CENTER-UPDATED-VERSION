   <?php
    $this->view('includes/header');
         $this->view('includes/nav');?>
 
   <div class="container" style="margin-top:5rem">

   <?php if(is_array($rows)):?>
      <form method="POST" class="row">
         <div class="col-md-6 text-center">
           <!-- <div style="height:2rem; width:50%; ">
             <img src="<?php echo ROOT?>/assets/img/watches22.png" alt="" class="img-fluid">
           </div> -->
            
         </div>
         <div class="col-md-6" style="border-right:solid thin #ccc;">

         <div class="d-flex ">
            <div class="rounded-circle me-5" style="height:3rem !important; width:3rem !important;">
               <img src="<?php echo ROOT ?>/assets/img/AgriTechNullbg.png" alt="" class="img-fulid rounded-circle" style="object-fit:cover; height:3rem; width:3rem; border:solid gold;">
            </div>
            <div>Information</div>
            <span>Alraedy have an accout with us? <a href="">login for faster checkout experience.</a></span>

         </div>

         <input name=email type="text" value="<?php echo Auth::getemail()?>" placeholder="Email address" class="form-control mt-2 mb-3" required>

         <div>SHIPPING ADDRESS DETAILS </div>

            <div class="d-flex">
               <input name="username"  value="<?php echo Auth::getusername()?>" type="text" placeholder="First name" class="form-control mt-2 me-2 mb-3" required>
             
            </div>
           <input name="address" type="text" placeholder="Street address "class="form-control mt-2 mb-3" required>

            <div class="d-flex">
               <?php if(!empty($countries)):?>
               <select name="country"   id="inputState" class="form-select me-2"> 
                  <?php foreach($countries as $country):?>
                  <option   value="<?php echo esc($country->id)?>" ><?php echo esc($country->country)?></option>
                  <?php endforeach;?>
               </select>
               <?php endif;?>
               <?php if(!empty($states)):?>
               <select name="state"   id="inputState" class="form-select "> 
                  <?php foreach($states as $states):?>
                  <option   value="<?php echo esc($states->id)?>" ><?php echo esc($states->state)?></option>
                  <?php endforeach;?>
               </select>
               <?php endif;?>
            </div>

            <input name= "town"type="text" placeholder="Town / City "class="form-control mt-2 mb-3" required>
            <input name="phone" type="text" placeholder="Phone "class="form-control mt-2 mb-3" required>
          <div class="d-flex" >
             <a href="<?php echo ROOT?>/cart" style="background-color:orange !important; color:#ffff;" class="btn mb-3 ">Back to Cart</a>
              <input style="background-color:#333333 !important; color:#ffff;" class="btn mb-3 ms-auto " type="submit" value="Complete Order"/>
             
          </div>
         </div>
    
      </form>
      <?php else:?>
         <h3 class="text-center ">Please add some items in the cart first!</h3>
      <?php endif;?>
   </div>

    <?php $this->view('includes/footer') ?>
 