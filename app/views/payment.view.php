<?php 
  $this->view('includes/header');
   $this->view('includes/nav');
?>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap");

  body {
    background-color: #eaedf4;
    font-family: "Rubik", sans-serif;
  }

  .card {
    pwidth: 310px;
    border: none;
    border-radius: 15px;
  }

  .justify-content-around div {
    border: none;
    border-radius: 20px;
    background: #f3f4f6;
    padding: 5px 20px 5px;
    color: #8d9297;
  }

  .justify-content-around span {
    font-size: 12px;
  }

  .justify-content-around div:hover {
    background: #545ebd;
    color: #fff;
    cursor: pointer;
  }

  .justify-content-around div:nth-child(1) {
    background: #545ebd;
    color: #fff;
  }

  span.mt-0 {
    color: #8d9297;
    font-size: 12px;
  }

  h6 {
    font-size: 15px;
  }

  .mpesa {
    background-color: green !important;
  }

  img {
    border-radius: 15px;
  }


  .price h1 {
    font-weight: 300;
    color: #18C2C0;
    letter-spacing: 2px;
    text-align: center;
  }

</style>
<?php $this->view('nav') ?>

<div class="container" style="margin-top:8rem; margin-bottom:5rem;">
  <div class="row">
    <div class="col-md-12 text-center ">
      <div class="price mb-3">
          <?php if(!empty($total)): ?>
        <h1>Awesome, that's KES <?php echo " ".$total?></h1>
        <?php endif; ?>
      </div>

      <?php if(!empty($errors)):?>
        <span class="alert alert-danger">
          <?php echo $errors['phone']?>
      </span>
      <?php endif;?>
      <div><span class="fw-bold text-warning">Lipa na </span>
        <img style="width:10rem;" src="<?php echo ROOT?>/assets/img/1200px-M-PESA_LOGO-01.svg.png" class="img-fluid "
          alt="">
      </div>

      <div class="btn mb-2" style="background-color: #242852 !important; margin-top: 30px;
        font-size:0.7rem;
        
        margin:auto;
        ">
        <p style="color:#8F92C3;line-height:1.7;">1. Enter the <b>phone number</b> and press "<b>Confirm and
            Pay</b>"</br>2. You will receive a popup on your phone. Enter your <b>MPESA PIN</b></p>
      </div>


     <form method="post" style="width:300px; margin:auto;">
        <div>
          
          <input id="phone" style="margin:auto;" placeholder="Enter phone number" type="text" name="phone" class="form-control  mt-2 mb-3" required>
        </div>

        <input name="submit" class="btn"  style="  font-size: 1.2rem;
        font-weight: 400;
        letter-spacing: 1px;
      
        background-color: #18C2C0 !important;
        border: none;
        color: #fff;" type="submit" value="Confirm and Pay">

    </form>
    
  

    </div>
  </div>

  <div class="col-md-7">



 






</div>
</div>













<?php $this->view('includes/footer') ?>