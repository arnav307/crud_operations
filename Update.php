
<?php
require 'db.php';  // your database connection file

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_student'])) {
    try {
        $id = $_POST['id'];
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $course = $_POST['course'] ?? '';
        $sql = "UPDATE students SET name=?, email=?, course=? WHERE id=?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $course,$id]);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } catch (PDOException $e) {
        $error = "Unable to update student: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Student</title>
</head>
<style>
     form{
            background-color:#F2BA49;
            border:solid;
            width:600px;
            borders:Light Gray;
            padding:34px;
        }
        input{
            display:block;
            margin-bottom:2rem;
            margin-left:16px;
            width:600px;
            height:50px;
        }
        form button{
            background-color:lightgoldenrodyellow;
            padding:25px;
            width:37rem;
        }
        
</style>

<div class="form-container">
    <h2>Update Student</h2>
   <!--  <?php if (!empty($error)) 
        echo "<p class='message error'>$error</p>"; ?>
    <?php if (!empty($success)) 
        echo "<p class='message success'>$success</p>"; ?>
 -->
    <form method="POST">
        <label for="name">id:</label>
        <input type="text" name="id" id="name" placeholder="Enter id">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter name">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter email">

        <label for="course">Course:</label>
        <input type="text" name="course" id="course" placeholder="Enter course">

        <button type="submit" name="update_student">Update Student</button>
    </form>
    <a href="read_student.php">Back to list</a>
</div>

</body>
</html>