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
        return view('survey.confirm')->with(['museum'=>$museum, 'request'=>$request]);
    }

    public function complete(Survey $survey, Museum $museum, SurveyRequest $request)
    {
        $input = $request->all();
        $input['museum_id']=$museum->id;
        $survey->fill($input)->save();
        
        return view('survey.complete');
    }
    
    public function result(Survey $survey, Museum $museum)
    {
        // $surveys=Survey::all();
        $surveys = Museum::find($museum->id)->surveys;
        foreach($surveys as $survey){
            $museum_id = $survey->museum_id;
            $museum_name = Museum::find($museum_id)->name;
            $survey->museum_name = $museum_name;
        }
        
        $surveys = $survey->paginate(2);
        return view('survey.result')->with(['museum'=>$museum, 'surveys'=>$surveys, 'survey'=>$survey]);
    }
}
