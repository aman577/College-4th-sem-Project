<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'project');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM menu_items WHERE id = $id");
    $item = $result->fetch_assoc();
    if (!$item) {
        die("Item not found");
    }
} else {
    die("No ID provided.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $target_file = '';

    // Check if a new image was uploaded
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate the new image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        } elseif ($_FILES["image"]["size"] > 5000000) {
            die("File is too large. Maximum size is 5MB.");
        } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            die("Only JPG, JPEG, PNG & GIF files are allowed.");
        }

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            die("Failed to upload the image.");
        }
    }

    // Prepare and execute SQL query
    if ($target_file) {
        $stmt = $conn->prepare("UPDATE menu_items SET name = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $target_file, $id);
    } else {
        $stmt = $conn->prepare("UPDATE menu_items SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $name, $id);
    }

    if ($stmt->execute()) {
        echo "Record updated successfully.";
        header("Location: admin_panel.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
</head>
<body>
    <h1>Edit Menu Item</h1>
    <form method="POST" enctype="multipart/form-data" action="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
        <label>Image:</label>
        <input type="file" name="image" accept="image/*">
        <button type="submit">Update</button>
    </form>
</body>
</html>
