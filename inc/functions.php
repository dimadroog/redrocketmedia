<?php 
// get some data from json file
function getRatingData($param){
	$data = file_get_contents('inc/rating_data.json');
	$data = json_decode($data);
	
	// add default data if json is empty
	if (!$data || empty($data)) { 
		file_put_contents('inc/rating_data.json', '["5"]');
		$data = array(5);
	}

	$count = count($data);
	$average = ceil(array_sum($data)/$count);

	$result = array(
		'count' => $count,
		'average' => $average
		);
	return $result[$param];
}

//add 'checked' to current average mark
function isChecked($i){
	$result = '';
	$average = getRatingData('average');
	if ($average == $i) {
		$result = 'checked';
	}
	return $result;
}

?>