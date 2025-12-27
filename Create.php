<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD']=="POST"&& isset($_POST['add_student'])){
	try{
	$name=$_POST['name']??'';
	$email=$_POST['email']??'';
	$course=$_POST['course']??'';



	$sql="INSERT INTO students(name,email,course)
	VALUES(?,?,?)";

	$stml=$pdo->prepare($sql);
	$stml->execute([$name,$email,$course]);
	}
	catch(PDOException $e){
		die("Unable to connect database".$e->getMessage());

	}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student database</title>
	<style>
        form{
            background-color:#FFFFFF;
            border:solid;
            width:600px;
            borders:Light Gray;
            padding:34px;
        }
		input{
			display:block;
			margin-bottom:2rem;
            margin-left:16px;
            width:500px;
            height:50px;
		}
        form button{
            background-color:#DC143C;
            padding:25px;
            width:37.5rem;
        }
        #read{
            color:black;
        }

	</style>
</head>
<body>
<h1>Insert student credintial</h1>

<form method="POST">
	Name:<input type="text" name="name" required>
	Email:<input type="email" name="email">
	course: <input type="Text" name="course">
	<button type="submit" name="add_student">Add student </button>
</form>
<a id="read" href="read_student.php">Back to list</a>
</body>
</html>