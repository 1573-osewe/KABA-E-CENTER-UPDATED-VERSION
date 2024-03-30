<?php
class Price extends Model
{
 
    public $errors=[];
    protected $table = 'price';
    protected $allowedColumns =[
        'name',
        
      
    ];
    
    public function validate($data)
    {
        $this->errors = [];

          if(empty($data['category']))
        {
            $this->errors['category'] = "Please, select price";
        }
          else  if (!preg_match("/^[0-9]+$/", $data['category']))
            {
                $this->errors['category'] = "Only numbers required!";
            }
        

        if(empty($this->errors)){

            return true;
        }
          return false;  
    }



    


}
