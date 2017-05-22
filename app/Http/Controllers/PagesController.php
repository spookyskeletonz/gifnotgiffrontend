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
		//$start = explode("/", $request->startdate);
   	//$request->startdate = $start[2]."-".$start[1]."-".$start[0];
   	//$end = explode("/", $request->enddate);
   	//$request->enddate = $end[2]."-".$end[1]."-".$end[0];
		//echo $request->topiccode1;
		$startdate = "2015-10-01T00:00:00.000Z";
		$enddate ="2015-10-10T00:00:00.000Z";
		$topiccode = $request->topiccode1;
		$input = "start_date=".$startdate."&end_date=".$enddate."&instrument_id="."&topic_codes=".$topiccode;
		$url = "http://139.59.224.37/api/api.cgi?".$input;
		$result = file_get_contents($url);

		$newsData = json_decode($result);
		if($newsData  === NULL){
			echo("Couldn't find any articles matching those search terms.");
			 echo("<a href='/'>  Try Again</a>");
			 return;
		}
		//echo($testString);
		//var_dump($newsData);
		$articles = array_unique($newsData[1]->NewsDataSet, SORT_REGULAR);
		$article =$articles[array_rand($articles)];
   	return view('playSimulation', ['article' => $article,'roundNumber' =>$request->roundNumber, 'prediction' => $request->prediction]);

   	}

   	public function getSimulation(Request $request){
   		return view('playSimulation');
   	}

   	public function results(Request $request){
   		return view('results');
   	}
}
