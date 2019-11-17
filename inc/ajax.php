<?php
	session_start();

	// get needed action by $_POST['action'] value
	switch ($_POST['action']) {
		case 'do_rating':
			doRating($_POST);
			break;
		case 'clear_session':
			clearSession();
			break;
		case 'number_api':
			numberApi($_POST);
			break;
		default:
			break;
	}

	function doRating($post) {
		$mark = $post['mark'];

		// get data from json file
		$data = file_get_contents('rating_data.json');
		$data = json_decode($data);
		$count = count($data);
		$average = ceil(array_sum($data)/$count);

		$result = array();

		if($_SESSION['voted'] == 'yes'){
			$result = array(
				'status' => 0,
				'message' => 'Sorry, you already vote in this page! <br>But you may <a onclick="clearSession()">clear session manually</a>',
				'count' => $count,
				'average' => $average
				);
		} else {
			$_SESSION['voted'] = "yes";

			// add new vote
			$data[] = $mark;
			$count = count($data);
			$average = ceil(array_sum($data)/$count);

			// update json file
			$data = json_encode($data);
			file_put_contents('rating_data.json', $data);

			$result = array(
				'status' => 1,
				'message' => 'Thanks, your vote is accepted!',
				'count' => $count,
				'average' => $average
				);
		}

		echo json_encode($result);
	}


	function clearSession() {
		$_SESSION['voted'] = 'no'; 
		$result = array(
			'status' => 1,
			'message' => 'Session has been cleared'
			);
		
		echo json_encode($result);
	}


	//a numberapi ajax calback function
	function numberApi($post) {
		$num = $post['number'];
		$url = 'http://numbersapi.com/';
		$result = file_get_contents($url.$num);
		echo $result;
	}