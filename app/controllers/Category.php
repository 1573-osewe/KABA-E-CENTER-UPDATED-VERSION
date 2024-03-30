<?php

class Category extends Controller
{
   
    public function index($slug=null)
    {

      /**********
       * getting all ads 
       */
      
      $ads = new Ads_model();
      $category = new Category_model();

       $sql = "SELECT  ads.*, categories.category, categories.slug as cat_slug FROM `ads` join categories on categories.id = ads.category_id where categories.slug = :slug AND categories.disabled = :disabled";
        $slugs['slug'] = $slug;
        $slugs['disabled'] = 0;
        $data['rows'] = $ads->query($sql, $slugs);

   
      
      $data['title'] = "Category";
      $this->view('category', $data);
    }



    public function product($slugt =null)
    {
       $ads = new Ads_model();
           /**********
         * product page
         * 
         * 
         */
        //$sql = "SELECT  ads.*, categories.category, categories.slug from `ads` join categories on categories.id = ads.category_id where ads.title = :title AND categories.disabled = :disabled";
    
        //$data['product'] = $ads->query($sql,$title);
        $slugt = strtolower($slugt);
        $sql = "SELECT * from ads where slugt = :slugt AND approved = :approved";
        $data['slugt'] = $slugt;
        $data['approved'] = 0;
        $data['product']= $ads->query($sql,$data);
   
       //show($data['product']);die;
        $data['slugt'] = "Product";
        $this->view("product", $data);

        /***
         * END
         */
    }
}
