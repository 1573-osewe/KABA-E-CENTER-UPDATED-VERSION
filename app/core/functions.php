<?php

function show($arr)
{
    echo "<br>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
function time_for($time)
{
   return date("D, h:ia", strtotime($time));
}


function date_for($date)
{
      return date("jS M, Y", strtotime($date));
}

function set_value($key, $def='')
{
  
    if(!empty($_POST[$key]))
   {
      return $_POST[$key];
   }
   else if(!empty($def))
   {
      return $def;
   }
   return '';
}
function set_select($key,$value, $def='')
{
     if(!empty($_POST[$key]))
   {
      if($value == $_POST[$key])
      {
         return ' selected ';
      }
      
   }
   else if(!empty($def))
   {
      if($value == $def)
      {
         return ' selected ';
      }
   }
   return '';

}

function set_check($key,$value, $def='')
{
     if(!empty($_POST[$key]))
   {
      if($value == $_POST[$key])
      {
         return ' checked ';
      }
      
   }
   else if(!empty($def))
   {
      if($value == $def)
      {
         return ' checked ';
      }
   }
   return '';

}
//to filter ther output to the view once is available in the database
function esc($str)
{
     //return nl2br(htmlspecialchars($str));
     return htmlspecialchars($str);
}//Redirect method
 function  redirect($link)
 {
    header("Location: ".ROOT."/".$link);
    die;
 }




 //Assigning message to a globle valiable and delete oce delivered
 function message($message = '', $delete=false)
 {
    if(!empty($message))
    {
       $_SESSION['message'] = $message;
      
    }
    else
    {
         if(!empty($_SESSION['message']))
         {
            $message = $_SESSION['message'];
              if($delete)
                {
                    unset($_SESSION['message']);
                }
                return $message;
         }
       
    }
    return false;
 }

 //normally ni ya slug so ina..convert category and replaces characters that is SLUg
 function str_to_url($url)
{
    $url = str_replace("'", "", $url);
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);

    return $url;
}


//image resizing
function resize_image($filename, $max_size = 700)
{
       $extention = explode('.', $filename);
       $extention = strtolower(end($extention));
   if(file_exists($filename))
   {
      switch ($extention) {
         case 'jpeng':
         case 'jpeg':
               $image = imagecreatefromjpeg($filename);
            break;
         case 'png':
               $image = imagecreatefrompng($filename);
            break;
      
         default:
               $image = imagecreatefromjpeg($filename);
            break;
      }

      $src_width = imagesx($image);
       $src_height = imagesy($image);
       if($src_width > $src_height)
       {
         $dst_width =  $max_size;
         $dst_height = ($src_height / $src_width) * $max_size ;
       }
         else
       {
         
         $dst_width = ($src_width / $src_height) * $max_size ;
         $dst_height =  $max_size;
       }

       $dst_image = imagecreatetruecolor($dst_width, $dst_height);
       imagecopyresampled(
             $dst_image,
             $image,
             $dst_x = 0,
             $dst_y = 0,
             $src_x = 0,
             $src_y = 0,
             $dst_width,
             $dst_height,
             $src_width,
             $src_height
       );
       imagedestroy($image);
       
       switch ($extention) {
         case 'jpeng':
         case 'jpeg':
               imagejpeg($dst_image , $filename, 50);
            break;
         case 'png':
               imagepng($dst_image , $filename, 50);
            break;
      
         default:
               imagejpeg($dst_image , $filename, 50);
            break;
      }
       imagedestroy($dst_image);
     
   }
}


//function for including the ads view edit page just bez of im using javascrip to in include the content

function ads_edit_view_path($path)
{
   //extract($data);
   return "../app/views/".$path.".view.php";
}
function get_image($img)
{
   $img_file =  $img;
   if(file_exists($img_file))
   {
      return ROOT."/".$img_file;
   }
   
    return ROOT."/assets/img/placeholder-image.jpg";
}

//preventing cross site request forgry

function csrf()
{
   $code = md5(time());
   $_SESSION['csrf_code'] = $code;
   echo "<input class='js_csrf' name='csrf_code' type='hidden' value='$code' />" ;
}

function get_categories($id=null)
{
   $category = new Category_model();
 if($id)
 {  $category->limit= 1;
   return $category->where(['disabled'=>0,'id'=>$id]);
 }
    $category->limit= 250;
    $category->order = 'asc';
   return $category->where(['disabled'=>0]);
}

//PERMISSION FUNCTION naeza place it in Auth class lakini let it stay here 
function user_can(string $permission):bool
{ 
    strtolower($permission);

   $role = Auth::getRole();
   if(Auth::is_admin())
   {
      return true;
   }
   $db = new Database();
   if(Auth::logged_in())
   { 
       //return true;
       $sql = "select permission from permission_role where disabled = 0 && role_id  = :role";
      $myroles = $db->query($sql,['role'=>$role]);
      if($myroles){
         $myroles = array_column($myroles, 'permission');
      }
      else
      {
         $myroles = [];
      }
   
      if(in_array($permission,$myroles))
      {
                  return true;
      }

   }
  return false;

}

function is_paid($order)
{
    $db = new Database();
   // $arr['user_id'] = $order->user_id;
    $arr['order_id'] = $order->order_id;
    //$arr['status'] = "canceled";
    //$sql = "select * from payments where status = :status && user_id = :user_id && order_id = :order_id order by id desc";
    //$sql = "select status from payments where user_id = :user_id && order order_id = :order_id order by id desc";
    $sql = "select * from payments where order_id = :order_id ";
    
    $result = $db->query($sql, $arr);
    
    if(is_array($result))
    {
     
        foreach($result as $row)
        {
            if($row->status == "canceled")
            {
                return  "<span class='badge bg-danger'>canceled</span>";
            }
            elseif($row->status == "success")
            {
                return   "<span class='badge bg-success'>success</span>";
            }
            else{
                return "<span class='badge bg-secondary'>processing</span>";
            }
             
        }
    }

   

       




    
    
    
}
