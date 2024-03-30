
<?php  $this->view('admin/header') ?>
<?php  $this->view('admin/nav') ?>



 <main id="main" class="main">

<!--ADDING ADS SECTION OR PAGE-->
<?php if($action == 'add'): ?>
     <?php if(message()): ?>
          <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i>
                      <?php   echo message('',true);?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

    <?php endif ?>
<div class="card text-center mx-auto" style="width:30rem">
    <div class="card-body">
      <h5 class="card-title">Post your add</h5>
      <!-- No Labels Form -->
      <form method="post" class="row g-3">
        <div class="col-md-12">
          <input type="text" name="title" class="form-control" placeholder="Product name">
            <?php if(!empty($errors['title'])):?>
                <div class="text-danger"><?php echo $errors['title'] ?></div>
            <?php endif;?>
        </div>
        
        <div class="col-md-12">
          <select name="category_id" id="inputState"  class="form-select">
            <option value="" selected="">Choose category...</option>


            <?php if(!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
            <option  <?php echo set_select('category_id', $category->id)?>   value="<?php echo esc($category->id) ?>">
            <?php echo esc($category->category) ?></option>
            <?php endforeach ?>
            <?php endif ?>
          </select>

            <?php if(!empty($errors['category_id'])):?>
                <div class="text-danger"><?php echo $errors['category_id'] ?></div>
            <?php endif;?>
        </div>
        <div class="text-center">
                              <a href="<?php echo ROOT ?>/admin/ads" class="btn btn-secondary">Back to ads list</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
</div>
    
<!--delete -->
<?php elseif($action == 'delete'): ?>
  <?php if(!empty($row)): ?>
    <form method='POST'>
      <div class="row">
          <div class="col-lg-12">
            <div class="card py-2">
              <a href="<?php echo ROOT ?>/admin/ads"> <div class="btn btn-dark mx-auto " style="position:fixed; right:6.8rem; z-index:100;">Back</div></a>
                <button  class="btn btn-danger   mx-auto" style="position:fixed; right:2rem; z-index:100;">Delete</button>
                <div class="card-body">
                  <h5 class="card-title pe-5">DELETE  <strong><?php echo esc($row->title ?? 'unknown') ?></strong></h5>
                  <h5><small><b>DELETE</b></small> <?php echo esc($row->category_row->category ?? 'unknown') ?></h5>
                </div>
              </div>
            </div>
          </div> 
      </div> 
    </form>
  <?php else: ?>    
    <div  class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        no record found to edit!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

<!--EDITING ADS SECTION OR PAGE-->
<?php elseif($action == 'edit'): ?>

<?php if(!empty($row)): ?>
<div class="row">
        <div class="col-lg-12">
          <div class="card py-2">
            <a href="<?php echo ROOT ?>/admin/ads"> <div class="btn btn-dark mx-auto" style="position:fixed; right:6.5rem; z-index:100;">Back</div></a>
            <div onclick = "save_data()" class="btn btn-success save disabled mx-auto" style="position:fixed; right:2rem; z-index:100;">Save</div>
            <div class="card-body">
                     
          
              <h5 class="card-title pe-5">EDIT SECTION <strong><?php echo esc($row->title ?? 'unknown') ?></strong></h5>
           
              <div class="accordion">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button onclick="show_data()"  class="accordion-button collapsed  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                      Product landing Page
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse   containerDiv"  data-bs-parent="#accordionExample" style="">
                    <!--here-->
                  
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Accordion Item #2
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                     <input oninput = "save_changes()" type="text" class="form-control">
                    </div>
                  </div>
                </div>
             
              </div><!-- End Default Accordion Example -->

            </div>
          </div>

        </div>
      </div>
  <?php else: ?>    

  <div  class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
      no record found to edit!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <?php endif ?>
  <!--TABLE SECTION OR PAGE-->
<?php else:?>
    <div class="pagetitle">
      <h1>products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="i<?php echo ROOT ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $data['title'] ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body ">
              <h5 class="card-title d-flex">
                <a href="<?php echo ROOT ?>/admin/ads/add"><div class="btn btn-primary float-end ">Post new ads <i class="bi bi-node-plus h4"></i>

                </div></a>

              </h5>
              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead >
                    <tr >
                      <th scope="col">id</th>
                      <th scope="col">Title</th>
                      <th scope="col">Image</th>
                        <th scope="col">Owner</th>
                      <th scope="col">Category</th>
                      <th scope="col">Price</th>
                      <th scope="col">Date</th>
                      <th scope="col">Actions<i class="bi bi-chevron-double-down px-1"></i></th>
                    </tr>
                  </thead>
                  <?php if(!empty($rows)): ?>    
                  <tbody >
                      <?php foreach ($rows as $row): ?>
                    <tr>
                      <th scope="row"><?php echo esc($row->id ?? 'unknown') ?></th>
                      <td><?php echo esc($row->title ?? 'unknown') ?></td>
                      <td><img src="<?php echo get_image($row->ad_image1) ?>" style="width:90px; height:90px; object-fit:contain"/></td>
                      <td><?php echo esc($row->user_row->username ?? 'unknown') ?></td>
                      <td><?php echo esc($row->category_row->category ?? 'unknown') ?></td>
                      <td><?php echo esc($row->price ?? 'unknown') ?></td>
                      <td><?php echo date_for($row->date ?? 'unknown') ?></td>

                      <td>
                          <a href="<?php echo ROOT ?>/admin/ads/delete/<?php echo $row->id ?>"><i class="bi bi-trash text-danger"></i></a>
                          
                          <a href="<?php echo ROOT ?>/admin/ads/edit/<?php echo $row->id ?>"><i class="bi bi-pencil-square"></i></a>
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
</main>
<?php endif ?>



<script>

function show_data() {
  send_data({
    //adding the list of data to be send to server
    data_type:"read",
    
   
  });
}



function send_data(obj) {
  //ajax
  var xml = new XMLHttpRequest();

  var form = new FormData();
  for (key in obj) {
    form.append(key, obj[key]);
  }
  xml.addEventListener('readystatechange', function () {

    if (xml.readyState == 4) {
      if (xml.status == 200) {

        //console.log(xml.responseText);
        handle_result(xml.responseText)
        //window.location.reload();
      }

    }
  });
  xml.open('post', '', true);
  xml.send(form);
}
function handle_result(result)
{
 

   
      




  
  if(result.substr(0,2) == '{"')
    {
      const obj = JSON.parse(result);
      if(typeof obj == 'object')
      {
         if( obj.data_type == 'save')
          {
            alert(obj.data);
            save_btn = false;
          }
      
      }
    }
   else
   {
     const containerDiv = document.querySelector(".containerDiv")
    containerDiv.innerHTML = result;
   
   }

   
   
}

//save data

function save_data()
{
  

  var divContent = document.querySelector(".containerDiv");
  var inputs =divContent.querySelectorAll("input, textarea, select");
  
  var obj = {};
  obj.data_type ='save';
  for (let i = 0; i < inputs.length; i++) {
     var key = inputs[i].name;
     obj[key] = inputs[i].value;
  }
  send_data(obj);
}



//disable and enable save button
var save_btn = false;

function save_changes() {
  if (!save_btn) {
    document.querySelector(".save").classList.remove("disabled");
    document.querySelector(".save").style.backgroundColor = "orange";
  }
}


//saving or loading image

//upload
//upload_ad_image
var image_uploading = false;
xml = null;
function load_image(file)
  {
    if(image_uploading)
    {
      alert("waiting");
      
    }//validating ad image extention
      var allowed_image_types  = ['jpg','jpeg', 'png'];
      var ext = file.name.split(".").pop();
      ext = ext.toLowerCase();
    if(!allowed_image_types.includes(ext))
    {
        alert("only these image types are allowed "+ allowed_image_types.toString(","))
        return;
    }
    console.log(ext);
    image_uploading = true;


    var image = document.querySelector('.editing-image');
    var path = URL.createObjectURL(file);
    image.src= path;
    document.querySelector('.image-name').innerHTML = file.name;
    document.querySelector(".cancel").classList.remove("hide");
  


    xml = new XMLHttpRequest();
    var myform = new FormData();

    xml.addEventListener('readystatechange', function () {
      if (xml.readyState == 4) {
        if (xml.status == 200) {

          alert(xml.responseText);
          //var 
          //window.location.reload();
        }
          document.querySelector(".name").classList.remove("hide");
        document.querySelector(".cancel").classList.add("hide");
        image_uploading = false;

      }
    });

    xml.upload.addEventListener('progress', function(e) {
    var percent = Math.round((e.loaded / e.total) *100 );
      document.querySelector('.progress-container').style.width = percent + '%';
      document.querySelector('.progress-container').innerHTML = percent + '%';
      document.querySelector(".name").classList.add("hide");

    });
    myform.append('data_type','ad_image_upload');
    myform.append('image',file);
      myform.append('csrf_code',document.querySelector('.js_csrf').value);

    xml.open('post', '', true);
    xml.send(myform);
  }
//to cancel upload
 
function ads_image_cancel_upload()
{
  xml.abort();
}
</script>




<?php  $this->view('admin/footer') ?>
