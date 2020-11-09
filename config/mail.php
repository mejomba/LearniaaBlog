<?php

return [

    /* Mail Driver  | Supported: "smtp", "sendmail", "mailgun", "mandrill", "ses","sparkpost", "postmark", "log", "array"   */
    'driver' => 'mandrill',

    /* SMTP Host Address  */
    'host' => 'smtp.mandrillapp.com',

    /*  SMTP Host Port  */
    'port' => 587,

    /* Global "From" Address */
    'from' => array('address' => 'maxmoler1376@learniaa.com', 'name' => 'maxmoler1376'),

    /* E-Mail Encryption Protocol */
    'encryption' => 'tls',
   
    /* SMTP Server Username */
    'username' => 'LEARNIAA',
    'password' => 'x9A1WmgnFOAoh_QxR_XFyw',

    /* Sendmail System Path */
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,

    /* Markdown Mail Settings  */
    'markdown' => [
        'theme' => 'default',
        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    /* Log Channel */
    'log_channel' => env('MAIL_LOG_CHANNEL'),
];
