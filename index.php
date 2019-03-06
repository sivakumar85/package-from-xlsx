<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		</head>
	<body ng-app="myApp" ng-controller="ctrl">
	<div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <!--<li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>-->
            </ul>
            <!--<ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>-->
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        
		
			<form id="fileUploadForm" enctype="multipart/form-data">
			<fieldset>
				<div class="form-horizontal">
					<div class="form-group">
						<div class="row">
						<label class="control-label col-md-2 text-right" for="filename"><span>File</span></label>
						<div class="col-md-10">
							<div class="input-group">
								<input type="hidden" id="filename" name="filename" value="">
								<input type="file" id="fileUpload" name="uploadedFile" class="form-control form-control-sm" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
								<div class="input-group-btn">
									<input type="submit" value="Upload" ng-click="uploadExcel()" class="rounded-0 btn btn-primary">
								</div>
							</div>
						</div>
						</div>
					</div>                        
				</div>
			</fieldset>    
		</form>
		
		
		<!--<form class="md-form" enctype="multipart/form-data">
		
			<div class="file-field">
				<div class="btn btn-primary btn-sm float-left">
				  <span>Choose file</span>
				  <input type="file">
				</div>
				<div class="file-path-wrapper">
				  <input class="file-path validate" type="text" placeholder="Upload your file">
				</div>
			  </div>
			
		
			<input type="file" id="fileUpload">
			<button type="submit" value="submit" ng-click="uploadExcel()">Upload File</button>
		</form>-->
	
	<textarea id="dvPackage" style="border: none;" rows="30" cols="120"></textarea>
       
      </div>

    </div> <!-- /container -->		
		
	
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