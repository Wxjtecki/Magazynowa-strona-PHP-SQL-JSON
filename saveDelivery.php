<?php
require_once "db_conn.php";


$category = $_POST["category"];
$product = $_POST["product"];
$quantity = $_POST["quantity"];


if (empty($category) || empty($product) || empty($quantity)) {
    echo "Error: Missing required data.";
    exit;
}


$sql = "SELECT * FROM `kategorie` WHERE `nazwa` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Error: Category not found.";
    exit;
}


$sql = "SELECT * FROM `$category` WHERE `nazwa` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $product);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Error: Product not found in the specified category.";
    exit;
}


$sql = "UPDATE `$category` SET `ilosc` = `ilosc` + ? WHERE `nazwa` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $quantity, $product);

if ($stmt->execute()) {
    echo "Dostawa została dodana pomyślnie.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
