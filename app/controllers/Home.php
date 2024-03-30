<?php
class Home extends Controller
{
   
    public function index()
    {

      //getting all ads 
      $ads = new Ads_model();
      $category = new Category_model();
       $ads->limit = 50;
       $ads->order = 'asc';
       $data['rows'] = $ads->where(['approved'=>0]);
        

      
       if($data['rows'])
       {
          $total_rows = count($data['rows']);
          $half_rows =round($total_rows / 1);

          $data['row1'] = array_splice($data['rows'],0, $half_rows);
          $data['row2'] = $data['rows'];
        
          
       }
   
     
      $data['title'] = "home pppage";
      $this->view('home', $data);
    }

}
