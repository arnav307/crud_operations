<?php
require 'db.php';



try {
    $sql = "SELECT * FROM students";
    $stmt = $pdo->query($sql); // no need to prepare, simple query
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch all records as associative array
} catch (PDOException $e) {
    die("Error fetching students: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student database</title>
    <style>
        input {
            display: block;
            margin-bottom: 2rem;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 2rem;
        }
        th, td {
            border: 1px solid #333;
            padding: 0.5rem 1rem;
        }
        th {
            background-color: #f2f2f2;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex; 
            }

        ul li a {
            display: block;
            background-color: white;
            padding: 14px 16px;
            text-decoration: none;
            }

        ul li a {
            background-color: #111111;
            }
        #create{
            background-color:lightgreen;
        }
        #update{
            background-color:orange;
        }
        #delete{
            background-color: red;
        }
    </style>
</head>
<body>
<h2>All Students</h2>
<nav>
    <ul>
        <li><a id="create" href="create.php">Add New Student</a></li>
        <li><a id="update" href="update.php?id=">Edit</a></li>
        <li><a id="delete" href="delete.php?id=">Delete</a></li>
    </ul>
</nav>
<?php if (!empty($students)): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['id']) ?></td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['email']) ?></td>
                <td><?= htmlspecialchars($student['course']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No students found.</p>
<?php endif; ?>

</body>
</html>
