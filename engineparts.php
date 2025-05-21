<?php
    include 'engine-parts.php'; // Include the PHP file for engine parts
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Parts - Master Thai Parts & Accessories</title>
    <link rel="stylesheet" href="engineparts.css">
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
            <h1>Engine Parts</h1>
            
            <h2>Add</h2>
            <button onclick="showAddForm()">Add</button>

            <div id="addForm" style="display: none;">
                <form method="post" action="engineparts.php">
                    <label for="part_name">Part Name:</label><br>
                    <input type="text" id="part_name" name="part_name" required><br>
                    <label for="stocks">Stocks:</label><br>
                    <input type="number" id="stocks" name="stocks" required><br>
                    <label for="yamaha_price_range">Yamaha Price Range:</label><br>
                    <input type="text" id="yamaha_price_range" name="yamaha_price_range" required><br>
                    <label for="honda_price_range">Honda Price Range:</label><br>
                    <input type="text" id="honda_price_range" name="honda_price_range" required><br>
                    <label for="suzuki_price_range">Suzuki Price Range:</label><br>
                    <input type="text" id="suzuki_price_range" name="suzuki_price_range" required><br>
                    <label for="kawasaki_price_range">Kawasaki Price Range:</label><br>
                    <input type="text" id="kawasaki_price_range" name="kawasaki_price_range" required><br><br>
                    <input type="submit" name="add" value="Add Part">
                </form>
            </div>

            <div>
                <h2>Search</h2>
                <form id="searchForm">
                    <input type="text" id="search" name="search" placeholder="Enter keyword...">
                    <button type="submit">Search</button>
                </form>
            </div>

            <div id="searchResults"></div>

            <h2>Engine Parts</h2>
            <div id="mainTable">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Part Name</th>
                        <th>Stocks</th>
                        <th>Yamaha Price Range</th>
                        <th>Honda Price Range</th>
                        <th>Suzuki Price Range</th>
                        <th>Kawasaki Price Range</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"]. "</td>
                                    <td>" . $row["part_name"]. "</td>
                                    <td>" . $row["stocks"]. "</td>
                                    <td>" . $row["yamaha_price_range"]. "</td>
                                    <td>" . $row["honda_price_range"]. "</td>
                                    <td>" . $row["suzuki_price_range"]. "</td>
                                    <td>" . $row["kawasaki_price_range"]. "</td>
                                    <td>
                                        <form method='post' action='engineparts.php' style='display:inline-block;'>
                                            <input type='hidden' name='id' value='" . $row["id"]. "'>
                                            <input type='submit' name='delete' value='Delete'>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No parts found</td></tr>";
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

        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Create FormData object to send form data
            var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById('searchResults').innerHTML = xhr.responseText; // Update search results div with response
                        document.getElementById('mainTable').style.display = xhr.responseText.trim() ? "none" : "block"; // Toggle the main table based on search results
                    } else {
                        console.error('Error:', xhr.status);
                    }
                }
            };

            xhr.open('GET', 'search.php?' + new URLSearchParams(formData).toString(), true); // Prepare the AJAX request
            xhr.send(); // Send the request
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>
