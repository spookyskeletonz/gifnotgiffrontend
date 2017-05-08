<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Exception;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
               public function findArticles(Request $request){
		//if($this->_verify($request) == 0){
		//	return view('welcome')->with('alert', 'Please use correct input format!');
		//} else {
			return $this->_getArticles($request);
		//}
	}

	private function _getArticles(Request $request){
		$instrumentcode = $request->instrumentcode;
		$topiccode = $request->topiccode;
		$startdate = $request->startdate;
		$enddate = $request->enddate;

                $input = "start_date=".$startdate."&end_date=".$enddate."&instrument_id=".$instrumentcode."&topic_codes=".$topiccode; 
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
}
