<?php
	session_start();

	include 'database_connection.php';

	if($_POST['uname'] && $_POST['password'])
	{
		$name=$_POST['uname'];
		$lname = $_POST['lname'];
		$gen = $_POST['gender'];
		$city = $_POST['city'];
		$birth = $_POST['birth'];
		$type = $_POST['utype'];
		$email = $_POST['email'];
		$pass=$_POST['password'];

		if($type=='Admin')
			admin($name,$lname,$gen,$city,$birth,$email,$pass,$con);
		else
			parent($name,$lname,$gen,$city,$birth,$email,$pass,$con);
	}

	function admin($name,$lname,$gen,$city,$birth,$email,$pass,$con)
	{
		 $query = "INSERT INTO admin (username, lastname, gender, city, birth, email, pass) 
              VALUES ('$name', '$lname', '$gen', '$city', '$birth', '$email', '$pass')";
    
		$result=mysqli_query($con,$query);

		if(!$result)
		{
			die("<br>Can't Insert Data : " . mysqli_error($con));
		}
		echo "<script>alert('Admin Record Inserted..!!');window.location='index.php'</script>";
	}

	function parent($name, $lname, $gen, $city, $birth, $email, $pass, $con)
	{
	    $query = "INSERT INTO parent (p_username, p_lastname, p_gender, p_city, p_birth, p_email, p_pass) 
	              VALUES ('$name', '$lname', '$gen', '$city', '$birth', '$email', '$pass')";
	    
	    $result = mysqli_query($con, $query);

	    if (!$result) {
	        die("<br>Can't Insert Data : " . mysqli_error($con));
	    }
	    echo "<script>alert('Parent Record Inserted..!!');window.location='index.php'</script>";
	}

?>