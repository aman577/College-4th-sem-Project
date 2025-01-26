<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = new mysqli("localhost", "root", "", "project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch submenu item details (GET request)
if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; // Ensure $id is an integer to prevent SQL injection
    $result = $conn->query("SELECT * FROM submenu_items WHERE id = $id");

    if ($result->num_rows > 0) {
        $submenu = $result->fetch_assoc();
    } else {
        die("Submenu item not found.");
    }
} else {
    die("No ID provided.");
}

// Update submenu item (POST request)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = (int) $_POST['id'];
    $category_id = (int) $_POST['category_id'];
    $name = $_POST['name'];
    $price = (float) $_POST['price'];

    // Prepare the update query
    $stmt = $conn->prepare("UPDATE submenu_items SET category_id = ?, name = ?, price = ? WHERE id = ?");
    $stmt->bind_param("isdi", $category_id, $name, $price, $id);

    // Execute and check the result
    if ($stmt->execute()) {
        echo "Submenu item updated successfully.";
        header("Location: admin_panel.php"); // Redirect after success
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Submenu Item</title>
</head>
<body>
    <h1>Edit Submenu Item</h1>

    <!-- Display the form if submenu item is available -->
    <?php if (isset($submenu)): ?>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($submenu['id']); ?>">

            <label for="category_id">Category ID:</label>
            <input type="number" id="category_id" name="category_id" value="<?php echo htmlspecialchars($submenu['category_id']); ?>" required><br><br>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($submenu['name']); ?>" required><br><br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo htmlspecialchars($submenu['price']); ?>" required><br><br>

            <button type="submit">Update</button>
        </form>
    <?php else: ?>
        <p>Submenu item not found.</p>
    <?php endif; ?>
</body>
</html>
