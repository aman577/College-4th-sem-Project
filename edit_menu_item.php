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
$item = null;
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Sanitize ID
    $result = $conn->query("SELECT * FROM menu_items WHERE id = $id");
    
    if ($result && $result->num_rows > 0) {
        $item = $result->fetch_assoc();
    } else {
        die("Item not found");
    }
} else {
    die("No ID provided.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int)$_POST['id'];
    $name = htmlspecialchars(trim($_POST['name']));
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
        header("Location: admin_panel.php");
        exit;
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        .container {
            width: 50%;
            margin: 20px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .message {
            color: green;
            font-size: 16px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <header>
        Admin Panel
    </header>

    <div class="container">
        <h1>Edit Menu </h1>

        <?php if (isset($message)) { echo "<p class='message'>$message</p>"; } ?>
        <form method="POST" enctype="multipart/form-data" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>

            <label for="image">Image (Optional):</label>
            <input type="file" name="image" id="image" accept="image/*">

            <button type="submit">Update Menu Item</button>
        </form>
    </div>

</body>

</html>
