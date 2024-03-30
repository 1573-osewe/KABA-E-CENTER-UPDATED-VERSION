<?php

$categories = get_categories();


/*foreach($categories as $row)
{
    $category->update($row->id,['slug'=>str_to_url($row->category)]);
}*/


?>
<style>
    .cart-count {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 4px;
        font-size: 12px;
    }
</style>


<nav id="top-id" class="navbar top-navs  fixed-top navbar-expand-md">
        <div class="container">
            <button class=" navbar-togglerh" style="border:none ; background: #fff;" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="bi bi-justify-left" style="font-size:1.5rem ; color: #002f34;"></i>
            </button>
            <a class="navbar-brand" href="<?php echo ROOT ?>"><?php echo WEB_NAME?></a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><i class="bi bi-person"></i>
                        Hello, sign in
                    </h5>
                    <button type="button" class=" btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ">
                    <ul class="navbar-nav flex-grow-1 pe-3  mt-2">
                  


                        <li class="dropdown  ms-auto  menu-area">
                            <a style="font-size:1rem!important; font-weight:600 !important; color:#012970 !important;"  class="dropbtn nav-link">Business
                            </a>
                            <ul class="dropdown-content-2 ">
                                <div>
                                    <p style="font-size:0.8rem ;">Welcome to KABA E-CENTER</p>
                                    
                                </div>
                            </ul>
                        </li>
                    
                        <?php if(!Auth::logged_in()):  ?>
                        <li class="nav-item pe-md-3">
                            <a class="nav-link active btn" aria-current="page" href="<?php echo ROOT?>/login">Login</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active btn" aria-current="page" href="<?php echo ROOT ?>/signup">Sign Up</a>
                        </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>

            <div class="d-flex">
                <div class="nav-link pe-4">
                    
     
                    <span style="margin-left:1rem !important; position: relative;">
                        <a href="<?php echo ROOT ?>/cart"><i class="bi bi-cart h4"></i>
                      <?php  
                        $totalQty = 0;
                        if(isset($_SESSION['CART']))
                        foreach ($_SESSION['CART'] as $item) {
                            $totalQty += $item['qty'];
                        }?>
                        <span class="cart-count"><?php echo esc($totalQty)?></span> 
                       
                        </a>
                    </span>
                </div>
                
                <div class="dropdown   menu-area">
                    <a class="dropbtn d-flex">
                        <i class="bi bi-person h4"></i>
                        
                    </a>
                    <?php if(Auth::logged_in()): ?>
                    <ul class="dropdown-content-profile">
                        <div>
                            <p style="font-size:0.8rem ;"><i class="bi bi-person-fill pe-2"></i>Hi, <?php echo esc(Auth::getUsername('name')) ?></p>
                            <a href="<?php echo ROOT ?>/admin/dashboard"><p style="font-size:0.8rem ;"><i class="bi bi-pencil-fill pe-2"></i>Dashboard</p></a>

                          
                            <p style="font-size:0.8rem ;"><i class="bi bi-gear-fill pe-2"></i>Settings
                            </p>
                            <a href="logout"><p style="font-size:0.8rem ;"> <i class="bi bi-power pe-2"></i>Logout </p></a>
                        </div>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>