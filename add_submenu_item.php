<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Validate inputs
    if (!empty($category_id) && !empty($name) && !empty($price)) {
        $stmt = $conn->prepare("INSERT INTO submenu_items (category_id, name, price) VALUES (?, ?, ?)");
        $stmt->bind_param("isd", $category_id, $name, $price);

        if ($stmt->execute()) {
            echo "Submenu item added successfully.";
            header("Location: admin_panel.php"); // Redirect to admin panel
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "All fields are required.";
    }
}
?>
