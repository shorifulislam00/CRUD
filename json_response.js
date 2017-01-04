var app = angular.module("myApp",[]);
app.controller("myCtrl",function($scope,$http){
	
	$scope.showEditBox = false;
	$scope.showAddBox = false;

	// get data function
	$http.get('record.php').then(function(response){
		$scope.records = response.data.data;
		$scope.total = response.data.total;
	});
	
	$scope.ordering = function(glue){
		$scope.customOrder = glue;
	};

	// delete function
	$scope.deleteItem = function(dataID,index){
		$http.get('delete.php?id='+dataID).then(function(response){
			$scope.result = response.data.status;
			if(response.data.status == 'success'){
				$scope.total--;
				$scope.records.splice(index,1);
			}
		});
	};

	// edit function
	$scope.editItem = function(dataID,index){
		$scope.tbl_index = index;
		$scope.name = $scope.records[index].name;
		$scope.country = $scope.records[index].country;
		$scope.id = $scope.records[index].id;

		$scope.showEditBox = true;
		$scope.showAddBox = false;

		console.log("edit button hit");

	};

	// update function
	$scope.updateItem = function(){

		var data = {
			"name":$scope.name,
			"country":$scope.country,
			"id":$scope.id
		};


		$http.post('update.php',data)
		.success(function(response){
			if(response.status == 'success'){
				$scope.records[$scope.tbl_index].name = $scope.name;
				$scope.records[$scope.tbl_index].country = $scope.country;
			}

			$scope.result = response.message;
			$scope.showEditBox = false;
		});
	};

	// add function // create
	$scope.addNewRecord = function(){
		$scope.showAddBox = true;
		$scope.showEditBox = false;
		$scope.name = '';
		$scope.country = '';
	};

	// add new item function
	$scope.addNewItem = function(){
		var data = {
			'name':$scope.name,
			'country':$scope.country
		};

		$http.post('addNewData.php',data).success(function(response){
			if(response.status == 'success'){
				console.log(response.data);
				$scope.records.push(response.data);	
			}

			$scope.result = response.message;
		});
	};

});