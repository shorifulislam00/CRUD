<!DOCTYPE html>
<html>
<head>
	<title>JSON response in AngularJS</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script type="text/javascript" src="json_response.js" ></script>

	<style>
		table, th , td  {
		  border: 1px solid grey;
		  border-collapse: collapse;
		  padding: 5px;
		}
		

		table tr th{
			cursor: pointer;
		}
	</style>

</head>
<body data-ng-app="myApp" data-ng-controller="myCtrl">
	<h3>Data from database</h3>

	<button type="button" ng-click="addNewRecord()">Add New Record</button><br/><br/>

	<table>
		<head>
			<tr>
				<th>SI</th>
				<th ng-click="ordering('name')">Name</th>
				<th ng-click="ordering('country')">Country</th>
				<th>Action</th>
			</tr>
		</head>
		<tbody>
			<tr ng-repeat="x in records | orderBy:customOrder">
				<td ng-if="$odd">{{$index + 1}}</td>
				<td ng-if="$even" style="background: #f1f1f1;">{{$index + 1}}</td>
				<td ng-if="$odd">{{x.name}}</td>
				<td ng-if="$even" style="background: #f1f1f1;">{{x.name}}</td>
				<td ng-if="$odd">{{x.country}}</td>
				<td ng-if="$even" style="background: #f1f1f1;">{{x.country}}</td>
				<td>
					<a ng-click="deleteItem(x.id,$index)"><button type="button">Delete</button></a>
					<a ng-click="editItem(x.id,$index)"><button type="button">Edit</button></a>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">Total : {{total}}</th>
			</tr>
		</tfoot>
	</table>

	<h3 ng-show="showEditBox">Edit Information</h3>
	<table style="margin-top:10px;" ng-show="showEditBox">
		<tr>
			<th>Name : </th>
			<td>
				<input type="text" ng-model="name">
				<input type="hidden" ng-model="id">
				<input type="hidden" ng-model="tbl_index">
			</td>
		</tr>
		
		<tr>
			<th>Country : </th>
			<td>
				<input type="text" ng-model="country">
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<button type="button" ng-click="updateItem()" >Update</button>
			</td>
		</tr>
	</table>

<!-- add new record -->
	<h3 ng-show="showAddBox">Add New Information</h3>
	<table style="margin-top:10px;" ng-show="showAddBox">
		<tr>
			<th>Name : </th>
			<td>
				<input type="text" ng-model="name">
			</td>
		</tr>
		
		<tr>
			<th>Country : </th>
			<td>
				<input type="text" ng-model="country">
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<button type="button" ng-click="addNewItem()" >Save</button>
			</td>
		</tr>
	</table>
<!-- end -->

	<p>Status : {{result}} </p>

</body>
</html>