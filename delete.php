<?php 
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete_student'])) {
    try {
        $id = $_POST['id'];
       
        $sql = "DELETE FROM students
        WHERE $id=?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        } catch (PDOException $e) {
        $error = "Unable to delete the row: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		form{
            background-color:grey;
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
           background-color: yellow;
  		   border: none;
  		   color: black;
  		   padding: 15px 32px;
  		   text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 16px;
  			cursor: pointer;
        }
	</style>
<body>
	<form method="POST">
	<label for="name">id:</label>
        <input type="text" name="id" id="name" placeholder="Enter id">

	<button type="submit" name="delete_student">Delete</button>
</form>
</body>
</html>