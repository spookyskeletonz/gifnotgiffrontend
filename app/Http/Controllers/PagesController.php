<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
    //Display the home page
  	public function home(){
  		return view('welcome');
  	}

    //Get simulation for first time. Needs to:
    //Until 10 rounds have been passed refresh page with new round number
    public function playSimulation(Request $request){
        if($request->roundNumber > 10){
            return view('results');
        }
        return view('playSimulation')->with('roundNumber', $request->roundNumber);

    }

   	public function results(Request $request){
   		return view('results');
   	}
}
