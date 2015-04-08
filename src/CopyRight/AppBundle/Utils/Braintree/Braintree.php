<?php

// src /CopyRight/AppBundle/Utils/Braintree.php

namespace CopyRight\AppBundle\Modules;

use CopyRight\AppBundle\Utils\Braintree\lib\Braintree;

class Braintree
{
    private $environment;
    private $merchantId;
    private $publicKey;
    private $privateKey;
    
    public function __construct() 
    {
        $this->environment = '';
        $this->merchantId = '';
        $this->privateKey = '';
        $this->publicKey = '';
    }
    
    public function createPayment()
    {
        Braintree_Configuration::environment($this->environment);
        Braintree_Configuration::merchantId($this->merchantId);
        Braintree_Configuration::publicKey($this->privateKey);
        Braintree_Configuration::privateKey($this->publicKey);
        
        $result = Braintree_Transaction::sale(array(
            "amount" => "1000.00",
            "creditCard" => array(
                "number" => $_POST["number"],
                "cvv" => $_POST["cvv"],
                "expirationMonth" => $_POST["month"],
                "expirationYear" => $_POST["year"]
            ),
            "options" => array(
                "submitForSettlement" => true
            )
        ));
        if ($result->success) 
        {
            return array('result' => 'success', 'transactionId' => $result->transaction->id);
        } 
        else if ($result->transaction) 
        {
            return array('result' => 'error', 'message' => $result->message);
        } 
        else 
        {
            return array('result' => 'validationError', 'message' => $result->errors->deepAll());
        }
    }
}

