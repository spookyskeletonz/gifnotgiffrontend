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
			if ($request->roundNumber > 3){
            return view('results', ['score' => $request->score]);
        }

			$startdate = "2014-12-31T00:00:00.000Z";
			$enddate ="2017-10-10T00:00:00.000Z";
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

			//articles is a unique set of all the data retrieved from query
			$articles = array_unique($newsData[1]->NewsDataSet, SORT_REGULAR);
			//article is a randomly selected article from this set
			$article = $articles[array_rand($articles)];

			$instruments = $article->InstrumentIDs;
			        $listInstruments = explode(',', $instruments);
			        $valid = false;
			        $count = 0;
			        while ($valid == false){
			            $instrumentCode = $listInstruments[$count];
			            $count++;
			        //http://128.199.197.216:3000/v5/id=AAPL&dateOfInterest=2012-12-10&listOfVars=AV_Return;CM_Return&upperWindow=5&lowerWindow=3
			            $dateOfInterest = explode('T', $article->TimeStamp)[0];
			            $url = "http://128.199.197.216:3000/v5/id=".$instrumentCode."&dateOfInterest=".$dateOfInterest."&listOfVars=AV_Return;CM_Return&upperWindow=3&lowerWindow=7";
			            $result = file_get_contents($url);
			            $returnsData = json_decode($result, true);
			            if (sizeof($returnsData['CompanyReturns'][0]['Data']) > 7){
			                $valid = true;
			            }
			        }

			        echo $count;
			        $returnsData = $returnsData['CompanyReturns'];
			        $correctPrediction = "increase";
			        $average = ($returnsData[0]['Data'][8]['Return'] + $returnsData[0]['Data'][9]['Return'] + $returnsData[0]['Data'][10]['Return']) / 3;
			        if ($average < 0){
			            echo "Decrease occurred with return of ".$average;
			            $correctPrediction = "decrease";
			        } else {
			            echo "Increase occurred with return of ".$average;
			            $correctPrediction = "increase";
			        }

			        $score = $request->score;
			        if($request->prediction == $correctPrediction){
			            $score = $score + 1;
			        }
			        $count = 0;
			        while ($count < 8){
			            $chartData[] =$returnsData[0]['Data'][$count];
			            $count++;
			        }

			        return view('playSimulation', ['chosenArticle' => $article,'instrumentCode' =>$instrumentCode, 'articles' => $articles, 'roundNumber' => $request->roundNumber, 'prediction' => $request->prediction, 'score' => $score, 'topiccode1' => $request->topiccode1, 'data' => $chartData]);
	}

	public function getSimulation(Request $request){
		return view('playSimulation');
	}

		public function results(Request $request){
			echo $requests->score;
			return view('results', ['score' => $request->score]);
		}
}
