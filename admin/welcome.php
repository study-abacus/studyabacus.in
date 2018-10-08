<?php session_start(); ?>
<html>
<head><title>Admin Page</title></head>
<body>
<?php
$_SESSION ["is_allow"]=true;
if ($_SERVER["REQUEST_METHOD"]=="POST") {
if($_POST["user"]=="study"&&$_POST["pass"]=="jatin@123"){?>
<h1 align="center"> Administrator panel</h1>
	<center>
	<style type="text/css">
		table{
			font-size: 24px;
		}
	</style>
		<table border="1" cellpadding="1" cellspacing="1">
			<tr>
				<td>
					<a href="center_add.php"> Add a centre </a>	
				</td>
			</tr>
			<tr>
				<td>
					<a href="">Modify Centers</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="">Modify Student of the week</a>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
			</tr>
		</table>
	</center>
 <?php }
 else{
 	echo "<script> location.replace(\"welcome.php\"); </script>";
 }
 }
 else
 	echo "please login" 
?>
</body>
</html>