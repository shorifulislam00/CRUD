<?php
	if(isset($_GET['id'])):
		$id = $_GET['id'];
		$con = new mysqli('localhost','root','','angularjs_practice');
		$query = $con->query("DELETE FROM records WHERE id = $id");
		if($query):
			echo json_encode(['status'=>'success','message'=>'','data'=>'']);
		else:
			echo json_encode(['status'=>'fail','message'=>'','data'=>'']);
		endif;
	endif;


//    hello this is test for github

?>