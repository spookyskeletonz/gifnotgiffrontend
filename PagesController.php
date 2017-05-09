<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Exception;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
	public function findArticles(Request $request){
		if($this->_verify($request) == 0){
			return view('welcome')->with('alert', 'Please use correct input format!');
		} else {
			return $this->_getArticles($request);
		}
	}

	private function _getArticles(Request $request){
		$instrumentcode = $request->instrumentcode;
		$topiccode = $request->topiccode;
		$startdate = $request->startdate;
		$enddate = $request->enddate;

		$input = "start_date=".$startdate."T00:00:00Z"."&end_date=".$enddate."T00:00:00Z"."&instrument_id=".$instrumentcode."&topic_codes=".$topiccode;

		$url = "http://139.59.224.37/api/api.cgi?".$input;

		$result = file_get_contents($url);
		var_dump($result);
   	        return view('data', ['articles' => $result]);
	}

	public function home(){
		return view('welcome');
	}

	private function _verify(Request $request){
		$instrumentcode = $request->instrumentcode;
		$topiccode = $request->topiccode;
		$startdate = $request->startdate;
		$enddate = $request->enddate;
		$isverified = TRUE;

		if(preg_match("/^\d\d\d\d\-\d\d\-\d\d$/", $startdate) == 0 || preg_match("/^\d\d\d\d\-\d\d\-\d\d$/", $enddate) == 0){
			$isverified = FALSE;
		}

		if(preg_match("/^[a-zA-Z]+\.[a-zA-Z]+/", $instrumentcode) == 0){
			$isverified = FALSE;
		}

		if(preg_match("/^[a-zA-Z]+/", $topiccode) == 0){
			$isverified = FALSE;
		}

		if($isverified == TRUE){
			return 1;
		} else {
			return 0;
		}
	}

	public function viewReturns(Request $request){
		//Default value for testing
		$instrument_id = "BHP.AX";
		$dateOfInterest = "2015-10-01T18:35:46.961Z";
	

		$dateOfInterest = explode("T",$dateOfInterest)[0];
		$parts = explode("-",$dateOfInterest);
		$dateOfInterest = $parts[2]."/".$parts[1]."/".$parts[0];

		//https://alphawolfwolf.herokuapp.com/api/finance?instrumentID=BHP.AX&list_of_var=CM_Return,AV_Return&upper_window=3&lower_window=5&dateOfInterest=01/10/2015

		//$url = "https://alphawolfwolf.herokuapp.com/api/finance?instrumentID=".$instrument_id."&list_of_var=CM_Return,AV_Return&dateOfInterest=".$dateOfInterest;
		$url = "https://alphawolfwolf.herokuapp.com/api/finance?instrumentID=ABP.AX&list_of_var=CM_Return,AV_Return&upper_window=3&lower_window=5&dateOfInterest=10/12/2012";
                $result = file_get_contents($url);
		$vars = json_decode($result, true);
                                  
               
                $dates = ($vars['CompanyReturns'][0]['Data'][0]['Date']);
                $dates = str_replace("string", "",$dates);
                //str_replace(array('\'','', $dates));
                var_dump($dates);
 
                $cm = ($vars['CompanyReturns'][0]['Data'][0]['CM_Return']);
                //str_replace(array('float','', $cm));
                //str_replace(array( '(', ')' , '', $cm);
                var_dump($cm);
                return view('chartjs1')
                  ->with('dates')
                  ->with('cm');
	}
}
