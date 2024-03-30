
<?php
   $this->view('includes/header');
         $this->view('includes/nav');

?>




   <div class="container" style="margin-top:8rem;">
    <div class="row">
      <div class="col-md-12 text-center card p-5 m-2 bg-success text-light">
         <div class="text-center">Thank you for shopping with us!</div>
         <div>Your order was successful</div>
         <span>What would you like to do next</span>
         
      </div>
    </div>
     </div>


     <script>
    setTimeout(function() {
        window.location.href = '<?php echo ROOT ?>'; 
    }, 3000); 
</script>

     <?php $this->view('includes/footer') ?>