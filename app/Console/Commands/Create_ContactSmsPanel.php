<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Classes\PayamakSefid\SendSms;

class Create_ContactSmsPanel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ContactSmsPanel:CreateContact {NewContact}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $NewContact = $this->argument('NewContact');
        
                 
        date_default_timezone_set("Asia/Tehran");
        $APIKey = '9e748ce762b7c17478c4b783';
        $SecretKey = 'H$c7M~Ax#Z@7Y%3';

          $PayamakSefid = new SendSms($APIKey,$SecretKey);
          $Groups =  $PayamakSefid->GetContactGroups();
          $Groups = $Groups->ContactGroups ; 

          $rand = rand(0,10000);

         $ContactData = array(
            'ContactsDetails' => array(
                                        array(
                                            'Prefix' => ' ',
                                            'FirstName' => ' ',
                                            "LastName" => $rand ,
                                            'Mobile' =>   $NewContact,
                                            'EmojiId' => '1'
                                        )
                                     ),
            'GroupId' =>  $Groups[0]->GroupId
        );


          $PayamakSefid->AddContacts($ContactData);
       
        //  End (add contact to sms panel) //
       

        return " Create Success";
    }
}
