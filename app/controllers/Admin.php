<?php
class Admin extends Controller
{
   
    public function index()
    {
     if(! Auth::logged_in())
      {
         redirect('home');
      }
       
        $data['title'] = "404";
      $this->view('admin/404', $data);
    }

    public function dashboard()
    {
     
        if(! Auth::logged_in())
          {
            redirect('home');
          }
          if(!user_can('view_dashbord'))
          {
            redirect('admin/ads');
          }
        
        $data['title'] = "dashboard";
      $this->view('admin/dashboard', $data);
        
    }
 
//PROFILE METHHODS

    public function profile($id = null)
    {

       if(! Auth::logged_in())
      {
         redirect('login');
      }
        //escaping typing ig in url
       //$id = $id  ?? Auth::getid();
        $id =Auth::getid();
          $user = new User();
          $arr['id'] = $id;
          $data['row'] = $row   = $user->first($arr);
             if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
              {
                //if there is any image 
                //check if yhe filename exist first
                //to bypass errors
                $folder = "uploads/images/";
                if(!file_exists($folder))
                {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder.'index.php','');
                    file_put_contents('uploads/index.php', '');
                }
                if($user->validate_edit($_POST,$id))
                {
                    
                  $allowed = ['image/jpeg', 'image/png'];
                  
                  if(!empty($_FILES['image']['name']))
                  {
                    if($_FILES['image']['error'] == 0)
                    {
                      if(in_array($_FILES['image']['type'], $allowed))
                      {
                        $destination = $folder.time().$_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                        resize_image($destination);
   
                    
                        $_POST['image'] = $destination;
                        if(file_exists($row->image))
                        {
                          unlink($row->image);
                        }
                      //echo $destination;
                      }
                      else{

                        $user->errors['image'] = "File type is not allowed";
                      }
                    }
                    else
                    {
                      $user->errors['image'] = "cound not upload image";
                    }
                  }
                 
                  $user->update($id, $_POST);
                 
                  
               }
               if(empty($user->errors))
               {
                    message("successfully saved");
                  redirect('admin/profile/'.$id);
               }
            
              }
             
       $data['errors']= $user->errors;
      $data['title'] = "profile";
      $this->view('admin/profile', $data);
    }



//ADS METHODS

    public function ads($action =null, $id = null)
    {
       
      if(! Auth::logged_in())
      {
         redirect('login');
      }

      $user_id = Auth::getId();
      $data['action'] = $action;
      $data['id'] = $id;
      $data['title'] = "ads";


      $categories = new Category_model();
      $ads = new Ads_model();
      $price = new Price();


      if($action == "add")
      {
        $data['categories'] = $categories->findALL();
       
         if($_SERVER['REQUEST_METHOD'] == 'POST' )
              {
                
                if($ads->validate($_POST))
                {
                  
                  /**
                   * slug for title majaribu
                   */
                  $_POST['slugt'] = str_to_url($_POST['title']);
                  //show($_POST);die;
                    //insert into database
                    $_POST['price_id'] = 1;
                    $_POST['user_id'] = $user_id;
                    $_POST['date'] = date('Y:m:d H:i:s') ;
                    //show($_POST);die;
                    $ads->insert($_POST);
                     
                    $row = $ads->first(['user_id'=>$user_id, 'published'=>0]);
                    message("Ad posted successfuly");
                    $id = $row->id;
                    if($row)
                    {
                      redirect('admin/ads/edit/'.$id);
                    }
                    else{
                      redirect('admin/ads');
                    }
                    
                }
              }
              $data['errors']= $ads->errors;
              
              

      } 
      elseif($action == "delete")
      {
        $categories = $categories->findALL();
         $prices = $price->findALL();

         $data['row'] = $row  = $ads->first(['user_id'=>$user_id,'id'=>$id]);
        
          if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
              {
                $ads->delete($row->id);
                message('successfuly deleted');
                redirect('admin/ads');
              }
      }

      elseif($action == "edit")
      {
        
         $categories = $categories->findALL();
         $prices = $price->findALL();

         $data['row'] = $row  = $ads->first(['user_id'=>$user_id,'id'=>$id]);
        
          if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
              {
                

                  if(!empty($_POST['data_type']) && $_POST['data_type'] == "read")
                  { 
                    //require "../app/views/ads-edit-accordion/ads-landing-page.view.php";
                    include ads_edit_view_path('ads-edit-accordion/ads-landing-page');


                    
    
                  }
                  else if(!empty($_POST['data_type']) && $_POST['data_type'] == "save") 
                  { 

                    //check form valid that is csrf
                    if( $_SESSION['csrf_code'] == $_POST['csrf_code'])
                    {

                      if($ads->validate_edit($_POST))
                      { 
                          //if temp image exist that is areleady or the old image inside my temp in my ads tembe
                          //i need to move it to the main and empty that clmn
                          //now let me swap
                      
                          if(!empty($row->ad_image_temp) && file_exists($row->ad_image_temp) && $row->csrf_code == $_POST['csrf_code'])
                          {
                            //removing current ad image that is image 1
                            if(file_exists($row->ad_image1))
                            {
                              unlink($row->ad_image1);
                            }
                            $_POST['ad_image1']= $row->ad_image_temp;
                            $_POST['ad_image_temp'] = '';
                          }
                         
                          $ads->update($id,$_POST);
                        
      
                          $info['data'] = 'saved successfuly';
                          $info['data_type'] = 'save';
                        
                        
                      }
                      else
                      {
                        
                          $info['errors'] = $ads->errors;
                           show($info);
                          $info['data'] = 'fix errors';
                          $info['data_type'] = 'save';   
                      }
                    }
                    else
                        {
                            $info['errors'] = ['key'=>'value'];
                            $info['data'] = 'file is not valid';
                            $info['data_type'] = $_POST['data_type'];
                    
                        }
                    echo json_encode($info);
                  } 
                  
                  else if(!empty($_POST['data_type']) && $_POST['data_type'] == "ad_image_upload"   ) 
                  {  
                   
                    $errors = [];
                    if(!empty($_FILES['image']))
                    {
                      $folder = "uploads/ads/";
                      if(!file_exists($folder))
                      {
                        mkdir($folder,0777, true);
                      }

                      $destination = $folder.time().$_FILES['image']['name'];

                      move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                      //delete temp the previous
                      if(file_exists($row->ad_image_temp))
                      {
                        unlink($row->ad_image_temp);
                      }
                      $data['ad_image_temp']= $destination;
                      $data['csrf_code'] =$_POST['csrf_code'];
                  
                      $ads->update($id,$data);
                    }
                    //show($_POST);
                    show($_FILES);
                  }
                
                
                die;
              }
           
      }
      else {
          $data['rows'] = $ads->where(['user_id'=>$user_id]);
    

      }

           
      
      $this->view('admin/ads', $data);
    }





//CATEGORIES FUNCTION METHOD
      public function categories($action =null, $id = null)
    {
       if(user_can('view_categories'))
      
         
       
          if(! Auth::logged_in())
            {
              redirect('login');
            }
         
                $user_id = Auth::getId();
                $data['action'] = $action;
                $data['id'] = $id;
                $data['title'] = "categories";


                $categories = new Category_model();
                $ads = new Ads_model();
              

              if(user_can('view_categories'))
              {
      
                if($action == "add")
                {
                  $data['categories'] = $categories->findALL();
                
                  if($_SERVER['REQUEST_METHOD'] == 'POST' )
                        {
                          if(user_can('add_categories'))
                          {
                            if($categories->validate($_POST))
                            {
                                //insert category and disabled in the category  into database
                                //$_POST['user_id'] = $user_id;
                                $_POST['slug'] = str_to_url($_POST['category']);
                                //show($_POST);die;
                                $categories->insert($_POST);
                            
                                message("category created  successfuly");
                          
                                  redirect('admin/categories');
                              
                                
                            }
                          }
                          else
                          {
                            $categories->errors['category'] = 'You have no permission!';
                          }
                            $data['errors']= $categories->errors;
                        }
                        

                } 
                elseif($action == "delete")
                {
                
                  $data['row'] = $row  = $categories->first(['id'=>$id]);
                  
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
                        {
                          if(user_can('delete_categories'))
                          {
                        
                            $categories->delete($row->id);
                            message('successfuly deleted');
                            redirect('admin/categories');
                          }
                        }
                }

                elseif($action == "edit")
                {
          
                  $data['row'] = $row  = $categories->first(['id'=>$id]);

                  if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
                        {
                          if(user_can('edit_categories'))
                          {
                        
                            if($categories->validate($_POST))
                            {
                                //insert category and disabled in the category  into database
                                //$_POST['user_id'] = $user_id;
                                //$_POST['slug'] = str_to_url($_POST['category']);
                                //show($_POST);die;
                                $categories->update($row->id,$_POST);
                            
                                message("category created  successfuly");
                          
                                  redirect('admin/categories');
                              
                                
                            }
                          }
                          $data['errors']= $categories->errors;
                        }   
                }
                else 
                {
                    if(user_can('view_categories'))
                    {
                      $data['rows'] = $categories->findALL();
                    }
                    
                }
              }
                
            
            $this->view('admin/categories', $data);
    
  }



  //PERMISSIONS FUNCTION METHOD
      public function roles($action =null, $id = null)
    {
       
          if(! Auth::logged_in())
            {
              redirect('login');
            }
         
            $user_id = Auth::getId();
            $data['action'] = $action;
            $data['id'] = $id;
            $data['title'] = "role";


            $role = new Role();
            //$ads = new Ads_model();
          

            if(user_can('view_roles'))
            {
              if($action == "add")
              {
                $data['role'] = $role->findALL();
              
                if($_SERVER['REQUEST_METHOD'] == 'POST' )
                      {
                        if(user_can('add_role'))
                        {
                          if($role->validate($_POST))
                          {
                              //insert category and disabled in the category  into database
                              //$_POST['user_id'] = $user_id;
                              $_POST['slug'] = str_to_url($_POST['category']);
                              //show($_POST);die;
                              $role->insert($_POST);
                          
                              message("Role created  successfuly");
                        
                                redirect('admin/roles');
                            
                              
                          }
                        }
                        else
                        {
                          $role->errors['category'] = 'You have no permission!';
                        }
                          $data['errors']= $role->errors;
                      }
                      

              } 
              elseif($action == "delete")
              {
              
                $data['row'] = $row  = $role->first(['id'=>$id]);
                
                  if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
                      {
                        if(user_can('delete_role'))
                        {
                      
                          $role->delete($row->id);
                          message('successfuly deleted');
                          redirect('admin/roles');
                        }
                      }
              }

              elseif($action == "edit")
              {
        
                $data['row'] = $row  = $role->first(['id'=>$id]);

                if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
                      {
                        if(user_can('edit_role'))
                        {
                      
                          if($role->validate($_POST))
                          {
                              //insert category and disabled in the category  into database
                              //$_POST['user_id'] = $user_id;
                              //$_POST['slug'] = str_to_url($_POST['category']);
                              //show($_POST);die;
                              $role->update($row->id,$_POST);
                          
                              message("category created  successfuly");
                        
                                redirect('admin/roles');
                            
                              
                          }
                        }
                        $data['errors']= $role->errors;
                      }   
              }
              else 
              {
                //VIEWING OR GETTING ALL ROLES THAT IS ELSE AFETR ACTIONS
                
                    $data['rows'] = $role->findALL();
                  
                  
                  if($_SERVER['REQUEST_METHOD'] == 'POST' )
                      { 
                        //disable permissions before we do anything
                      $sql = "update permission_role set disabled = 1 where id > 0";
                      $role->query($sql);

                        foreach ($_POST as $key => $permission) {
                          echo $permission;
                          if(preg_match("/[0-9]+\_[0-9]+/", $key))
                          {
                            $row_id = preg_replace("/\_[0-9]+/", "",$key);
                            //if record exist
                           
                            $datas =[];
                            $datas['role_id'] = $row_id;
                            $datas['permission']= $permission;

                            $sql = "select id from permission_role  where permission = :permission and role_id = :role_id limit 1";
                            $chck = $role->query($sql, $datas);
                            if($chck)
                            {
                              //we update if the record is found
                            $sql = "update  permission_role  set disabled = 0 where  permission = :permission  &&  role_id = :role_id limit 1";
                            }
                            else{
                              //then int database permission_roles table if record not found
                              $sql = "insert into permission_role (role_id, permission) values (:role_id, :permission)";
                            }
                            //show($sql);
                          // show($datas);die;
                            $role->query($sql, $datas);
                          }
                        }
                        //die;
                        redirect('admin/roles');
                      }
                    
              }
            }
            
            $this->view('admin/roles', $data);
                
  }

    public function users($action='',$id='')
    {
       if(!Auth::logged_in())
      {
        redirect('login');die;
      }
     
    
      $user = new User();
      $data=[];
      $data['action'] = $action;
      if(!Auth::logged_in())
      {
         //redirect('login');die;
      }
        if(!Auth::is_admin())
        {
         // redirect('login');die;

        }
        if($action == "add")
        {  if(Auth::user_can('add_user') )
        {

        }
        }
        elseif($action == "delete")
        {
        if(Auth::user_can('delete_user') )
        {
          if($_SERVER['REQUEST_METHOD'] == "POST")
          {
             $arr['id'] = $id;
             $user->delete($arr);
             message("deleted succefully");
             redirect("dashboard/users");
          }
        }
         
        }
        elseif($action == "edit")
        {
            if(Auth::user_can('edit_user') )
        {
        }
        }


      $rows = $user->findAll();
      $data['rows']= $rows;
      $this->view('admin/users',$data);

      
  
    }

    //ORDERS
    public function orders($action='', $id='')
    {
     
      if(!Auth::logged_in())
      {
        redirect('login');die;
      }

  
        
      
      $data= [];
      $data['title']= "admin - Orders";
      $data['action'] = $action;


      $order = new Order();
      $user = new User();

      $query = "select * from payments order by id desc";
      $payment = $order->query($query);
    
      $data['payment'] = $payment;


       // $orders = $order->get_all_Orders();

          
      if(user_can('view_order'))
      {

        $sql = "SELECT orders.*, order_details.*
              FROM orders
              JOIN order_details ON orders.order_id = order_details.order_id;
              ";
        $orders = $order->query($sql);


         //show($orders);die;
          if(is_array($orders))
          {
            
              foreach($orders as $key => $row) 
              {
                
                $details = $order->getOrders_details($row->order_id);
                $orders[$key]->grand_total = 0;
                if(is_array($details))
                {
                  $total = array_column($details,'total');
                  $grand_total = array_sum($total);
                  $orders[$key]->grand_total = $grand_total ;
                }
                

                $orders[$key]->details = $details;
                
                
                $result = $user->first(['id'=>$row->user_id]);
          
                  
                  $result = $result;
                  $orders[$key]->user = $result;
          

              
              }
          }
          }

         

        $data['orders'] = $orders;
       $this->view('admin/orders', $data);
    }
}
