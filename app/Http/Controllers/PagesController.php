<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
	public function home(){
		return view('welcome');
	}

    public function playSimulation(Request $request){
   		return view('playSimulation');
   	}

   	public function getSimulation(Request $request){
   		return view('playSimulation');
   	}

   	public function results(Request $request){
   		return view('results');
   	}
}
