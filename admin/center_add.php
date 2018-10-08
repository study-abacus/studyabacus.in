<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Study Abacus | Learn Vedic Maths | Teacher Training</title>
</head>

<body>
<?php
$choice = 0;
if($_SESSION["is_allow"])
{
	if($_POST["user"]=="study"&&$_POST["pass"]=="jatin@123")
	{?>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
    	<tr>
            <td style="text-align:center" colspan="2"> Enter Details </td>
        </tr>
        <tr>
            <td> Location: </td><td><input type="text" name="loc"></td>
        </tr>
        <tr>
            <td> Name:  </td><td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td> Address:  </td><td><input type="text" name="add"></td>
        </tr>
        <tr>
            <td> Center number:  </td><td><input type="text" name="c_n"></td>
        </tr>
        <tr>
            <td colspan="2"> <input type="submit" name="submit" value="submit"></td>
    	</tr>
    </table>
    </form>
    	
	<?php ?>
    <br>
    <a href="index.php"> Go Back </a>
    <?php
}
?>
<?php

if ($_SERVER['REQUEST_METHOD']=="GET")
{
    $servername = "localhost";
    $username = "abboniss_root";
    $password = "jatin@123";
    $dbname = "abboniss_studyabacus";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO workshop VALUES ('".$_GET["loc"]."', '".$_GET["name"]."', '".$_GET["add"]."','".$_GET["c_n"]."')";

    if ($conn->query($sql) === TRUE) {
       echo " <br>New record created successfully";
     } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   

}
?>
</body>
</html>