<?php 
require __DIR__ . '/vendor/autoload.php';
include('config.php');

function sendMessage($message){
		$content = array(
			"en" => $message
			);
		
		$fields = array(
			'app_id' => "c742bca5-4cb7-4e54-898d-ca07e9769013",
			'included_segments' => array('All'),
      // 'data' => array("foo" => "bar"),
			'contents' => $content
		);
		
		$fields = json_encode($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic MmFhMDkxN2ItYTRjOC00OTg1LWJmZjItY2JhYTY4Y2RjMTQx'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
	
	// $response = sendMessage();
	// $return["allresponses"] = $response;
	// $return = json_encode( $return);
	
  // print("\n\nJSON received:\n");
	// print($return);
  // print("\n");


// Change the following with your app details:
// Create your own pusher account @ https://app.pusher.com


 $options = array(
    'cluster' => 'ap2',
    'encrypted' => true
  );
  $pusher = new Pusher\Pusher(
    '42894ae311bfba3b7465',
    '60cf514efa4031b4a1ee',
    '457907',
    $options
  );

// Check the receive message
if(isset($_POST['message']) && !empty($_POST['message'])) {		
   $data = $_POST['message'];	

   	
	  // $return["allresponses"] = $response;
	  // $return = json_encode( $return);
	
  $conn = getdb();
  $user_pro_info = "INSERT INTO messages (message) VALUES('$data')";
  mysqli_query($conn , $user_pro_info);

	// Return the received message
	if($pusher->trigger('test_channel', 'my_event', $data)) {
    $response = sendMessage($data);	
    echo 'success';			
	} else {		
		echo 'error';	
	}
}