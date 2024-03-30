<?php
class Category_model extends Model
{
 
    public $errors=[];
    protected $table = 'categories';
    protected $allowedColumns =[
        'category',
        'slug',
        'disabled',
      
    ];
    
    public function validate($data)
    {
        $this->errors = [];

          if(empty($data['category']))
        {
            $this->errors['category'] = "Please, enter your category";
        }
          else  if (!preg_match("/^[a-zA-Z \&\']+$/", $data['category']))
            {
                $this->errors['category'] = "Only Letter, $ and spaces required!";
            }
        

        if(empty($this->errors)){

            return true;
        }
          return false;  
    }



    


}
