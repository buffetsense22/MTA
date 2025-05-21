<?php
include 'config.php';

// Initialize variables for search parameters
$searchName = "";
$searchDescription = "";
$searchCategory = "";

// Check if search form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    // Retrieve search parameters from form
    $searchName = $_POST['search_name'];
    $searchDescription = $_POST['search_description'];
    $searchCategory = $_POST['search_category'];
}

// Construct base SQL query to fetch parts
$sql = "SELECT * FROM engineparts";

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
?>
