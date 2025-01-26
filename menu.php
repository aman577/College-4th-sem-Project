<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all menu items
$sqlMenu = "SELECT * FROM menu_items";
$resultMenu = $conn->query($sqlMenu);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Parlour Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&family=Dancing+Script&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Jost', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f5f2;
            color: #333;
        }

        header {
            background-color: #4c3a51;
            padding: 20px;
            text-align: center;
            color: white;
        }

        header h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 3rem;
            margin: 0;
            padding-top: 20px;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            list-style: none;
            background-color: #4c3a51;
            padding: 20px;
            margin: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #6d4c71;
        }

        .services-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .service img {
    width: 100%; /* Smaller width */
    height: 200px; /* Smaller height */
    object-fit: cover; /* Maintain proportions */
    border-radius: 10px;
    margin: 0 auto 15px auto; /* Center the image */
    display: block;
    transition: transform 0.3s ease; /* Add transition for smooth scaling */
}

        .service:hover img {
    transform: scale(1.05); /* Scale only the hovered image */
    transition: transform 0.3s ease; /* Smooth scaling effect */
}

        .service h2 {
            font-size: 1.5rem;
            color: #4c3a51;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .service:hover h2 {
            color: #6d4c71;
        }

        .submenu {
            display: none;
            list-style: none;
            padding: 0;
            text-align: left;
            margin-top: 10px;
        }

        .service:hover .submenu {
            display: block;
        }

        .submenu li {
            padding: 5px 0;
            cursor: pointer;
            color: #555;
            transition: color 0.3s ease;
        }

        .submenu li:hover {
            color: #4c3a51;
        }

        #price-tooltip {
            position: absolute;
            background-color: #4c3a51;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: none;
            font-size: 0.9rem;
            z-index: 100;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        footer {
            background-color: #4c3a51;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 50px;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <li><a href="hellomain.htm">HOME</a></li>
            <li><a href="#active">MENU</a></li>
            <li><a href="Services.htm">OUR SERVICES</a></li>
            <li><a href="about.htm">ABOUT US</a></li>
            <li><a href="contact.htm">CONTACT US</a></li>
        </nav>
        <hr style="margin-top: 18px;">
        <h1>OUR MENU</h1>
    </header>

    <main>
        <div class="services-menu">
            <?php
            if ($resultMenu->num_rows > 0) {
                while ($row = $resultMenu->fetch_assoc()) {
                    echo "<div class='service'>";
                    $imagePath = 'uploads/' . basename($row['image']);
                    if (!empty($row['image']) && file_exists($imagePath)) {
                        echo "<img src='$imagePath' alt='" . htmlspecialchars($row['name']) . "'>";
                    } else {
                        echo "<p>Image not found</p>";
                    }
                    echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                    echo "<ul class='submenu'>";
                    $categoryId = $row['id'];
                    $sqlSubMenu = "SELECT * FROM submenu_items WHERE category_id = $categoryId";
                    $resultSubMenu = $conn->query($sqlSubMenu);

                    if ($resultSubMenu && $resultSubMenu->num_rows > 0) {
                        while ($subItem = $resultSubMenu->fetch_assoc()) {
                            echo "<li onmouseover=\"showPrice('" . htmlspecialchars($subItem['name']) . "', '" . htmlspecialchars($subItem['price']) . "')\" onmouseout=\"hidePrice()\">" . htmlspecialchars($subItem['name']) . "</li>";
                        }
                    } else {
                        echo "<li>No submenu items available</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                }
            } else {
                echo "<p>No menu items found.</p>";
            }
            ?>
        </div>
        <div id="price-tooltip"></div>
    </main>

    <footer>
        <p>&copy; XYZ's. All Rights Reserved</p>
    </footer>

    <script>
        function showPrice(service, price) {
            const tooltip = document.getElementById('price-tooltip');
            tooltip.innerHTML = `<strong>${service}:</strong> ${price}`;
            tooltip.style.display = 'block';
            tooltip.style.opacity = '1';
            document.addEventListener('mousemove', moveTooltip);
        }

        function hidePrice() {
            const tooltip = document.getElementById('price-tooltip');
            tooltip.style.opacity = '0';
            setTimeout(() => {
                tooltip.style.display = 'none';
                document.removeEventListener('mousemove', moveTooltip);
            }, 300);
        }

        function moveTooltip(event) {
            const tooltip = document.getElementById('price-tooltip');
            tooltip.style.left = event.pageX + 15 + 'px';
            tooltip.style.top = event.pageY + 15 + 'px';
        }
    </script>
</body>

</html>

<?php
$conn->close();
?>
