<?php
	
	$params = json_decode(file_get_contents('php://input'),true);

	$name = $params['name'];
	$country = $params['country'];

	if( ($name != '') && ($country != '') ):
		$con = new mysqli('localhost','root','','angularjs_practice');
		$query = $con->query("INSERT INTO records(id,name,country) VALUES('','$name','$country')");
		
		if($query):
			// $recentAddedData = $con->query("SELECT * FROM records ORDER BY id DESC LIMIT 1");
			// $resultData = $recentAddedData->fetch_assoc();


			$params['id'] = $con->insert_id;

			echo json_encode(['status'=>'success','message'=>'New Record added successfully','data'=>$params]);
		else:
			echo json_encode(['status'=>'fail','message'=>'New data not added.something wrong','data'=>'']);
		endif;	

	else:
		echo json_encode(['status'=>'fail','message'=>'name or country empty','data'=>'']);
	endif;


?>