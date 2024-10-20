<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <h1>Student Information System</h1>
    <form method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search students by name..." value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>">
        <button type="submit">Search</button>
    </form>
</nav>

<!-- Student List -->
<div class="table-container">
    <h2>Student Information</h2>
    <a href="add.php" class="add-button">Add New Student</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM students";
            
            // Search functionality
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $sql .= " WHERE name LIKE '%$search%'";
            }
            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['course']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}'><button class='edit-btn'>Edit</button></a>
                                <a href='delete.php?id={$row['id']}'><button class='delete-btn'>Delete</button></a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No students found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
