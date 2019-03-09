<!DOCTYPE html>
<html>
	<head>
	<title>create package.xml for salesforce.com ANT deployment</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
    color: white;
    background-color: #B8DC00;
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

			.footer_bottom{
			margin-top: 140px;
    padding-top: 10px;
    color: white;
    background-color: black;
		}
			
	.jumbotron {
    padding-right: 60px;
    border: 2px solid #447e38;
    padding-left: 60px;
}
.navbar-default .navbar-nav>li>a:hover{
	background-color: #B8DC00;
}
.navbar-default .navbar-nav>li>a {
   color: white;
}
		</style>
		<script>
			function selectText(containerid) {
				if (document.selection) { // IE
					var range = document.body.createTextRange();
					range.moveToElementText(document.getElementById(containerid));
					range.select();
				} else if (window.getSelection) {
					var range = document.createRange();
					range.selectNode(document.getElementById(containerid));
					window.getSelection().removeAllRanges();
					window.getSelection().addRange(range);
				}
			}
		</script>
		</head>
	<body ng-app="myApp" ng-controller="ctrl">

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
              <li class="active"><a href="#"><i class="fa fa-home"></i><span>&nbsp;Home</span></a></li>
              
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <!--<li class="active"><a href="#"><i class="fa fa-code-fork"></i><span>Sorce Code</span></a></li>-->
              <li>
              	<a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle"></i><span>&nbsp;Help</span></a></li>
              	<!-- Modal -->
			  <div class="modal" id="myModal">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title"><span>Help &nbsp;</span><i class="fa fa-question-circle"></i></h4>

		  </div>
		  <div class="modal-body">
			  <div class="col-md-12">
			  	<h4>Package Creator:</h4>
				<ul>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			  </div>
			  <div class="clearfix"></div>
		  </div>
		  <div class="modal-footer">
		  	<a href="" class="btn btn-primary pull-left" ><i class="fa fa-phone"></i><span>&nbsp;Contact</span></a>
			<a href="" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</a>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
			  <!--end-modal-->
            </ul>
            
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
      <div class="container">
      <div class="jumbotron">
			
			
			<div class="alert alert-info" role="alert">
			  <h4 class="alert-heading">Package Creator:</h4>
			  <div>Use this handy utility to create Package.xml using the Deployment Tracker, which can then be used for doing deployment using ANT Migration Tool.</div>
			  <hr>
			  <div>Download the sample tracker file that can be used to fill in the components</div>
			</div>
			<form id="fileUploadForm" enctype="multipart/form-data">
			<fieldset>
				<div class="container">
				<div class="form-horizontal">
					<div class="form-group">
						<div class="row">
						<label class="control-label col-md-1 text-right" for="filename"><span>File</span></label>
						<div class="col-md-10">
							<div class="input-group">
								<input type="hidden" id="filename" name="filename" value="">
								<input type="file" id="fileUpload" name="uploadedFile" class="form-control form-control-sm" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
								<div class="input-group-btn">
									<input type="submit" value="Upload" ng-click="uploadExcel()" class="rounded-0 btn btn-primary">
								</div>
							</div>
							<div id="pdiv" style="display:none">
								<br><p>Copy Below markup <input type="button" value="Click to Select XML Markup" onclick="selectText('dvPackage')" class="rounded-0 btn btn-primary"></p>
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
		
		<div id="divProcessing" style="display:none">
			<span class="std_loadingBackground"></span>
			<div style="top: 30%; left: 40%;" class="std_modalContainer">
				<div class="std_tcenter">
					<img id="myAnimatedImage" alt="Processing.... Please wait!" src="images/ajax-loader.gif">
					<span class="std_processing">Processing... Please wait!</span>
				</div>
			</div>
		</div>
				
			<div class="footer_bottom">
			<div class="container" style="margin-bottom: -14px">
					<div class="row">
						<div class="col-sm-6 ">
							<div class="copyright-text">
								<p>Copyright  &copy; 2019  | All Rights Reserved </p>
							</div>
						</div> <!-- End Col -->
						<div class="col-md-2 socialicon">
						<div class="social-icon">
							<ul class="list-inline">
								<li class="facebook">
									<a href="http://facebook.com/">
										<i class="fa fa-facebook"style="font-size: 14px;"></i></a>
								</li>
								<li class="twitter"><a href="http://twitter.com/"><i class="fa fa-twitter"style="font-size: 14px;"></i></a></li>
								<li class="google"><a href="http://google.com/"><i class="fa fa-google"style="font-size: 14px;"></i></a></li>
							</ul>
						</div>
					</div>
					</div>
				</div>
			</div>
	</body>
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
<script type="text/javascript" src="js/componentObj.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	
</html>