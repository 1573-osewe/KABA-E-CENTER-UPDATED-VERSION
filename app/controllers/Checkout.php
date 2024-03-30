<?php

class Checkout extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
          {
            redirect('login');die;
          }

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
                           
                            $row->cart_qty = $item['qty'];
                            //show($item['id']);
                            $row->total_price =$item['qty'] * $row->price;

                            $mytotal = $row->price * $row->cart_qty;
                            $data['sub_total'] += $mytotal;
                           
                            break;
                        }
                        
                    }
                    
                }
            }
             
        }
        


        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           
   
        $order = new Order();
        $sessionid = session_id();
        $user_id = Auth::getid();
        if(isset($_SESSION['USER_INFO']->id))
        {
            $user_id = $_SESSION['USER_INFO']->id;
        }
//echo $user_id;die;
         $res = $order->save_order($_POST, $rows, $user_id, $sessionid);

         //var_dump( $res);
   
       //echo "hhh"; die;
        redirect("verification");die;


        }

         $data['rows']= $rows;
        $country = new Country();
         $data['countries'] = $country->getCountries();
         $data['states'] = $country->getStates();
       
    
       
      




        $this->view('checkout',$data);
    }

    public function pay()
    {
        $data['title'] = 'pay';
        $this->view('pay',$data);

    }

    public function thanks()
    {   
        $data =[];
        $data['title'] = 'thanks';
        
     
   
 
        

         // DATA
        $mpesaResponse = file_get_contents('php://input');
        
        
    $logFile = time()."M_PESAConfirmationResponse.txt";
 
     // write to file
     $log = fopen($logFile, "a");
 
     fwrite($log, $mpesaResponse);
     fclose($log);
        
        
        
        $mpesaResponse = '{"Body":{"stkCallback":{"MerchantRequestID":"25719-103546334-1","CheckoutRequestID":"ws_CO_19032023193331820745378674","ResultCode":0,"ResultDesc":"The service request is processed successfully.","CallbackMetadata":{"Item":[{"Name":"Amount","Value":1.00},{"Name":"MpesaReceiptNumber","Value":"RCJ46VH9K6"},{"Name":"Balance"},{"Name":"TransactionDate","Value":20230319193352},{"Name":"PhoneNumber","Value":254745378674}]}}}}';
    
        $obj = json_decode($mpesaResponse);

        $db = new Database();

        $row = new Order();
        $id = Auth::getId();
      
        $result = $row->first(['user_id'=>$id]);

        $arr = array();
        //TransactionDate	PhoneNumber	MpesaReceiptNumber	Amount	MerchantRequestID	CheckoutRequestID	ResultDesc	ResultCode	order_id	
        
        $arr['TransactionDate'] =$obj->Body->stkCallback->CallbackMetadata->Item[3]->Value;
        $arr['PhoneNumber'] = $obj->Body->stkCallback->CallbackMetadata->Item[4]->Value;
        $arr['MpesaReceiptNumber']=$obj->Body->stkCallback->CallbackMetadata->Item[1]->Value;
        $arr['Amount'] = $obj->Body->stkCallback->CallbackMetadata->Item[0]->Value;
        $arr['MerchantRequestID']= $obj->Body->stkCallback->MerchantRequestID;
        $arr['CheckoutRequestID']= $obj->Body->stkCallback->CheckoutRequestID;
        $arr['ResultDesc']= $obj->Body->stkCallback->ResultDesc;
        $arr['ResultCode']= $obj->Body->stkCallback->ResultCode;
        $arr['order_id']= $result->order_id;

       
        $sql ="insert into payments 
        (
            TransactionDate,PhoneNumber,MpesaReceiptNumber,Amount,MerchantRequestID,CheckoutRequestID,ResultDesc,ResultCode,order_id
        )
         values(
            :TransactionDate,:PhoneNumber,:MpesaReceiptNumber,:Amount,:MerchantRequestID,:CheckoutRequestID,:ResultDesc,:ResultCode,:order_id
         )";

         $db->query($sql, $arr);

            if($obj->Body->stkCallback->ResultCode == '0')
            {
                redirect('thank_you');die;
            }




         $data['obj'] = $obj;
        $this->view('thanks',$data);

    }
}