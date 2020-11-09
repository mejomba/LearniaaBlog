<?php
return [
    /* Default Driver */
    'default' => 'zarinpal',

    /* List of Drivers */
    'drivers' => [
        'zarinpal' => [
            /* normal api */
            'apiPurchaseUrl' => 'https://ir.zarinpal.com/pg/services/WebGate/wsdl',
            'apiPaymentUrl' => 'https://www.zarinpal.com/pg/StartPay/',
            'apiVerificationUrl' => 'https://ir.zarinpal.com/pg/services/WebGate/wsdl',
            /* sandbox api */
            'sandboxApiPurchaseUrl' => 'https://sandbox.zarinpal.com/pg/services/WebGate/wsdl',
            'sandboxApiPaymentUrl' => 'https://sandbox.zarinpal.com/pg/StartPay/',
            'sandboxApiVerificationUrl' => 'https://sandbox.zarinpal.com/pg/services/WebGate/wsdl',
            /* zarinGate api */
            'zaringateApiPurchaseUrl' => 'https://ir.zarinpal.com/pg/services/WebGate/wsdl',
            'zaringateApiPaymentUrl' => 'https://www.zarinpal.com/pg/StartPay/:authority/ZarinGate',
            'zaringateApiVerificationUrl' => 'https://ir.zarinpal.com/pg/services/WebGate/wsdl',
            'mode' => 'zaringate', // can be normal, sandbox, zaringate
            'merchantId' => '80653178-f7ec-11e9-8662-000c295eb8fc',
            'callbackUrl' => env('Bank_CallBackURL', ''),
            'description' => 'payment in '.config('app.name'),
        ],
    ],

    /*  Class Maps */
    'map' => [
        'zarinpal' => \Shetabit\Payment\Drivers\Zarinpal\Zarinpal::class,
    ]
];
