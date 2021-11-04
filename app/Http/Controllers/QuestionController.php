<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Museum;

class QuestionController extends Controller
{
    public function form()
    {
        $rg01Datas = [
            "op1" => "はい",
            "op2" => "いいえ",
        ];
        $rg01Checked = "op2";
        
        
        // $museum = Museum::find($museum->id)->questions;
        return view('question.form')->with(['rg01Datas'=>$rg01Datas, 'rg01Checked'=>$rg01Checked]);
    }

public function confirm(Request $request)
    {
        $rg01Datas = [
            "op1" => "はい",
            "op2" => "いいえ",
        ];
        $rg01Checked = "op2";
	   // $questions = new Question($request->all());
// $input = $request[‘question‘];
// 	$question->fill($input)->save();
        return view('question.confirm')->with(['rg01Datas'=>$rg01Datas, 'rg01Checked'=>$rg01Checked]);
    }

public function complete(Request $request)
    {
        return view('question.complete');
    }

}
