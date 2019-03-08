<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			.std_loadingBackground {
    font-family: Verdana,Arial;
    filter: Alpha(Opacity=30);
    -moz-opacity: .3;
    opacity: .6;
    width: 100%;
    height: 1000px;
    background-color: #000;
    position: fixed;
    z-index: 500;
    top: 0;
    left: 0;

}
.icon-btn {
    padding: 1px 15px 3px 2px;
    border-radius: 50px;
}
.img-circle {
    border-radius: 50%;
}
.text-success {
    color: #3c763d;
}
.btn-glyphicon {
    padding: 8px;
    background: #ffffff;
    margin-right: 4px;
}

.navbar-default .navbar-brand {
    color: White;
}
.std_modalContainer {
    position: fixed;
    left: 40%;
    top: 40%;
    z-index: 750;
    background-color: #f2f4f5;
    padding: 6px;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    box-shadow: 5px 5px 5px rgba(0,0,0,.3);
    /*border: 0 solid #d0d0d0;*/
     border: 3px solid rgb(170, 0, 0)
    -webkit-box-shadow: 5px 5px rgba(0,0,0,.3);
    -moz-box-shadow: 5px 5px rgba(0,0,0,.3);

}
.std_processing {
 font-family: Verdana,Arial;
    text-align: center;color: rgb(0, 0, 0);
    padding: 15px 15px 0 15px;
    width: 40%;
    /*border: 'none',
    padding: '15px',
    backgroundColor: '#000',
    '-webkit-border-radius': '10px', 
    '-moz-border-radius': '10px',
    opacity: .5,
    color: '#fff'
    /* border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff'*/
}
	.footer{
		background:#99cc99;
		padding:3em 0px;
		text-align:center;
		margin-top: 172px;
	}
	.footer-top a h3{
		font-size: 2.7em;
	    color: #fff;
	    margin: 0;
	    font-family: 'AllertaStencil-Regular';
	}
	.footer-top p{
		font-size:17px;
		color:#fff;
		margin-top:15px;
	}
	.footer-top p a{
		color:#fff;
	}
	.footer-top p a:hover{
		color:#003366;
		transition: 0.5s all ease;
		-webkit-transition: 0.5s all ease;
		-moz-transition: 0.5s all ease;
		-o-transition: 0.5s all ease;
		-ms-transition: 0.5s all ease;
	}
	.footer-top a img{
		margin-top:3%;
	}
/*--footer-ends--*/
		</style>
		</head>
	<body ng-app="myApp" ng-controller="ctrl">
	<div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid" style="background-color: #64A737">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Package <i>Creator</i></a>
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
      <div class="container">
      	<div class="row">
      		<div class="pull-right" style="margin-right: 28px;">
      	<form method="get" action="dowloadTracker.xlsx">
						
						<button type="submit" class="rounded-0 btn btn-success">
							<span class="glyphicon btn-glyphicon glyphicon-download-alt img-circle text-success"></span>
						Download Sample Tracker XLSX file!</button>
								
						
				
			</form>
		</div>
		</div>
      </div>
      <br>
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
							<div id="pdiv" style="display:none">
								<p>Copy Below markup</p>
								<!--<textarea id="dvPackage" style="border: none;" rows="30" cols="120"></textarea>-->
								<div id="dvPackage" ></div>
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
		
		<div id="divProcessing" style="display:none">
			<span class="std_loadingBackground"></span>
			<div style="top: 30%; left: 40%;" class="std_modalContainer">
				<div class="std_tcenter">
					<img id="myAnimatedImage" alt="Processing.... Please wait!" src="images/ajax-loader.gif">
					<span class="std_processing">Processing... Please wait!</span>
				</div>
			</div>
		</div>
		<!--footer-starts-->
	<!--<div class="footer">
		<div class="container">
			<div class="footer-top">
				<a href=""><h3>Package Creator</h3></a>
				<p>© 2019 . All Rights Reserved | Design by </p>
				
			</div>
		</div>
	</div>-->
	<!--footer-end-->
	</body>
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
<script type="text/javascript" src="js/componentObj.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	
</html>