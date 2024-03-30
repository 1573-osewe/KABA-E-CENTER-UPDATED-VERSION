
  <?php 
        $this->view('includes/header');
         $this->view('includes/nav');
  ?>
    <section class="px-md-5 p-2  banner">
        <div class="container  text-center">
            <div class="row  gx-3" style="z-index:100; position: relative !important;">
                <div class="col-md-12 col-sm-12 p-md-4 mt-5">
                    <div class="container">
                        <div class=" text-light " data-aos="zoom-out-left">
                            <div class="p-md-4 p-sm-1 ">
                                <h2>WELCOME TO KABARAK E-CENTER</h2>
                                <p>The Best For The Best. </p>
                            </div>
                        </div>
                    </div>

                    <div class="container px-5 mb-3">
                        <form class="row g-3 ">
                            <div class="col-md-5 col-sm-12">
                                <input class="form-control p-2" type=" text" placeholder="Disabled input here...">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <select class="p-2 form-select form-control">
                                    <option>All categories</option>
                                    <option>cars</option>
                                    <option>All categories</option>
                                    <option>All categories
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="btn btn-light p-2 w-100"><i class="bi bi-search  pe-2"></i>
                                    <strong>SEARCH</strong>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" py-5">
        <div class="container ">
           <div>
                <h4>
                    <strong>A Broad Selection of Products </strong>
                </h4>
           </div>
            <div class="py-4">
                <span>
                    Choose from 204,000 products posted, with new additions published every month
                </span>
            </div>
            <?php

           $categories = get_categories();?>

            <?php if(!empty($categories)) :?>
                <?php foreach($categories as $categ) :?>
                    <a href="<?php echo ROOT ?>/category/<?php echo esc($categ->slug) ?>"><div class="btn btn-success my-2"><?php echo esc($categ->category) ?></div></a>
                <?php endforeach?>
            <?php endif?>
        </div>    


    </section>


    <section class="p-md-4">
        <div class="container  text-center">
            <h1 class="p-2">Featured Products</h1>
  
            
            <?php if(!empty($row1)):?>
            <div class="row gy-5 py-4">
                <?php //show($row1)?>
                <?php foreach($row1 as $row):?>
                
                
                <div class="col-md-3 col-sm-12">
                    
                    <div class="card xol">
                        <strong class="text-start p-2"><?php echo esc($row->user_row->username ?? "")?></strong>
                        <a href="<?php echo ROOT ?>/category/product/<?php echo esc($row->slugt)?>" class="card-body text-start p-5">
                            <img src="<?php echo get_image($row->ad_image1)?>" alt="" class="img-fluid ">
                            <div class="card-title py-2">
                                <strong><?php echo esc($row->title) ?? 'Unknown'?></strong>
                            
                            <p>
                                <?php echo esc($row->description)?>
                            </p>
                            </div>
                            <div class="xol-heart">
                                <small><b><?php echo ucfirst(esc("ksh ".$row->price)) ?? 'Unknown'?></b></small>
                                
                            </div>
                        </a>
                    </div>
                    
                </div>
               
                <?php endforeach?>
          
            </div>
            <?php endif;?>
        </div>
    </section>

    <section class="p-3 py-5" style="background: #A3EBE2 ;">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 col-sm-12 py-4">

                    <img src="<?php echo ROOT?>/assets/img/logo.png" alt="" class="img-fluid w-25">
                    <div class="p-5">
                        <span>E-COMMERCE: Buy and sell Books, Laptops, Smartphones, Smartware, mobile phones,
                            tablets, Clothing,furniture and all kinds of electronic products and accessories. All at
                            the
                            best price in Kenya.
                        </span></div>
                </div>
            </div>
        </div>
    </section>









    <!-- <section class="py-4 what-client">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="swiper">
                        <h2>What client’s say?</h2>
                        <div class="client-content">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card mt-5">
                                        <div class="card-body text-start">
                                            <div class="card-text mb-5">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias
                                                soluta expedita culpa possimus vero dolor odio provident eius error vel.
                                            </div>
                                            <div style="height:50px ; width: 50px;">
                                                <img src="<?php echo ROOT?>/assets/img/jackimage2.jpg"
                                                    class="img-fluid rounded-circle  what-client-img" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div style="position: relative ;" class="col-md-6 col-sm-12">

                </div>

            </div>




            <img src="<?php echo ROOT?>/assets/img/tablet1.png" class="img-fluid what-client-img3" style="width:100px; height:100px; object-fit:contain;" alt="">
            <img src="<?php echo ROOT?>/assets/img/shape-4.png" class="img-fluid what-client-img2" alt="">
            <img src="<?php echo ROOT?>/assets/img/shape-5.png" class="img-fluid what-client-img4" alt="">
        </div>
    </section>
  -->



      <?php 
        $this->view('includes/footer');
  ?>
