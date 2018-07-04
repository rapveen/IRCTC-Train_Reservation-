<?php 
session_start();
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>PNR Status</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#pnr	{
			font-size: 20px;
			background-color: white;
			width: 500px;
			height: 300px;
			margin: auto;
			border-radius: 25px;
			border: 2px solid blue; 
			margin: auto;
  			position: absolute;
  			left: 0; 
  			right: 0;
  			padding-top: 40px;
  			padding-bottom:20px;
  			margin-top: 130px;
 
		}
		html { 
		  background: url(img/bg7.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#pnrtext	{
			padding-top: 20px;
		}
	</style>
</head>
<body>
<?php
include("header.php"); ?>
<center>
	<div id="pnr">Print Your Ticket:<br/><br/>
	<form method="post" name="pnrstatus">
	<div id="pnrtext"><input type="text" name="pnr" size="30" maxlength="10" placeholder="Enter PNR here"></div>
	<br/><br/>
	<input type="submit" name="submit" value="check here!" class="button" id="submit"><br/><br/>
	<?php  
	$pnr="";
$train="";
if (isset($_POST['submit']))
{
$pnr=$_POST['pnr'];

$query = "SELECT * FROM tickets_info WHERE pnr = '$pnr'"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
       $train=$row['train_no.'];
      }
echo "<center><h2>TICKET</h2></center>";
echo "<h4>PNR No.: ".$pnr."<br></h4>";
echo "<h4>Train No.: ".$train."</h4><br>";
$query = "SELECT * FROM tickets_info WHERE pnr = '$pnr'"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){   //Creates a loop to loop through results
  echo "<h4>Name: " . $row['name']. " - Age: " . $row["age"]. " " . $row["gender"]. "Seat Pref. : ".$row['seatpref']."</h4><br>";
}
$sql = "SELECT fare FROM tickets WHERE pnr = '$pnr'";
$result1 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "<h4>fare: ".$row['fare']."<h4><br>";
}
?>
<br/><br/>
<input type="submit" name="print" value="Print here!" class="button" id="print" onclick="window.print()"><br/><br/>
</form>	
</div>
</center>
</body>
</html>