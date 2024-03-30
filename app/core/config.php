<?php
define('WEB_NAME','KABA E-CENTER');
 define('DESCRIPTION','Price Comparison ');






if( $_SERVER['SERVER_NAME'] == '127.0.0.1' || $_SERVER['SERVER_NAME'] == 'localhost')
{
    //localhost
    //configurations
    define('DBHOST','127.0.0.1');
    define('DBUSER','root');
    define('DBPASSWORD','');
    define('DBNAME','ecommerce');
    define('DBDRIVER','mysql');
    define('ROOT','http://127.0.0.1/e-commerce/public');

}
else
{
    //live server
       //configurations
       define('DBHOST','127.0.0.1');
       define('DBUSER','locahost');
       define('DBPASSWORD','');
       define('DBNAME','classified');
       define('DBDRIVER','mysql');

       define('ROOT','http://');
}