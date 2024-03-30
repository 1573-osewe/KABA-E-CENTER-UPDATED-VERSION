
  <?php 
        $this->view('includes/header');
         $this->view('includes/nav');
  ?>
    <section class="px-md-5 p-2  banner">

        <div class="container  text-center">
            <div class="row  gx-3" style="z-index:100; position: relative !important;">
                <div class="col-md-12 col-sm-12 p-md-4 mt-5">
                   

                    <div class="container px-5 mb-3 mt-5">
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

      <section class=" py-1">
        <div class="container ">
            <?php

           $categories = get_categories();?>

            <?php if(!empty($categories)) :?>
                <?php foreach($categories as $categ) :?>
                    <a href="<?php echo ROOT ?>/category/<?php echo esc($categ->slug) ?>"><div class="btn btn-success my-2"><?php echo esc($categ->category) ?></div></a>
                <?php endforeach?>
            <?php endif?>
        </div>    
    </section>

    <section class="p-md-4 p-1 ">
        <div class="container text-center">
            <div class="row g-3">


                <div class="col-md-9 col-sm-12 pe-md-4">
                     <?php if(!empty($rows)): ?>
                        <div class="h5 text-start mb-2 px-5"><b><?php echo esc (strtoupper(($rows[0]->category_row->category))) ?? ''?></b></div>
                        <?php foreach($rows as $product):?>
                            <div class="col-md-12 col-sm-12 list ">
                                <a href="<?php echo ROOT ?>/category/product/<?php echo esc($product->slugt)?>" class="d-md-flex text-md-start p-1" style="position: relative; cursor:pointer;">
                                    <img src="<?php echo get_image($product->ad_image1) ?>" class="list-product img-fluid   rounded " alt="">
                                    <div class="text-start px-md-5 px-sm-2"><br>
                                        <strong class="px-3"><?php echo esc($product->title)?? '' ?></strong><br>
                                        <small class="px-3"><?php echo esc($product->price) ?? '' ?></small>
                                        <div class="p-3 text-dark">
                                            <?php echo esc($product->description)?? '' ?>
                                        </div>
                                        <br><br>
                                        <div class="text-start px-3" style="position:absolute; bottom: 0; ">
                                             <?php echo time_for($row->date ?? 'unknown') ?>
                                        </div>
                                        <div style="position: absolute; bottom:0; right:1rem;">
                                            <i class="bi bi-heart"></i>
                                        </div>

                                    </div>
                                </a>
                                <hr>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div>no record</div>
                    <?php endif ?>
                </div>
                  

                <!--END-->

                <div class="col-md-3 col-sm-12  categories-list p-2">
                    <div class="container text-center cardd">
                        <div class="card text-start p-2">
                            <div class="card-body">
                                <strong><i class="bi bi-house-fill h5 pe-3" style="color: #FF9E0F;"></i>Real
                                    Estate</strong>
                                <ul class="card-text">
                                    <li>For sale</li>
                                    <li>To share</li>
                                    <li>For rent</li>
                                    <li>Land & Estate</li>
                                    <li>Appartment</li>
                                    <li>To share</li>
                                    <li>For rent</li>
                                    <li>Land & Estate</li>
                                    <li>Appartment</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card text-start p-2">
                            <div class="card-body">
                                <strong><i class="bi bi-cart3 h5 pe-3" style="color:#FF9E0F ;"></i>Shopping</strong>
                                <ul class="card-text">
                                    <li>Food</li>
                                    <li>IT & Software</li>
                                    <li>For rent</li>
                                    <li>Accessories</li>
                                    <li>Appartment</li>
                                    <li>To share</li>
                                    <li>For rent</li>
                                    <li>Land & Estate</li>
                                    <li>Appartment</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card text-start p-2">
                            <div class="card-body">
                                <strong><i class="bi bi-star-fill h5 pe-3" style="color:#116DB6;"></i>Services</strong>
                                <ul class="card-text">
                                    <li>Computer</li>
                                    <li>Business</li>
                                    <li>Cleaning</li>
                                    <li>Clothing</li>
                                    <li>Appartment</li>
                                    <li>To share</li>
                                    <li>For rent</li>
                                    <li>Land & Estate</li>
                                    <li>Appartment</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






      <?php 
        $this->view('includes/footer');
  ?>



  