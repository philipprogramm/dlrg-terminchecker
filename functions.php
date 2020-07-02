<?php
/**
 * @copyright Copyright (c) 2020 Philipp Stappert <mail@philipprogramm.de>
 * 
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @license MIT License
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

$bundesland = "BW";

/**
 * checks if a date is in the holidays
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @param string $date Date in format YYYY-MM-DD
 * 
 * @return boolean if the date is in holidays, the code returns true
 */
function checkHolidays(string $date){
    global $bundesland;
	$rawDate = $date;
	$date = explode("-", $rawDate);
	$year = $date[0];
	$state = $bundesland;
	$result = callAPI('GET', 'https://ferien-api.de/api/v1/holidays/' . $state . '/' . $year, false);

	if ($result == "[]"){
		return("FEHLER");
	}

	$ferien = json_decode($result, true);
	$inHoliday = false;
	$checkDate = date('Y-m-d', strtotime($rawDate));

	foreach($ferien as $ferienElement){
		$beginDate = $ferienElement["start"];
		$beginDate = explode("T", $beginDate)[0];

		$endDate = $ferienElement["end"];
		$endDate = explode("T", $endDate)[0];

		$ferienBegin = date('Y-m-d', strtotime($beginDate));
		$ferienEnd = date('Y-m-d', strtotime($endDate));
		if(($checkDate >= $ferienBegin) && ($checkDate <= $ferienEnd)){
			$inHoliday = true;
		}
	}

	// return
	return($inHoliday);
}

/**
 * general function to call a api
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @param string $method the http method (POST or PUT)
 * @param string $url the url to send the data to
 * @param string $data the data to send
 * 
 * @return the result
 */
function callAPI(string $method, string $url, string $data){
	$curl = curl_init();
	switch ($method){
	   	case "POST":
		  	curl_setopt($curl, CURLOPT_POST, 1);
		  	if ($data)
			 	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		  	break;
	   	case "PUT":
		  	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
			break;
		default:
			if ($data)
				$url = sprintf("%s?%s", $url, http_build_query($data));
	}
	// set options
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	// run it
	$result = curl_exec($curl);
	if(!$result){die("Fehler beim Verbinden mit der API");}
	curl_close($curl);

	// return it
	return $result;
}