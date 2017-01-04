<?php
	
	$params = json_decode(file_get_contents('php://input'),true);
	
	$id = $params['id'];
	$name = $params['name'];
	$country = $params['country'];

	if($id):
		$con = new mysqli('localhost','root','','angularjs_practice');
		$query = $con->query("UPDATE records SET name = '$name',country = '$country' WHERE id = '$id'");
		
		if($query):
			echo json_encode(['status'=>'success','message'=>'successfully data updated','data'=>'']);
		else:
			echo json_encode(['status'=>'fail','message'=>'data not update','data'=>'']);
		endif;
	else:
		echo json_encode(['status'=>'fail','message'=>'something went wrong','data'=>'']);
	endif;

?>