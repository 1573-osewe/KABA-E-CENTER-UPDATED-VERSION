<?php
class Ads_model extends Model
{
 
    public $errors=[];
    protected $table = 'ads';
    protected $afterSelect = [
        'get_category',
        'get_sub_catecory',
        'get_user',
        'get_price',
        'get_language',
           
    ];
    protected $beforeUpdate = [];
    protected $allowedColumns =[
        'title',
        'category_id',
        'sub_catecory_id',
        'user_id',
        'price',
        'language_id',
        'description',
        'features',
        'ad_image1',
        'ad_image_temp',
        'ad_image2',
        'ad_image3',
        'date',
        'approved',
        'published',
        'csrf_code',
        'slugt',
        
    ];
    
    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['category_id']))
        {
            $this->errors['category_id'] = "Please, select category";
        }
         if(empty(trim($data['title'])))
        {
            $this->errors['title'] = "Ad name or title is required!";
        }
        else if(!preg_match("/^[0-9a-zA-Z \-\_\&]+$/",trim($data['title'])))
        {
            $this->errors['title'] = "Please, only characters area required!";
        }



        if(empty($this->errors)){

            return true;
        }
          return false;  
    }



    public function validate_edit($data,$id=null)
     { 
        $this->errors = [];

        if(empty($data['category_id']))
        {
            $this->errors['category_id'] = "Please, select category";
        }
         if(empty(trim($data['title'])))
        {
            $this->errors['title'] = "Ad name or title is required!";
        }
        else if(!preg_match("/^[0-9a-zA-Z \-\_\&]+$/",trim($data['title'])))
        {
            $this->errors['title'] = "Please, only characters area required!";
        }
           if(empty(trim($data['description'])))
        {
            $this->errors['description'] = "Ad name or description is required!";
        }
        else if(preg_match("/^([A-Za-z0-9 \-\_]+\.[A-Za-z0-9]+(\r)?(\n)?)+$/",trim($data['description'])))
        {
            $this->errors['description'] = "Please, only characters area required!";
        }




        if(empty($this->errors)){

            return true;
        }
          return false;  
    }


  //functions running after select 



    
        protected function get_category($rows)
        {
         
          $db = new Database();
          if(!empty($rows[0]->category_id))
          {
            foreach ($rows as $key => $row) {
              $data['id'] = $row->category_id;
              $sql = "select * from categories where id = :id limit 1";
              $catego = $db->query($sql,$data);
              if(!empty($catego))
              { 
                $rows[$key]->category_row = $catego[0];
              }
            }
          }

          return $rows;
        }
        protected function get_sub_catecory($rows)
        {
          return $rows;
        }
        protected function get_user($rows)
        {
           
           $db = new Database();
          if(!empty($rows[0]->user_id))
          {
            foreach ($rows as $key => $row) {
               
              $data['id'] = $row->user_id;
              $sql = "select username, image, lastname, role from users where id = :id limit 1";
              $user = $db->query($sql,$data);
              if(!empty($user))
              { 
                $rows[$key]->user_row = $user[0];
              }
            }
          }

          return $rows;
        }


        protected function get_price($rows)
        {
           $db = new Database();
           if(!empty($rows[0]->price_id))
           {
            //show($rows[0]->price_id);die;
            foreach ($rows as $key => $row) {
              $data['id'] = $row->price_id;
              $sql ="select * from price where id = :id limit 1";
              $price = $db->query($sql, $data);
              if(!empty($price))
                {
                  $rows[$key]->price_row = $price[0];
                }
                
            }
           }
          return $rows;
        }
        protected function get_language($rows)
        {

          return $rows;
        }

}
