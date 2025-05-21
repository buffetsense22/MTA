<?php
include 'suspension-system.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Parts - Master Thai Parts & Accessories</title>
    <link rel="stylesheet" href="suspension.css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="logo-container">
                <div class="logo-img">
                    <img src="Master Thai Parts logo.jpg" alt="logo">
                </div>
                <h2 class="logo">Master Thai Parts & Accessories</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="category.php">Category</a></li>
                    <li><a href="report.php">Report</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="report.php">Report</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="page-content">
            <h1>Manage Parts</h1>

            <h2>Add Part</h2>
            <button onclick="showAddForm()">Add</button>

            <div id="addForm" style="display: none;">
                <form method="post" action="">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" required><br>
                    <label for="description">Description:</label><br>
                    <input type="text" id="description" name="description" required><br>
                    <label for="category">Category:</label><br>
                    <input type="text" id="category" name="category" required><br>
                    <label for="price">Price:</label><br>
                    <input type="number" id="price" name="price" required><br><br>
                    <input type="submit" name="add" value="Add Part">
                </form>
            </div>

            <h2>Search Parts</h2>
            <form id="searchForm" method="post" action="">
                <input type="text" id="search_name" name="search_name" placeholder="Enter part name...">
                <input type="text" id="search_description" name="search_description" placeholder="Enter description...">
                <input type="text" id="search_category" name="search_category" placeholder="Enter category...">
                <input type="submit" name="search" value="Search">
            </form>

            <h2>Suspension Parts</h2>
            <div id="mainTable">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Part Type</th>
                        <th>Stock</th>
                        <th>Brand</th>
                        <th>Price Range</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"]. "</td>
                                    <td>" . $row["part_type"]. "</td>
                                    <td>" . $row["stock"]. "</td>
                                    <td>" . $row["brand"]. "</td>
                                    <td>" . $row["price_range"]. "</td>
                                    <td>
                                        <form method='post' action='' style='display:inline-block;'>
                                            <input type='hidden' name='id' value='" . $row["id"]. "'>
                                            <input type='submit' name='delete' value='Delete'>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No parts found</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        function showAddForm() {
            var addForm = document.getElementById("addForm");
            if (addForm.style.display === "none") {
                addForm.style.display = "block";
            } else {
                addForm.style.display = "none";
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>