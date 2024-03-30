<?php

class Payment extends Model
{
    public $errors= [];
    protected $table = 'payments';
    protected $allowedColumns = [
        'transaction_id',
        'TransactionDate',
        'PhoneNumber',
        'MpesaReceiptNumber',
        'Amount',
        'MerchantRequestID',
        'CheckoutRequestID',
        'ResultDesc',
        'ResultCode',
        'order_id',
        'status',
       
        
    ];

}