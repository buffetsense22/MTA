<?php
    include 'fuel-system.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Parts - Master Thai Parts & Accessories</title>
    <link rel="stylesheet" href="fuel.css">
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
            <h1>Fuel System Parts</h1>
            
            <h2>Add</h2>
            <button onclick="showAddForm()">Add</button>

            <div id="addForm" style="display: none;">
                <form method="post" action="fuel-system.php">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" required><br>
                    <label for="stocks">Stocks:</label><br>
                    <input type="number" id="stocks" name="stocks" required><br>
                    <label for="brand">Brand:</label><br>
                    <input type="text" id="brand" name="brand" required><br>
                    <label for="price_range">Price Range:</label><br>
                    <input type="text" id="price_range" name="price_range" required><br><br>
                    <input type="submit" name="add" value="Add Part">
                </form>
            </div>

            <div>
                <h2>Search</h2>
                <form id="searchForm" method="post" action="">
                    <input type="text" id="search_name" name="search_name" placeholder="Enter part name...">
                    <input type="text" id="search_brand" name="search_brand" placeholder="Enter brand...">
                    <input type="submit" name="search" value="Search">
                </form>
            </div>

            <div id="searchResults"></div>

            <h2>Fuel System Parts</h2>
            <div id="mainTable">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Stocks</th>
                        <th>Brand</th>
                        <th>Price Range</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"]. "</td>
                                    <td>" . $row["part_name"]. "</td>
                                    <td>" . $row["stocks"]. "</td>
                                    <td>" . $row["brand"]. "</td>
                                    <td>" . $row["price_range"]. "</td>
                                    <td>
                                        <form method='post' action='fuel-system.php' style='display:inline-block;'>
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