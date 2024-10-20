<?php include 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    
    $sql = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add New Student</h2>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Phone:</label>
    <input type="text" name="phone" required><br>
    <label>Course:</label>
    <input type="text" name="course" required><br>
    <input type="submit" value="Add Student">
</form>

<a href="index.php">Back to List</a>

</body>
</html>
