<?php include ('../include/dbcon.php');

?>
<?php 
ob_start();
if($_SESSION['role'] == "Administrator")
{
?>
<html>

<head>
		<title>Library Management System</title>
		
		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}
@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		
		</style>
<script>
function printPage() {
    window.print();
}
</script>
		
</head>


<body>
	<div class = "container">
		<div id = "header">
		<br/>
				
				<center><img src = "../img/logo.png" style="text-align: center; width: 130px; height: 130px;"></center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5>  &nbsp; Library Management System</center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5>Saint Francis Of Assisi College</center>
				

			<p style = "margin-left:10px; margin-top:20px; font-size:14pt; font-weight:bold;">Returned Books Monitoring&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
			<button type="submit" id="print" onclick="printPage()">Print</button>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
    <?php include('session.php'); ?>
<?php 
include ('../include/dbcon.php');
							 $return_query= mysqli_query($con,"select * from book 
                            LEFT JOIN tbl_moa ON tbl_moa.moa_id = book.moa_id
        LEFT JOIN tbl_publishers ON tbl_publishers.publisher_id = book.publisher_id
        LEFT JOIN tbl_placeofpublications ON tbl_placeofpublications.pop_id = book.pop_id
                            where date_of_publ = '".$_SESSION['date']."' OR author = '".$_SESSION['date']."' OR subject = '".$_SESSION['date']."' OR title = '".$_SESSION['date']."' ") or die (mysqli_error($con));
                            $return_count = mysqli_num_rows($return_query);
								
							
?>
						<table cellpadding="2" cellspacing="2" border="2" class="table table-striped" style="border: 1px solid">
                                
								
						  <thead>
								<tr>
									<th>Accession No./Barcode</th>
                                    <th>Title</th>
                                    <th>Subject/s</th>
                                    <th>Author</th>
                                    <th>Editor</th>
                                    <th>Edition</th>
                                    <th>Place of Publ</th>
                                    <th>Publisher</th>
                                    <th>Date_of_Publ</th>
                                    <th>Series</th>
                                    <th>ISBN_No</th>
                                    <th>Status</th>
                                    <th>ISSN_No</th>
                                    <th>Notation1</th>
                                    <th>Notation2</th>
                                    <th>Abstract</th>
                                    <th>Remarks</th>
								</tr>
						  </thead>   
						  <tbody>
<?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
?>
							<tr>
								 <td><?php echo $return_row['accession_no']; ?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $return_row['title']; ?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $return_row['subject']; ?></td>
                                <td><?php echo $return_row['author']; ?></td>
                                <td><?php echo $return_row['editor']; ?></td>
                                <td><?php echo $return_row['edition']; ?></td>
                                <td><?php echo $return_row['placeofpublication']; ?></td> 
                                <td><?php echo $return_row['publisher']; ?></td> 
                                <td><?php echo $return_row['date_of_publ']; ?></td> 
                                <td><?php echo $return_row['series']; ?></td>
                                <td><?php echo $return_row['isbn_no']; ?></td>
                                <td><?php echo $return_row['moa']; ?></td>
                                <td><?php echo $return_row['issn_no']; ?></td>
                                <td><?php echo $return_row['notation1']; ?></td>
                                <td><?php echo $return_row['notation2']; ?></td>
                                <td><?php echo $return_row['abstract']; ?></td>
                                <td><?php echo $return_row['remarks']; ?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							
							<?php 
							}
							
														
							?>
							</tr>  
						  </tbody> 
					  </table> 
							<?php
								include('../include/dbcon.php');
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysql_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>

<?php }else{
    header("Location: 404.php");
} ?>
</html>