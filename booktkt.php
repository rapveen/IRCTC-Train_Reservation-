<?php 
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
	}
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$trains=$_POST['trains'];
$pnr=rand(10000000,99999999);
$_SESSION['pnr'] = $pnr;
$sql = "SELECT t_no, price FROM trains WHERE t_name = '$trains'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email=$_SESSION['user_info'];
$fare=0;
$pid=0;
$pass1=$_POST['name1'];
if($pass1!=""){
$pid=$pid+1;
$pass1age=$_POST['age1'];
$pass1gen=$_POST['gender1'];
$pass1pref=$_POST['seat1'];
$pass1snr=0;
$fare=$fare+$row['price'];
if($pass1age>60){
$pass1snr=1;
$fare=$fare-$row['price']/2;
}
$sql="INSERT into ticket_info values ('$pnr','$row[t_no]','$pass1','$pass1age','$pass1gen','$pass1pref','$pass1snr');";
$result = mysqli_query($conn, $sql);
if($result)
{  
	$message = "Ticket booked successfully";
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
$pass2=$_POST['name2'];
if($pass2!=""){
	$pid=$pid+1;
$pass2age=$_POST['age2'];
$pass2gen=$_POST['gender2'];
$pass2pref=$_POST['seat2'];
$pass2snr=0;
$fare=$fare+$row['price'];
if($pass2age>60){
$pass2snr=1;
$fare=$fare-$row[price]/2;
}
$sql="INSERT into ticket_info values ('$pnr','$row[t_no]','$pass2','$pass2age','$pass2gen','$pass2pref','$pass2snr');";
$result = mysqli_query($conn, $sql);
if($result)
{  
	$message = "Ticket booked successfully";
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
$pass3=$_POST['name3'];
if($pass3!=""){
	$pid=$pid+1;
$pass3age=$_POST['age3'];
$pass3gen=$_POST['gender3'];
$pass3pref=$_POST['seat3'];
$pass3snr=0;
$fare=$fare+$row['price'];
if($pass3age>60){
$pass3snr=1;
$fare=$fare-$row['price']/2;
}
$sql="INSERT into ticket_info values ('$pnr','$row[t_no]','$pass3','$pass3age','$pass3gen','$pass3pref','$pass3snr');";
$result = mysqli_query($conn, $sql);
if($result)
{  
	$message = "Ticket booked successfully";
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
$pass4=$_POST['name4'];
if($pass4!=""){
	$pid=$pid+1;
$pass4age=$_POST['age4'];
$pass4gen=$_POST['gender4'];
$pass4pref=$_POST['seat4'];
$pass4snr=0;
$fare=$fare+$row['price'];
if($pass4age>60){
$pass4snr=1;
$fare=$fare-$row['price']/2;
}
$sql="INSERT into ticket_info values ('$pnr','$row[t_no]','$pass4','$pass4age','$pass4gen','$pass4pref','$pass4snr');";
$result = mysqli_query($conn, $sql);
if($result)
{  
	$message = "Ticket booked successfully";
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}}}}
if($pid>0){
	$_COOKIE['fare'] = $fare;
$query="INSERT into tickets values ('$pnr','1','$fare','$pid');";
if(mysqli_query($conn, $query))
{  
	$message = "Ticket booked successfully with PNR " .$pnr;
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book a ticket</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#booktkt	{
			margin:auto;
			margin-top: 50px;
			width: 40%;
			height: 60%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(0,0,0,0.3);
			border-radius: 25px;
		}
		html { 
		  background: url(img/bg7.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#journeytext	{
			color: white;
			font-size: 28px;
			font-family:"Comic Sans MS", cursive, sans-serif;
		}
		#trains	{
			margin-left: 90px;
			font-size: 15px;
		}
		#submit	{
			margin-left: 150px;
			margin-bottom: 40px;
			margin-top: 30px
		}
	</style>
	<script type="text/javascript">
		function validate()	{
			var trains=document.getElementById("trains");
			if(trains.selectedIndex==0)
			{
				alert("Please select your train");
				trains.focus();
				return false;		
			}
		}
	</script>
</head>
<body>
	<?php
		include ('header.php');
	?>
	<div id="booktkt">
	<h1 align="center" id="journeytext">Choose your journey</h1><br/><br/>
	<form method="post"  name="journeyform" onsubmit="return validate()">
		<select id="trains" name="trains" required>
			<option selected disabled>-------------------Select trains here----------------------</option>
			<option value="rajdhani" >Rajdhani Express - Mumbai Central to Delhi</option>
			<option value="duronto" >Duronto Express - Mumbai Central to Ernakulum</option>
			<option value="geetanjali">Geetanjali Express - CST to Kolkata</option>
			<option value="garibrath" >Garib Rath - Udaipur to Jammu Tawi</option>
			<option value="mysoreexp" >Mysore Express - Talguppa to Mysore Jn</option>
		</select>
		<br/><br/>
		<center>
		<input name="journeydate" id="journeydate" type="date">
		</center>
		<table>
		<TR class="left">
		<TD><FONT size="5" color="WHITE">NAME</FONT></TD>
		<TD><FONT size="5" color="WHITE">AGE</FONT></TD>
		<TD><FONT size="5" color="WHITE">GENDER</FONT></TD>
		<TD><FONT size="5" color="WHITE">SEAT PREF.</FONT></TD>
		</TR>
		<TR class="left">
		<TD><INPUT name="name1" type="TEXT" id="name11" placeholder="NAME" size="30" maxlength="30"></TD>
		<TD><INPUT name="age1" type="TEXT" id="age11" placeholder="AGE" size="30" maxlength="30"></TD>
		<TD><INPUT name="gender1" type="TEXT" id="gender11" placeholder="GENDER" size="30" maxlength="30"></TD>
		<td><select id="seat11" name="seat1" required>
			<option selected disabled>SEAT PREF</option>
			<option value="LB" >LB</option>
			<option value="MB" >MB</option>
			<option value="UB">UB</option>
			<option value="SL" >SL</option>
			<option value="SU" >SU</option>
		</select></td>
		</TR>
			<TR class="left">
		<TD><INPUT name="name2" type="TEXT" id="namee1" placeholder="NAME" size="30" maxlength="30"></TD>
		<TD><INPUT name="age2" type="TEXT" id="age2" placeholder="AGE" size="30" maxlength="30"></TD>
		<TD><INPUT name="gender2" type="TEXT" id="gender2" placeholder="GENDER" size="30" maxlength="30"></TD>
		<td><select id="seat2" name="seat2" required>
			<option selected disabled>SEAT PREF</option>
			<option value="LB" >LB</option>
			<option value="MB" >MB</option>
			<option value="UB">UB</option>
			<option value="SL" >SL</option>
			<option value="SU" >SU</option>
		</select></td>
		</TR>
			<TR class="left">
		<TD><INPUT name="name3" type="TEXT" id="name3" placeholder="NAME" size="30" maxlength="30"></TD>
		<TD><INPUT name="age3" type="TEXT" id="age3" placeholder="AGE" size="30" maxlength="30"></TD>
		<TD><INPUT name="gender3" type="TEXT" id="gender3" placeholder="GENDER" size="30" maxlength="30"></TD>
		<td><select id="seat3" name="seat3" required>
			<option selected disabled>SEAT PREF</option>
			<option value="LB" >LB</option>
			<option value="MB" >MB</option>
			<option value="UB">UB</option>
			<option value="SL" >SL</option>
			<option value="SU" >SU</option>
		</select></td>
		</TR>
		<TR class="left">
		<TD><INPUT name="name4" type="TEXT" id="name4" placeholder="NAME" size="30" maxlength="30"></TD>
		<TD><INPUT name="age4" type="TEXT" id="age4" placeholder="AGE" size="30" maxlength="30"></TD>
		<TD><INPUT name="gender4" type="TEXT" id="gender4" placeholder="GENDER" size="30" maxlength="30"></TD>
		<td><select id="seat4" name="seat4" required>
			<option selected disabled>SEAT PREF</option>
			<option value="LB" >LB</option>
			<option value="MB" >MB</option>
			<option value="UB">UB</option>
			<option value="SL" >SL</option>
			<option value="SU" >SU</option>
		</select></td>
		</TR>
		</table>
		<input type="submit" name="submit" id="submit" class="button" />
	</form>
	</div>
	</body>
	</html>