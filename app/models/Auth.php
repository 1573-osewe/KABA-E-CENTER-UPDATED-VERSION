<?php
class auth{
     public static function authenticate($row)
     {
        if(is_object($row))
        {
            $_SESSION['USER_DATA'] = $row;
        }
     }
       public static function logout()
     {
        if(!empty($_SESSION['USER_DATA']))
        {
            unset($_SESSION['USER_DATA']);
        }
   
     }

      public static function is_admin()
     {
        if(!empty($_SESSION['USER_DATA']))
        {
           
           if(!empty($_SESSION['USER_DATA']->role_name))
           {
            if(strtolower($_SESSION['USER_DATA']->role_name) == 'admin')
               {
                  return true;
               }
           }
            
        }
        else
        {
            return false;
        }
     }

     public static function logged_in()
     {
        if(!empty($_SESSION['USER_DATA']))
        {
            return  true;
        }
        else
        {
            return false;
        }
     }

      public static function __callstatic($fuction, $key)
     {
        $key = str_replace('get','', $fuction);
        $key = strtolower($key);
         if(!empty($_SESSION['USER_DATA']->$key))
        {
           return  $_SESSION['USER_DATA']->$key;
        }
    
     }
     public static function valide_email($email)
     {
        $user = new User();
        $arr['email'] = addslashes($email);

        $sql = "select * from users where  email = :email limit 1";
        $result = $user->query($sql,$arr);
  
        if($result)
        {   
            if(count($result) > 0)
            {
                return true;
            }   
        }

        return false;
    }
     
    public static function is_code_correct($code)
    {
        $reset = new Reset();
        
        $arr['code'] = addslashes($code);
        $expire = time();
        $arr['email'] = addslashes($_SESSION['reset_email']);

       //$sql = "select * from reset where  email = :email && code = :code  order by id desc limit 1";
       $sql = "select * from reset where  email = :email && code = :code   limit 1";
        $result = $reset->query($sql,$arr);

        
  
        if($result)
        {   
            if(count($result) > 0 && $result[0]->expire < $expire)
            {
                 return "success";
            }
            else{
                return $$expire." code is expired ". $result[0]->expire ;
            //     $curr = date('Y-m-d H:i:s', $expire);
            //    $ex = date('Y-m-d H:i:s', $result[0]->expire);

            //    if($expire)
            //     return "Expire  ".$ex ." current  " .$curr ;
            }
            
           
        }

        return "incorret code";
    }

    public static function save_password($password)
    {
        $user = new User();
        $data['password'] = $password;
        
        $data['email'] = $_SESSION['email'];
        // $sql = "delete   from reset where  email = :email limit 1";
        // $result = $reset->query($sql,['email'=>]);

        $sql = "update users set password = :password where email = :email";
        $user->query($sql,$data);
        
        
    }
}