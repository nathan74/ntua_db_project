<!DOCTYPE>
<html>
<head>
<title> Delete </title>
</head>
<body>
	<script type="text/javascript" language="javascript" >
	var selectedRow

function visited(tr) {
    var table = tr.parentNode.parentNode;
    var trs = table.getElementsByTagName('tr');
    
    for (var i = 0; i < trs.length; i++)
        {
        //trs[i].style.backgroundColor = null;
        trs[i].style.color = null;
        }
    
    
    selected = tr;
    
    	
    //tr.style.backgroundColor = '#eeff33';
    tr.style.color = '#0000ff';

}


function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
		var Id = row.cells[1].innerHTML;
		var DOA = row.cells[2].innerHTML;
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
		    rowCount--;
                    i--;
		    //$.post("delete.php",{BId:row.cells[1].childNodes[0]});
		    window.location.href = "delete.php?Id=" + Id + "&DateOfAgreement=" + DOA; //send the keys to php
                    //table.deleteRow(i);
                    
                }
	} 		
		window.location.href = "delete.php?Id=" + -1 ; //if none found return
 
            
            }catch(e) {
		
                alert(e);
            }
        }


function updateRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 	    	var form = document.forms[1];
	    	var Deadline = form.elements[0].value;;
	//	if(!Name) Name=-1;
	//	if(!Town) Town=-1;
	//	if(!StreetName) StreetName=-1;
	//	if(!StreetNumber) StreetNumber=-1;
	//	if(!PostalCode) PostalCode=-1;
		

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
		var Id = row.cells[1].innerHTML;
		var DateOfAgreement = row.cells[3].innerHTML;

                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
		    rowCount--;
                    i--;
		    
		    //$.post("delete.php",{BId:row.cells[1].childNodes[0]});
		    window.location.href = "update.php?Id=" + Id + "&Deadline=" + Deadline + "&DateOfAgreement=" + DateOfAgreement  ; //send the keys to php
                    //table.deleteRow(i);
                   return;
                }
 	    }
		window.location.href = "update.php?Id=" + -1 ; //if none found return
 
            
            }catch(e) {
		
                alert(e);
            }
        }
	

	</script>
	<?php
		/*Connection*/
		
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
		
		$myid = $_GET['Id'];
		$Deadline = $_GET['Deadline'];
		$DateOfAgreement = $_GET['DateOfAgreement'];

		
		if ($myid == -1){
			mysqli_close($connect);
			
			header('Location: DeadLine.php');
		}
			
					
		if ($Deadline!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`DeadLine` SET `DeadLine` = '$Deadline' WHERE `DeadLine`.`Id` = '$myid' AND `DeadLine`.`DateOfAgreement` = '$DateOfAgreement' ");
		}


		/*$results = mysqli_query($connect,"UPDATE `project`.`DeadLine` SET `BId` = '$myid',`Name` = '$Name',`Town` = '$Town',`StreetName` = '$StreetName',`StreetNumber` = '$StreetNumber',`PostalCode` = '$PostalCode' WHERE `DeadLine`.`BId` = '$myid' ");*/
	
		mysqli_close($connect);

		header('Location: DeadLine.php');
	?>	
	
</body>
</html>
