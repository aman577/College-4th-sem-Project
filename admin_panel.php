<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'project');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch appointments
$sqlAppointments = "SELECT id, name, email, phone, service, date, time, status FROM appointments ORDER BY date, time";
$resultAppointments = $conn->query($sqlAppointments);

// Fetch memberships
$sqlMemberships = "SELECT id, name, email, phone, plan, registration_date FROM memberships ORDER BY registration_date DESC";
$resultMemberships = $conn->query($sqlMemberships);

// Fetch messages
$sqlMessages = "SELECT id, name, email, message FROM messages ORDER BY id DESC";
$resultMessages = $conn->query($sqlMessages);

// Fetch comments (new addition)
$sqlComments = "SELECT id, user_email, comment, created_at FROM comments ORDER BY created_at DESC";
$resultComments = $conn->query($sqlComments);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Management</title>
    <link rel="stylesheet" href="services.css">
    <style>
        /* General styles for body and sidebar */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            transition: margin-left 0.3s;
        }

        /* Sidebar styling */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #4CAF50;
            color: white;
            padding-top: 20px;
            transition: 0.3s;
        }

        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 1.2em;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #45a049;
        }

        /* Hamburger icon */
        .hamburger {
            display: block;
            position: fixed;
            border: 2px solid green;
            border-radius: 5px;
            padding-left: 10px;
            padding-right: 10px;
            top: 8px;
            left: 20px;
            font-size: 30px;
            cursor: pointer;
            z-index: 1;
            color: rgb(86, 90, 86);
        }

        /* Sidebar open */
        .sidebar.open {
            left: 0;
        }

        /* Page content */
        .content {
            margin-left: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f9;
            color: #666;
            border-top: 1px solid #ddd;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #4CAF50;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        button {
            padding: 8px 15px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #d32f2f;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background-color: #f4f4f9;
            color: #666;
            border-top: 1px solid #ddd;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {

            /* Sidebar */
            .sidebar {
                width: 200px;
            }

            .sidebar.open {
                left: 0;
            }

            .hamburger {
                display: block;
                position: absolute;
                top: 8px;
                left: 20px;
                font-size: 25px;
                color: white;
            }

            /* Content area */
            .content {
                margin-left: 0;
                padding: 20px;
            }

            /* Tables */
            table th,
            table td {
                padding: 8px;
                font-size: 0.9em;
            }

            /* Make header and footer font smaller on mobile */
            header,
            footer {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 480px) {

            .sidebar {
                width: 100%;
                left: -100%;
            }

            .sidebar.open {
                left: 0;
            }

            .content {
                margin-left: 0;
            }

            .container {
                padding: 15px;
            }

            table th,
            table td {
                padding: 6px;
                font-size: 0.85em;
            }

            button {
                padding: 10px 18px;
            }
        }

        @media screen and (max-width: 320px) {

            .sidebar a {
                font-size: 0.9em;
                padding: 12px 18px;
            }

            table th,
            table td {
                font-size: 0.8em;
                padding: 6px;
            }
        }
    </style>
</head>

<body>

    <!-- Hamburger Menu Icon -->
    <span class="hamburger" onclick="toggleSidebar()">&#9776;</span>

    <!-- Sidebar Navigation -->
    <div id="sidebar" class="sidebar">
        <br><br>
        <a href="javascript:void(0);" onclick="showSection('appointments')">Manage Appointments</a>
        <a href="javascript:void(0);" onclick="showSection('memberships')">Manage Memberships</a>
        <a href="javascript:void(0);" onclick="showSection('messages')">Manage Messages</a>
        <a href="javascript:void(0);" onclick="showSection('comments')">Manage Comments</a>
        <a href="javascript:void(0);" onclick="showSection('Menu_Page')">Manage Menu Page</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <header>
            Admin Panel - Management
        </header>

        <!-- Manage Appointments Section -->
        <div id="appointments" class="container section">
            <h2>Manage Appointments</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultAppointments && $resultAppointments->num_rows > 0): ?>
                        <?php while ($row = $resultAppointments->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td><?php echo htmlspecialchars($row['service']); ?></td>
                                <td><?php echo htmlspecialchars($row['date']); ?></td>
                                <td><?php echo htmlspecialchars($row['time']); ?></td>
                                <td>
                                    <form action="delete_appointment.php" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <button type="submit">Delete</button>
                                    </form>
                                    <form action="verify_appointment.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <input type="hidden" name="action" value="verified">
                                        <button type="submit" class="status-btn verify-btn">Verify</button>
                                    </form>
                                </td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9">No appointments found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div id="Menu_Page" class="container section" style="display: none;">
    <h2>Manage Menu</h2>

    <!-- Add Menu Item Form -->
    <form action="add_menu_item.php" method="POST" enctype="multipart/form-data" style="margin-bottom: 30px;">
        <h3>Add New Menu Item</h3>
        <input type="text" name="name" placeholder="Menu Item Name" required>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Add Menu Item</button>
    </form>

    <!-- Menu Items Table -->
    <h3>Menu Items</h3>
    <table>
        <thead>
            <tr>
                <th>Menu Item</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqlMenu = "SELECT * FROM menu_items";
            $resultMenu = $conn->query($sqlMenu);

            if ($resultMenu->num_rows > 0) {
                while ($row = $resultMenu->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='Menu Image' style='width: 100px;'></td>";
                    echo "<td>
                        <a href='edit_menu_item.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete_menu_item.php?id=" . $row['id'] . "' onclick='return confirmDelete();'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No menu items found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <hr>

    <!-- Add Submenu Item Form -->
    <form action="add_submenu_item.php" method="POST" style="margin-bottom: 30px;">
        <h3>Add New Submenu Item</h3>
        <select name="category_id" required>
            <option value="" disabled selected>Select a Menu Item</option>
            <?php
            $sqlMenuCategories = "SELECT id, name FROM menu_items";
            $resultMenuCategories = $conn->query($sqlMenuCategories);
            if ($resultMenuCategories->num_rows > 0) {
                while ($category = $resultMenuCategories->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($category['id']) . "'>" . htmlspecialchars($category['name']) . "</option>";
                }
            }
            ?>
        </select>
        <input type="text" name="name" placeholder="Submenu Item Name" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <button type="submit">Add Submenu Item</button>
    </form>

    <!-- Submenu Items Table -->
    <h3>Submenu Items</h3>
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Submenu Item</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqlSubmenuItems = "SELECT submenu_items.*, menu_items.name AS category_name 
                                FROM submenu_items
                                JOIN menu_items ON submenu_items.category_id = menu_items.id";
            $resultSubmenuItems = $conn->query($sqlSubmenuItems);

            if ($resultSubmenuItems->num_rows > 0) {
                while ($submenu = $resultSubmenuItems->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($submenu['category_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($submenu['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($submenu['price']) . "</td>";
                    echo "<td>
                        <a href='edit_submenu_item.php?id=" . $submenu['id'] . "'>Edit</a> | 
                        <a href='delete_submenu_item.php?id=" . $submenu['id'] . "' onclick='return confirmDelete();'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No submenu items found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
   

        <!-- Manage Memberships Section -->
        <div id="memberships" class="container section" style="display: none;">
            <h2>Manage Memberships</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Plan</th>
                        <th>Registration Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultMemberships && $resultMemberships->num_rows > 0): ?>
                        <?php while ($row = $resultMemberships->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td><?php echo htmlspecialchars($row['plan']); ?></td>
                                <td><?php echo htmlspecialchars($row['registration_date']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No memberships found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Manage Messages Section -->
        <div id="messages" class="container section" style="display: none;">
            <h2>Manage Messages</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultMessages && $resultMessages->num_rows > 0): ?>
                        <?php while ($row = $resultMessages->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['message']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No messages found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Manage Comments Section -->
        <div id="comments" class="container section" style="display: none;">
            <h2>Manage Comments</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Email</th>
                        <th>Comment</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultComments && $resultComments->num_rows > 0): ?>
                        <?php while ($row = $resultComments->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                                <td><?php echo htmlspecialchars($row['comment']); ?></td>
                                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No comments found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <p>Admin Panel - Management</p>
    </footer>

    <script>
        // Sidebar toggle function
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }

        // Show section by ID
        function showSection(section) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(function(sec) {
                sec.style.display = 'none';
            });

            const selectedSection = document.getElementById(section);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }
        }

        // Confirm delete action
        function confirmDelete() {
            return confirm("Are you sure you want to delete this?");
        }

        // Initially, show the appointments section
        document.addEventListener('DOMContentLoaded', function() {
            showSection('appointments');
        });
    </script>

</body>

</html>

<?php
$conn->close();
?>