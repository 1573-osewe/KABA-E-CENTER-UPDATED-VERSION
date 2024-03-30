<?php

class Add_to_cart extends Controller
{
    private $redirect_to = '';

    public function index($id='')
    {
      $totalQty = 0;
        $this->set_redirect();

        $id = esc($id);
        $product = new Ads_model();

        $row = $product->first(['id'=>$id]);
        
        if($row)
        {
            if(isset($_SESSION['CART']))
            {
                $ids = array_column($_SESSION['CART'],'id');
                if(in_array($row->id, $ids))
                {
                    $key = array_search($row->id, $ids);
                    $_SESSION['CART'][$key]['qty']++;

                }
                else{
                    $arr = array();
                    $arr['id']= $id; 
                    $arr['qty'] = 1;
        
                    $_SESSION['CART'][]= $arr;
                }
            }
            else{
                $arr = array();
                $arr['id']= $id;
                $arr['qty'] = 1;
      
                $_SESSION['CART'][]= $arr;
            }
           //unset($_SESSION['CART']);
            //show($_SESSION['CART']);

        }

      
          //$_SESSION['itemcount']  = $totalQty;


       $this->redirect();
    }
    public function add_qty($id ='')
    {
        $this->set_redirect();
        $id = esc($id);
     
        
        if(isset($_SESSION['CART'])) 
        {
            foreach($_SESSION['CART'] as $key => $item)
            {
                if($item['id'] ==  $id)
                {
                  
                    $_SESSION['CART'][$key]['qty'] += 1;
                    break;
                }
            
            }
        }

        
       $this->redirect();

    }

    public function sub_qty($id ='')
    {
        $this->set_redirect();

        $id = esc($id);
        $product = new Ads_model();

        $row = $product->first(['id'=>$id]);
        if(isset($_SESSION['CART']))
        {
            foreach($_SESSION['CART'] as $key => $items)
            {
               
                if( $items['id'] == $id)
                {   
                    if($_SESSION['CART'][$key]['qty'] >= 2)
                    {
                        $_SESSION['CART'][$key]['qty'] -=1;
                    }
                    else{
                         $_SESSION['CART'][$key]['qty']=1;
                    }
                   
                    break;
                }
                
            }
        }
        $this->redirect();

    }

    public function remove($id= '')
    {
        $this->set_redirect();

        $id = esc($id);
        if(isset($_SESSION['CART']))
        {
            foreach($_SESSION['CART'] as $key => $item)
            {
                if($item['id'] == $id)
                {
                    unset($_SESSION['CART'][$key]);
                    $_SESSION['CART'] = array_values($_SESSION['CART']);
                    break;
                }
                
            }

        }
        $this->redirect();
    }
    private function set_redirect()
    {
        if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '')
        {
              $this->redirect_to = $_SERVER['HTTP_REFERER'];
        }
        else
        $this->redirect_to = ROOT.'shop';
      
    }

    private function redirect()
    {
       // show($_SERVER);
        header('Location: '.$this->redirect_to);die;
    }
}