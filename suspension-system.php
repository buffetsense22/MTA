<?php
include 'config.php';

// Initialize variables for search parameters
$searchName = "";
$searchDescription = "";
$searchCategory = "";

// Check if search form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {
        // Retrieve search parameters from form
        $searchName = $_POST['search_name'];
        $searchDescription = $_POST['search_description'];
        $searchCategory = $_POST['search_category'];
    }

    if (isset($_POST['add'])) {
        // Add a new part to the database
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $price = $_POST['price'];

        $sqlAdd = "INSERT INTO parts (name, description, category, price) VALUES ('$name', '$description', '$category', '$price')";
        if (!$conn->query($sqlAdd)) {
            die("Error adding part: " . $conn->error);
        }
    }

    if (isset($_POST['delete'])) {
        // Delete a part from the database
        $id = $_POST['id'];
        $sqlDelete = "DELETE FROM parts WHERE id = '$id'";
        if (!$conn->query($sqlDelete)) {
            die("Error deleting part: " . $conn->error);
        }
    }
}

// Construct base SQL query to fetch parts
$sql = "SELECT * FROM suspensionparts";

// Append WHERE clause for search criteria
$whereClauses = [];
if (!empty($searchName)) {
    $whereClauses[] = "name LIKE '%$searchName%'";
}
if (!empty($searchDescription)) {
    $whereClauses[] = "description LIKE '%$searchDescription%'";
}
if (!empty($searchCategory)) {
    $whereClauses[] = "category LIKE '%$searchCategory%'";
}

// Combine WHERE clauses with AND operator
if (!empty($whereClauses)) {
    $sql .= " WHERE " . implode(" AND ", $whereClauses);
}

// Execute SQL query
$result = $conn->query($sql);
if (!$result) {
    die("Error executing query: " . $conn->error);
}
?>