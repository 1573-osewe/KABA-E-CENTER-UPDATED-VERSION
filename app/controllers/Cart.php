
<?php

class Cart extends Controller
{
    public function index()
    {
        
        $product = new Ads_model();
        $data = [];
        $product_id = array();
        $rows= array();
        if(isset($_SESSION['CART']))
        {
            $product_ids = array_column($_SESSION['CART'],'id');
           $product_ids = "'".implode("', '",$product_ids)."' ";
            $sql = "SELECT * FROM ads where id in ($product_ids)";

            $rows = $product->query($sql);
            $data['sub_total'] = 0;
           
            if($rows)
            {
                foreach($rows as $row)
                {
                    
                    foreach($_SESSION['CART'] as $item)
                    {   
                        if($row->id == $item['id'])
                        {
                            $itemcount = $item['qty']?? 0;
                            $_SESSION['itemcount'] =$itemcount ;
                            $row->cart_qty = $item['qty'];
                            //show($item['id']);
                            $row->total_price =$item['qty'] * $row->price;

                            $mytotal = $row->price * $row->cart_qty;
                            $data['sub_total'] += $mytotal;
                           
                            break;
                        }
                        
                    }
                    //show($row->id);
                }
            }
             //show($rows);die;
        }
     
       $data['rows']= $rows;
       $this->view('cart',$data);
    }

}