
<?php  $this->view('admin/header') ?>
<?php  $this->view('admin/nav') ?>



<main id="main" class="main">
<?php if(user_can('view_categories')): ?>
    <!--ADDING CATEGORIES SECTION OR PAGE-->

    <?php if($action == 'add'): ?>
        <?php if(message()): ?>
              <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                          <i class="bi bi-exclamation-octagon me-1"></i>
                          <?php   echo message('',true);?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php endif ?>
    <?php if(user_can('add_categories')): ?>    
    <div class="card text-center mx-auto" style="width:30rem">
        <div class="card-body">
          <h5 class="card-title">Create categories</h5>
          <form method="post" class="row g-3">
            <div class="col-md-12">
              <input type="text" name="category" class="form-control" placeholder="Category name">
                <?php if(!empty($errors['category'])):?>
                    <div class="text-danger"><?php echo $errors['category'] ?></div>
                <?php endif;?>
            </div>
            <div class="col-md-12">
              <div class="py-1">Active</div>
              <select name="disabled" id="inputState"  class="form-select">
                <option value="0" selected="">Yes</option>
                <option value="1" >No</option>
              </select>
            </div>
            <div class="text-center">
              <a href="<?php echo ROOT ?>/admin/categories" class="btn btn-secondary">Back to categories list</a>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>  
    </div>    
          <?php else: ?>
            <div  class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-exclamation-octagon me-1"></i>
                  You dont have permission!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <a href="<?php echo ROOT ?>/admin/categories" class="btn btn-secondary">Back to categories list</a>
          <?php endif ?>

        


    <!--DELETE SECTION -->
    <?php elseif($action == 'delete'): ?>
      <?php if(!empty($row)): ?>
          <div class="card-body">
            <?php if(user_can('delete_categories')): ?>
          <h5 class="card-title">Delete category <?php echo esc(strtoupper($row->category)) ?? ''?>  if you are sure</h5>
          <form method="post" class="row g-3 ">
            <div class="col-md-12">
              <div class="form-control w-50"><?php echo  set_value('category',$row->category) ?></div>
            </div>
            <div class="col-md-12">
                <div class="py-2">Active </div>
                <div class="form-control w-50"><?php echo  set_value('disabled',$row->disabled)? 'No': 'Yes' ?></div>
            </div>
            <div class="text-center">
            <a href="<?php echo ROOT ?>/admin/categories" class="btn btn-secondary">Back to categories </a>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
          <?php else: ?>
            <div  class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-exclamation-octagon me-1"></i>
                  You dont have permission!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif ?>
        </div>
      <?php else: ?>    
        <div  class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            no record found to edit here!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif ?>


    <!--EDITING categories SECTION OR PAGE-->
    <?php elseif($action == 'edit'): ?>
    <?php if(!empty($row)): ?>
    <div class="row">
      <?php if(user_can('edit_categories') ): ?>
            <div class="col-lg-12">
              <div class="card text-center mx-auto" style="width:30rem">
                  <div class="card-body">
                    <h5 class="card-title">Edit category</h5>
                    <form method="post" class="row g-3">
                      <div class="col-md-12">
                        <input type="text" value="<?php echo  set_value('category',$row->category) ?>" name="category" class="form-control" placeholder="Category name">
                          <?php if(!empty($errors['category'])):?>
                              <div class="text-danger"><?php echo $errors['category'] ?></div>
                          <?php endif;?>
                      </div>
                      
                      <div class="col-md-12">
                        <select name="disabled" id="inputState"  class="form-select">
                          <option <?php echo set_select('disabled','0', $row->disabled) ?> value="0" selected="">Yes</option>
                          <option <?php echo set_select('disabled','1', $row->disabled) ?> value="1" >No</option>
                        </select>
                      </div>
                      <div class="text-center">
                                            <a href="<?php echo ROOT ?>/admin/categories" class="btn btn-secondary">Back to categories list</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
            <?php else: ?>
              <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                    You dont have permission!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php endif ?>
          
          <?php else: ?>    

          <div  class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-exclamation-octagon me-1"></i>
              no record found to edit!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          <?php endif ?>



      <!--TABLE SECTION OR PAGE-->
    <?php else:?>
        <?php if(user_can('view_categories')): ?>
        <div class="pagetitle">
          <h1>CATEGORIES</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="i<?php echo ROOT ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo esc($data['title']) ?? '' ?></li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body ">
                  <h5 class="card-title d-flex">
                    <a href="<?php echo ROOT ?>/admin/categories/add"><div class="btn btn-primary float-end ">Create new categories <i class="bi bi-node-plus h4"></i>
                    </div></a>
                  </h5>
                  <!-- Table with stripped rows -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead >
                        <tr >
                            <th scope="col">Id</th>
                            <th scope="col">Category</th>
                            <th scope="col">Active</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Actions<i class="bi bi-chevron-double-down px-1"></i></th>
                        </tr>
                        </thead>
                        <?php if(!empty($rows)): ?>    
                        <tbody >
                            <?php foreach ($rows as $row): ?>
                        <tr>
                            <th scope="row"><?php echo esc($row->id ?? 'unknown') ?></th>
                            <td><?php echo esc($row->category ?? 'unknown') ?></td>
                            <td><?php echo esc($row->disabled ? 'No': 'Yes' ?? 'unknown') ?></td>
                            <td><?php echo esc($row->slug ?? 'unknown') ?></td>

                            <td>
                                <a href="<?php echo ROOT ?>/admin/categories/delete/<?php echo $row->id ?>"><i class="bi bi-trash text-danger"></i></a>
                                
                                <a href="<?php echo ROOT ?>/admin/categories/edit/<?php echo $row->id ?>"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                        <?php endforeach  ?>
                        </tbody>
                        <?php else: ?>
                        <tr class='text-center'><td colspan = '6'>no recodes found</td></tr>
                        <?php endif ?>
                    </table>
                  </div>
                  <!-- End Table  -->
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php else: ?>
              <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                    You dont have permission!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php endif ?>

<?php  endif?>
    <?php else: ?>
              <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                    You dont have permission!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php endif ?>
</main>

<?php  $this->view('admin/footer') ?>
