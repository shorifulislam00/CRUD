<?php
	$con = new mysqli('localhost','root','','angularjs_practice');
	$query = $con->query("SELECT * FROM records");
	
	$result = [];

	while($rows = $query->fetch_assoc()):
		$result []= $rows;
	endwhile;


	$count =count($result);



	echo json_encode(['status'=>'success','message'=>'','data'=> $result, 'total'=>$count]);

?>