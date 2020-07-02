/**
 * checks if a date is in the holidays
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @param string $date Date in format YYYY-MM-DD
 * 
 * @return boolean if the date is in holidays, the code returns true
 */
function checkHolidays(string $date){
	$rawDate = $date;
	$date = explode("-", $rawDate);
	$year = $date[0];
	$state = getSetting("state");
	$result = callAPI('GET', 'https://ferien-api.de/api/v1/holidays/' . $state . '/' . $year, false);

	if ($result == "[]"){
		return("FEHLER");
	}

	$ferien = json_decode($result, true);

	// check variable
	$inHoliday = false;

	// convert date
	$checkDate = date('Y-m-d', strtotime($rawDate));

	// check if holiday
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