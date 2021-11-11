<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use App\Museum;
use App\Http\Requests\SurveyRequest;

class SurveyController extends Controller
{
    public function form(Survey $survey, Museum $museum)
    {
        return view('survey.form')->with(['museum'=>$museum]);
    }

    public function confirm(SurveyRequest $request, Museum $museum)
    {
        // $reasoncoming = implode("、",$request->reasoncoming);
        // $survey = new Survey($request->all());
        
        // $survey = new Survey($request->all());
        
    // $livings = Survey::$living;
    // dd($survey);
    
// $input = $request[‘question‘];
// 	$question->fill($input)->save();
        // $input = $request['survey'];
        // $survey->fill($input)->save();
        
        return view('survey.confirm')->with(['museum'=>$museum, 'request'=>$request]);
    }
    
    // public function store(Survey $survey, Request $request)
    // {
    //     $input = $request['survey'];
    //     $survey->fill($input)->save();
        
    //     return redirect('/survey/' . $museum->id);
    // }
    
    public function complete(Survey $survey, Museum $museum, SurveyRequest $request)
    {
        $input = $request->all();
        $input['museum_id']=$museum->id;
        $survey->fill($input)->save();
        // Survey::create($request->all());
        // $input = $request['survey'];
        // $survey->fill($input)->save();
        // Survey::create($request->all());
        return view('survey.complete');
    }

}
