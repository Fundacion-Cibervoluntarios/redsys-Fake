<?php
return array(
    // Signature Key
    'Key' =>  (array_key_exists('KEY',$_ENV) && $_ENV['KEY']) ?$_ENV['KEY']: 'sq7HjrUOBfKmC576ILgskD5srU870gJ7',

    // Basic auth to attach to Ds_Merchant_MerchantURL response if your environment is protected
    'basic_auth' => array(
        'user' => (array_key_exists('BASIC_AUTH_USER',$_ENV) && $_ENV['BASIC_AUTH_USER']) ?$_ENV['BASIC_AUTH_USER']: 'sq7HjrUOBfKmC576ILgskD5srU870gJ7',
        'password' => (array_key_exists('BASIC_AUTH_PASSWORD',$_ENV) && $_ENV['BASIC_AUTH_PASSWORD']) ?$_ENV['BASIC_AUTH_PASSWORD']: 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'
    )
);
