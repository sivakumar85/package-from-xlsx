var app = angular.module('myApp', []);
app.controller('ctrl', ['$scope',function($scope){ 
var exceljsonobj =[];

	
		$scope.uploadExcel = function(){
			$("#divProcessing").show();
			 //Reference the FileUpload element.
			var fileUpload = document.getElementById("fileUpload");
			//Validate whether File is valid Excel file.
			var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx)$/;
			if (regex.test(fileUpload.value.toLowerCase())) {
				if (typeof (FileReader) != "undefined") {
					var reader = new FileReader();
	 
					//For Browsers other than IE.
					if (reader.readAsBinaryString) {
						reader.onload = function (e) {
							ProcessExcel(e.target.result);
						};
						reader.readAsBinaryString(fileUpload.files[0]);
					} else {
						//For IE Browser.
						reader.onload = function (e) {
							var data = "";
							var bytes = new Uint8Array(e.target.result);
							for (var i = 0; i < bytes.byteLength; i++) {
								data += String.fromCharCode(bytes[i]);
							}
							ProcessExcel(data);
						};
						reader.readAsArrayBuffer(fileUpload.files[0]);
					}
				} else {
					$("#divProcessing").hide();
					alert("This browser does not support HTML5.");
				}
			} else {
				$("#divProcessing").hide();
				alert("Please upload a valid Excel file.");
			}
			
		}
		function ProcessExcel(data) {
        //Read the Excel File data.
        var workbook = XLSX.read(data, {
            type: 'binary'
        });
 
        //Fetch the name of First Sheet.
        var firstSheet = workbook.SheetNames[0];
 
        //Read all rows from First Sheet into an JSON array.
        var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
		var packageTypes = {};
	try{
        //Add the data rows from Excel file.
        for (var i = 0; i < excelRows.length; i++) {
			data = excelRows[i];
			var packageMember = '';
			for (var objKey in ComponentObj) {
				if(data.Metadata_Type==objKey) {				
					if(!angular.isUndefined(packageTypes[data.Metadata_Type])) {
						packageMember = packageTypes[data.Metadata_Type];					
					}
					var seperator = '';
					if ((ComponentObj[objKey]).indexOf(".") != -1) {
						seperator = '.';
					} else if ((ComponentObj[objKey]).indexOf("-") != -1) {
						console.log('in else if--->'+(ComponentObj[objKey]).indexOf("-"));
						seperator = '-';
					} else if ((ComponentObj[objKey]).indexOf("/") != -1) {
						seperator = '/';
					}
					var res = [];
					if(seperator != ''){
						res = ComponentObj[objKey].split(seperator);
					} else {
						res[0] =  ComponentObj[objKey];
					}
					 
					console.log('seperator-->'+seperator);
					console.log(data[res[0].trim()]);
					if(res.length==2){
						console.log('in if-->'+res[0]+'##'+data[res[0]]+'##'+objKey) 
						packageMember += "<members>"+(data[res[0].trim()]).trim()+seperator+(data[res[1]]).trim()+"</members>";
					} else {
						console.log('in else-->'+res[0]+'##'+data[res[0].trim()])
						packageMember += "<members>"+(data[res[0].trim()]).trim()+"</members>";
					}
					
					packageTypes[data.Metadata_Type] = packageMember;
				} 
			}
			
			
			/*if(data.Metadata_Type=='CustomObjects') {				
				if(!angular.isUndefined(packageTypes[data.Metadata_Type])) {
					packageMember = packageTypes[data.Metadata_Type];					
				}
				packageMember += "<members>"+(data.Object_API_Name).trim()+"</members>";
				packageTypes[data.Metadata_Type] = packageMember;
			} else if(data.Metadata_Type=='ApexClass') {				
				if(!angular.isUndefined(packageTypes[data.Metadata_Type])) {
					packageMember = packageTypes[data.Metadata_Type];					
				}
				packageMember += "<members>"+(data.Component_API_Name).trim()+"</members>";
				packageTypes[data.Metadata_Type] = packageMember;
			} else if(data.Metadata_Type=='ApexPage') {				
				if(!angular.isUndefined(packageTypes[data.Metadata_Type])) {
					packageMember = packageTypes[data.Metadata_Type];					
				}
				packageMember += "<members>"+(data.Component_API_Name).trim()+"</members>";
				packageTypes[data.Metadata_Type] = packageMember;
			} else if(data.Metadata_Type=='ApexComponent') {				
				if(!angular.isUndefined(packageTypes[data.Metadata_Type])) {
					packageMember = packageTypes[data.Metadata_Type];					
				}
				packageMember += "<members>"+(data.Component_API_Name).trim()+"</members>";
				packageTypes[data.Metadata_Type] = packageMember;
			} else if(data.Metadata_Type=='ApexTrigger') {				
				if(!angular.isUndefined(packageTypes[data.Metadata_Type])) {
					packageMember = packageTypes[data.Metadata_Type];					
				}
				packageMember += "<members>"+(data.Component_API_Name).trim()+"</members>";
				packageTypes[data.Metadata_Type] = packageMember;
			} else if(data.Metadata_Type=='StaticResource') {				
				if(!angular.isUndefined(packageTypes[data.Metadata_Type])) {
					packageMember = packageTypes[data.Metadata_Type];					
				}
				packageMember += "<members>"+(data.Component_API_Name).trim()+"</members>";
				packageTypes[data.Metadata_Type] = packageMember;
			} else if(data.Metadata_Type=='CustomField') {				
				if(!angular.isUndefined(packageTypes[data.Metadata_Type])) {
					packageMember = packageTypes[data.Metadata_Type];					
				}
				packageMember += "<members>"+(data.Object_API_Name).trim()+"."+(data.Component_API_Name).trim()+"</members>";
				packageTypes[data.Metadata_Type] = packageMember;
			}*/
			
			/*var dataSTR = '<tr>';
			dataSTR += "<td>"+data.Metadata_Type+"</td>";
			dataSTR += "<td>"+data.Object_Label+"</td>";
			dataSTR += "<td>"+data.Object_API_Name+"</td>";
			dataSTR += "<td>"+data.Component_Label+"</td>";
			dataSTR += "<td>"+data.Component_API_Name+"</td>";
			dataSTR += '</tr>';
			$("#myTable tbody:last-child").append(dataSTR);*/
           
        }
		var packageData = '<?xml version="1.0" encoding="UTF-8"?><Package xmlns="http://soap.sforce.com/2006/04/metadata">';
		//alert(packageTypes);
		for (var type in packageTypes) {
			packageData += "<types>"; 
			packageData += packageTypes[type];
			packageData += "<name>"+type+"</name>";
			packageData += "</types>";
		}
		packageData+='<version>43.0</version></Package>';
		//alert(packageData);
		var xml_formatted = formatXml(packageData);

		var xml_escaped = xml_formatted.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/ /g, '&nbsp;').replace(/\n/g,'<br />');
		$("#divProcessing").hide();
		$("#pdiv").show();
		//$("textarea#dvPackage").val(xml_escaped);
		$("#dvPackage").html(xml_escaped);
		
	}catch(err) {
		$("#divProcessing").hide();
		 alert('Some thing went wrong Some columns are missing as per the Tracker. Please ensure tracker is as per the template. Please try again later '+err.message);
		}
    };
	
	function formatXml(xml) {
		var formatted = '';
		var reg = /(>)(<)(\/*)/g;
		xml = xml.replace(reg, '$1\r\n$2$3');
		var pad = 0;
		jQuery.each(xml.split('\r\n'), function(index, node)
		{
			var indent = 0;
			if (node.match( /.+<\/\w[^>]*>$/ ))
			{
				indent = 0;
			}
			else if (node.match( /^<\/\w/ ))
			{
				if (pad != 0)
				{
					pad -= 1;
				}
			}
			else if (node.match( /^<\w[^>]*[^\/]>.*$/ ))
			{
				indent = 1;
			}
			else
			{
				indent = 0;
			}
			var padding = '';
			for (var i = 0; i < pad; i++)
			{
				padding += '  ';
			}
			formatted += padding + node + '\r\n';
			pad += indent;
		});
		return formatted;
	}
	
	
			
	
}]);