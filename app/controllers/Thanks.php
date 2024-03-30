<?php
class Thanks extends Controller
{
    public function index()
    {
          if(!Auth::logged_in())
      {
        redirect('login');die;
      }

        $data = [];
        $data['title'] = "thank you";
        
        // $db = new Database();
        // $arr['user_id'] = Auth::getid();
        // $sql = "select * from payments where user_id = :user_id ORDER BY id desc limit 1";
        // $row = $db->query($sql, $arr);
        // if(is_array($row))
        // {
           
        //       $data['row'] =$row;
          
        // }
        
      
        $this->view('thank_you', $data);
    }
    
}