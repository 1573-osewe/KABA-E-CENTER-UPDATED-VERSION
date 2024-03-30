  <?php 
        $this->view('includes/header');
         $this->view('includes/nav');
  ?>
    
    <section class="p-md-4 p-sm-1  mt-5 ">
         <?php if(!empty($product)): ?>
        <div class="container text-center product-container mt-5">
            <div class="p-2">
                <strong><?php echo esc($product[0]->title)?? '' ?> </strong>
            </div>
            <div class="card p-md-4 p-sm-3">
                <div class="row g-4">
                    <div class="col-md-8 col-sm-12  p-2 " style="position: relative;">

                        <div class="mb-md-5 mb-2 container-img  mb-sm-3 ">
                            <img src="<?php echo get_image($product[0]->ad_image1) ?>" class="img-fluid rounded img-container " alt=""
                                data-action="zoom">

                            <div class="lens"></div>
                            <div class="result"></div>
                        </div>

                        <div class=" mb-3">
                            <div class="product-content-mg ">
                                <div> <img class="images" src="<?php echo get_image($product[0]->ad_image1) ?>" alt="" class="img-fluid ">
                                </div>
                                <div> <img class="images" src="<?php echo get_image($product[0]->ad_image1) ?>" alt="" class="img-fluid ">
                                </div>
                                <div> <img class="images" src="<?php echo get_image($product[0]->ad_image1) ?>" alt="" class="img-fluid ">
                                </div>
                            </div>
                        </div>

                        <div class="p-4">
                            <hr>
                            <strong><?php echo esc($product[0]->title)?? '' ?>  </strong>

                            <div class="p-md-3 p-sm-3">
                                <p class="p-2">
                                    <?php echo esc($product[0]->description)?? '' ?> 
                                </p>
                            </div>
                        </div>
                        <h4>Descriptions</h4>

                        <div class="text-start p-3 description">
                            <hr>
                            <p> <?php echo esc($product[0]->description)?? '' ?> </p>
                            <hr>
                        </div>
                    </div>

                    <div class=" col-md-4 col-sm-12  rounded">
                        <div class="container p-4">
                            <div class="d-md-flex mb-4 text-sm-start" style="position:relative ;">
                                <img src="./assets/img/jackimage2.jpg" alt="" class="img-fluid  rounded-circle mb-sm-2"
                                    style="max-width:50px ; max-height:50px !important ;" data-action="zoom">
                                <div class="px-md-5 text-start">
                                    <strong><?php echo esc($product[0]->user_row->username)?? '' ?></strong>

                                </div>
                               
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <div class="text-start"><i class="bi bi-person"></i> Member since 2024</div>
                        </div>

                        <div class="text-start p-md-4 p-sm-4">
                            <p><i class="px-2 bi bi-bag-heart"></i>Secure purchase*</p>
                            <p><i class="px-2 bi bi-hand-thumbs-up"></i>Mechanical breakdown warranty</p>
                            <p><i class="px-2 bi bi-cash"></i>Secure payment</p>
                            <p><i class="px-2 bi bi-bag"></i>Available (In stock) </p>
                        </div>
                        <strong class="mx-5">ksh <?php echo esc($product[0]->price)?></strong>
                        <!-- <div class="btn btn-warning p-2">ADD TO CART</div> -->
                         <a  href="<?php echo ROOT?>/add_to_cart/<?php echo esc($product[0]->id)?>"> <div oncliclk="cart.add(<?php echo $product[0]->id ?>)" class="btn btn-warning " style="background-color: gold !important;">ADD TO CART</div></a>
                        <hr>
                        <strong>Features</strong>
                        <div class="text-start p-2">
                            <strong>Standard</strong><br>
                                <?php echo esc($product[0]->features)?? '' ?> 
                        </div>
                        <hr>
                        


                    </div>
                </div>



            </div>
        </div>
        <?php endif ?>
    </section>
     
    <!-- <section class="p-md-4">
        <div class="container  text-center">
            <h1 class="p-2">Related ads</h1>
            <div class=" p-1 py-2 swiper  ">
                <div class="swiper-olx olx">
                    <div class="swiper-wrapper ">
                        <div class="swiper-slide">
                            <div class="card xol p-1 ">
                                <img src="./assets/img/product-1.webp" alt="" class="img-fluid img-olx">
                                <div class=" px-2  text-start ">
                                    <div class="card-title py-1">
                                        <strong>bmw 2. 1.3 comfort</strong>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet.
                                    </p>
                                    <div class="xol-heart">
                                        <strong>550$</strong>
                                        <a href="#"> <i class="bi bi-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card xol  p-1 ">
                                <img src="./assets/img/product-2.webp" alt="" class="img-fluid img-olx">
                                <div class=" px-2  text-start">
                                    <div class="card-title py-1">
                                        <strong>bmw 2. 1.3 comfort</strong>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet.
                                    </p>
                                    <div class="xol-heart">
                                        <strong>550$</strong>
                                        <a href="#"> <i class="bi bi-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card xol  p-1">
                                <img src="./assets/img/product-3.webp" alt="" class="img-fluid img-olx">
                                <div class=" px-2 px-2  text-start">
                                    <div class="card-title py-1">
                                        <strong>bmw 2. 1.3 comfort</strong>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet.
                                    </p>
                                    <div class="xol-heart">
                                        <strong>550$</strong>
                                        <a href="#"> <i class="bi bi-heart"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="card xol  p-1 ">
                                <img src="./assets/img/product-4.webp" alt="" class="img-fluid img-olx">
                                <div class=" px-2  text-start">
                                    <div class="card-title py-1">
                                        <strong>bmw 2. 1.3 comfort</strong>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet.

                                    </p>
                                    <div class="xol-heart">
                                        <strong>550$</strong>
                                        <a href="#"> <i class="bi bi-heart"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-button-next swiper-navBtn text-dark"></div>
                </div>

            </div>
            <div class="row gy-5 py-4">
                <div class="col-md-3 col-sm-12">
                    <div class="card xol">
                        <div class="card-body text-start">
                            <img src="./assets/img/product-1.webp" alt="" class="img-fluid img-olx">
                            <div class="card-title py-4">
                                <strong>bmw 2. 1.3 comfort</strong>
                            </div>
                            <p>Lorem ipsum dolor sit amet. lorem 19
                                Lorem ipsum dolor sit amet.
                            </p>
                            <div class="xol-heart">
                                <strong>550$</strong>
                                <a href="#"> <i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="card xol">
                        <div class="card-body text-start">
                            <img src="./assets/img/product-2.webp" alt="" class="img-fluid img-olx">
                            <div class="card-title py-4">
                                <strong>bmw 2. 1.3 comfort</strong>
                            </div>
                            <p>Lorem ipsum dolor sit amet. lorem 19
                                Lorem ipsum dolor sit amet.
                            </p>
                            <div class="xol-heart">
                                <strong>550$</strong>
                                <a href="#"> <i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="card xol">
                        <div class="card-body text-start">
                            <img src="./assets/img/product-3.webp" alt="" class="img-fluid img-olx">
                            <div class="card-title py-4">
                                <strong>bmw 2. 1.3 comfort</strong>
                            </div>
                            <p>Lorem ipsum dolor sit amet. lorem 19
                                Lorem ipsum dolor sit amet.
                            </p>
                            <div class="xol-heart">
                                <strong>550$</strong>
                                <a href="#"> <i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="card xol">
                        <div class="card-body text-start">
                            <img src="./assets/img/product-4.webp" alt="" class="img-fluid img-olx">
                            <div class="card-title py-4">
                                <strong>bmw 2. 1.3 comfort</strong>
                            </div>
                            <p>Lorem ipsum dolor sit amet. lorem 19
                                Lorem ipsum dolor sit amet.
                            </p>
                            <div class="xol-heart">
                                <strong>550$</strong>
                                <a href="#"> <i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> -->


               <script>
                var cart = {
                    add: function(id)
                    {
                        let obj={};
                        obj.data_type = "add";
                        obj.id = id;
                    
                    },
                }
               // alert(cart.add.obj);
            </script>
      <?php 

      
        $this->view('includes/footer');
  ?>