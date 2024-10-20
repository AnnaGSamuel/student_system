<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    
    $sql = "UPDATE students SET name = '$name', email = '$email', phone = '$phone', course = '$course' WHERE id = $id";
    
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
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $student['name']; ?>" required><br>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br>
    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo $student['phone']; ?>" required><br>
    <label>Course:</label>
    <input type="text" name="course" value="<?php echo $student['course']; ?>" required><br>
    <input type="submit" value="Update Student">
</form>

<a href="index.php">Back to List</a>

</body>
</html>
