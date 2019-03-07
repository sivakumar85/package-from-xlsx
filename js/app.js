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
 
        //Add the data rows from Excel file.
        for (var i = 0; i < excelRows.length; i++) {
			data = excelRows[i];
			var packageMember = '';
			for (var objKey in ComponentObj) {
				if(data.Metadata_Type==objKey) {				
					if(!angular.isUndefined(packageTypes[data.Metadata_Type])) {
						packageMember = packageTypes[data.Metadata_Type];					
					}
					var res = ComponentObj[objKey].split(".");
					//console.log(res[0]);
					console.log(data[res[0].trim()]);
					if(res.length==2){
						packageMember += "<members>"+data[res[0].trim()]+"."+data[res[1]]+"</members>";
					} else {
						packageMember += "<members>"+data[res[0].trim()]+"</members>";
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
		var packageData = '';
		//alert(packageTypes);
		for (var type in packageTypes) {
			packageData += "<types>"; 
			packageData += packageTypes[type];
			packageData += "<name>"+type+"</name>";
			packageData += "</types>";
		}
		//alert(packageData);
		
		$("#divProcessing").hide();
		$("#pdiv").show();
		$("textarea#dvPackage").val(packageData);
		
       
    };
	
}]);