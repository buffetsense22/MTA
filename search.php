<?php
include 'braking-system.php'; // Ensure this includes the correct database connection setup

if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $sql = "SELECT * FROM parts WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%' OR category LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["description"] . "</td>
                    <td>" . $row["category"] . "</td>
                    <td>
                        <form method='post' action='brakeparts.php' style='display:inline-block;'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <input type='submit' name='delete' value='Delete'>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No parts found";
    }
} else {
    echo "Search keyword is missing";
}

$conn->close();
?>
