<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		</head>
	<body ng-app="myApp" ng-controller="ctrl">
	
		<div>
		<form enctype="multipart/form-data">
			<input type="file" id="fileUpload">
			<button type="submit" value="submit" ng-click="uploadExcel()">Upload File</button>
		</form>
	</div>
	<textarea id="dvPackage" style="border: none;" rows="30" cols="120"></textarea>
	
	<!--<div id="dvExcel">
		<table id="myTable">
			<thead>
				<tr>
					<th>Metadata Type</th>
					<th>Object Label</th>
					<th>Object API Name</th>
					<th>Component Label</td>
					<th>Component API Name</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>-->
		
		
	</body>
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
<script type="text/javascript" src="js/componentObj.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	
</html>