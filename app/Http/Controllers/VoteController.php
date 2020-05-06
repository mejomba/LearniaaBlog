<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportVote;
use Validator;
use Auth;

class VoteController extends Controller
{
    

    public function GetVoteByName(Request $request)
    {
            $name_vote = $_POST['name'];
            $vote_row = Vote::where('name', $name_vote)->first();
            $options = json_decode( $vote_row->extras,false);
            if($vote_row != null)
            {
                $vote_data=array([ 
                                    "name" => $vote_row->name ,
                                    "question" => $options[0] ,
                                 ]);
            
                return response()->json($vote_data);
            }
            else
            {
                return response()->json("Vote Not Found");
            }
    }




    public function AnswerUser(Request $request)
    {
    
        $name_vote = $_POST['name_vote'];
        $page = $_POST['page'];
        $answer = $_POST['answer'];
        $pk_user = $_POST['pk_user'];

           $reportvotes = new ReportVote();
               
              
                $reportvotes->name_vote = $name_vote;
                $reportvotes->page = $page;
                $reportvotes->answer = $answer;
                $reportvotes->pk_user = $pk_user;


                if($reportvotes->save())
                {
                    return response()->json('از مشارکت شما در نظرسنجی بیش از پیش سپاسگزاریم');

                        return redirect()->back();
                }
                else
                {
                    return response()->json('خطا در عملیات پایگاه داده');

                }
            }

}
