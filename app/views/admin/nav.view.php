  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo ROOT?>/admin/dashboard" class="logo d-flex align-items-center">
   
        <span class="d-none d-lg-block"><?php echo WEB_NAME ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

     
        
        <li class="nav-item dropdown pe-5">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
 
          
         
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo esc(Auth::getUsername()) ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu  dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo esc(Auth::getUsername()) ?></h6>
              <span><?php echo esc(Auth::getRole_name()) ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

        
             <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo ROOT ?>">
                <i class="bi bi-house"></i>
                <span>Home</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

   

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo ROOT ?>/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <?php if(user_can('view_dashbord')): ?>
      <li class="nav-item">
        <a class="nav-link " href="<?php echo ROOT ?>/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php endif ?>

      <?php if(user_can('view_ads')): ?>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" href="#">
          <i class="bi bi-journal-text"></i><span>Products</span><i class="ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content  " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo ROOT ?>/admin/ads">
              <i class="bi bi-circle"></i><span>Products</span>
            </a>
        </ul>
      </li>
      <?php  endif;?>
      <!-- End My ads Nav -->

      <?php if(user_can('view_users')): ?>
      <li class="nav-item">
        <a class="nav-link "   href="<?php echo ROOT ?>/admin/users/view">
          <i class="bi bi-layout-text-window-reverse"></i><span>Users</span>
       
        </a>
       
      </li>
      <?php endif?>
      <!-- End users Tables Nav -->
         <?php if(user_can('view_order')):?>
            <li class="nav-item  mx-5" >
                <a class="nav-link active" aria-current="page" href="<?php echo ROOT?>/admin/orders/view">
                <i class="bi bi-cart4 pe-3 text-warning"></i>Orders</a>
            </li>
            <?php endif?>
       <?php if(user_can('view_categories')): ?>
       <li class="nav-item">
        <a class="nav-link collapsed" href="<?php  echo ROOT?>/admin/categories">
          <i class="bi bi-list"></i>
          <span>Categories</span>
        </a>
      </li>
      <?php endif ?>

       <?php if(user_can('view_roles')): ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php  echo ROOT?>/admin/roles">
          <i class="bi bi-people"></i>
          <span>Roles</span>
        </a>
      </li>
      <?php endif ?>

     


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php  echo ROOT?>/admin/profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
      <!-- End Profile Page Nav -->
         <li class="nav-item">
              <a class="nav-link" href="<?php echo ROOT ?>">
                <i class="bi bi-house"></i>
                <span>Home</span>
              </a>
            </li>

 
<!--End of publisi-->

    </ul>

  </aside><!-- End Sidebar-->


         