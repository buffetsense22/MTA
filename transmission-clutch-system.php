<?php
include 'config.php';

// Initialize variables for search parameters
$searchPartType = "";
$searchBrand = "";
$searchPriceRange = "";

// Check if search form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {
        // Retrieve search parameters from form
        $searchPartType = $_POST['search_part_type'];
        $searchBrand = $_POST['search_brand'];
        $searchPriceRange = $_POST['search_price_range'];
    }

    if (isset($_POST['add'])) {
        // Add a new part to the database
        $partType = $_POST['part_type'];
        $stock = $_POST['stock'];
        $brand = $_POST['brand'];
        $priceRange = $_POST['price_range'];

        $sqlAdd = "INSERT INTO transmission_clutch_parts (part_type, stock, brand, price_range) VALUES ('$partType', '$stock', '$brand', '$priceRange')";
        if (!$conn->query($sqlAdd)) {
            die("Error adding part: " . $conn->error);
        }
    }

    if (isset($_POST['delete'])) {
        // Delete a part from the database
        $id = $_POST['id'];
        $sqlDelete = "DELETE FROM transmission_clutch_parts WHERE id = '$id'";
        if (!$conn->query($sqlDelete)) {
            die("Error deleting part: " . $conn->error);
        }
    }
}

// Construct base SQL query to fetch parts
$sql = "SELECT * FROM transmission_clutch_parts";

// Append WHERE clause for search criteria
$whereClauses = [];
if (!empty($searchPartType)) {
    $whereClauses[] = "part_type LIKE '%$searchPartType%'";
}
if (!empty($searchBrand)) {
    $whereClauses[] = "brand LIKE '%$searchBrand%'";
}
if (!empty($searchPriceRange)) {
    $whereClauses[] = "price_range LIKE '%$searchPriceRange%'";
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