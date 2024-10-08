<?php
// Include the database configuration file
require_once 'config.php';

// Fetch reservations from the database
$sql = "SELECT * FROM inventory";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
    	<link rel="stylesheet" href="css/navigation_styles.css">
        <link rel="stylesheet" href="css/inventory.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<title>Inventory Zaza beach club</title>
    </head>

    <body>
        <!-- Navbar with sidebar and navigation -->
    <div class="navbar">
        <input type="checkbox" class="checkbox" id="click" hidden>
        
        <!-- Sidebar with menu icon and social links -->
        <div class="sidebar">
            <label for="click">
                <div class="menu-icon">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </div>
            </label>

            <ul class="social-icons-list">
                <li>
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#" class="social-link"><i class="fab fa-google-plus-g"></i></a>
                </li>
                <li>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>

            <div class="year">
                <p>2024</p>
            </div>
        </div>

        <!-- Navigation with search and menu items -->
        <nav class="navigation">
            <div class="navigation-header">
                <h1 class="navigation-heading">Welcome to ZAZA Beach Club</h1>

                <form class="navigation-search">
                    <input type="text" class="navigation-search-input" placeholder="Search...">
                    <button class="navigation-search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <ul class="navigation-list">
                <li class="navigation-item">
                    <a href="index.html" class="navigation-link">home</a>
                </li>
                <li class="navigation-item">
                    <a href="about.html" class="navigation-link">about us</a>
                </li>
                <li class="navigation-item">
                    <a href="#" class="navigation-link">menu</a>
                </li>
                <li class="navigation-item">
                    <a href="Reservations.html" class="navigation-link">Reservations</a>
                </li>
                <li class="navigation-item">
                    <a href="#" class="navigation-link">customers</a>
                </li>
                <li class="navigation-item">
                    <a href="#" class="navigation-link">contact</a>
                </li>
            </ul>

            <div class="copyright">
                <p>&copy; 2023. Nature Resuscitate Salon. All Rights Reserved</p>
            </div>
        </nav>

        <div class="overlay"></div>
    </div>
    <!-- End of navbar -->

    <!--  Inventory Management Section -->
    <section class="inventory-management">
        <h2>Inventory Management</h2>
        
        <!--  Inventory Table -->
        <table id="inventoryTable">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Current Stock</th>
                    <th>Reorder Level</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table body will be populated by JavaScript -->
            </tbody>
        </table>

        <!--  Add New Item Form -->
        <h3>Add New Item</h3>
        <form id="addItemForm"action="add_item.php" method="post">
            <input type="text" id="itemName" placeholder="Item Name" required>
            <input type="number" id="currentStock" placeholder="Current Stock" required>
            <input type="number" id="reorderLevel" placeholder="Reorder Level" required>
            <button type="submit">Add Item</button>
        </form>
    </section>

    <!-- JavaScript for Inventory Management -->
    <script>
        // Sample inventory data
        let inventory = [
            { item: "Cocktail Mix", currentStock: 50, reorderLevel: 20 },
            { item: "Wine", currentStock: 30, reorderLevel: 15 },
            { item: "Meat Balls", currentStock: 10, reorderLevel: 5 },
            { item: "Flour", currentStock: 10, reorderLevel: 5 },
            { item: "Sugar", currentStock: 10, reorderLevel: 5 },
            { item: "Salt", currentStock: 10, reorderLevel: 5 },
            { item: "Pepper", currentStock: 10, reorderLevel: 5 },
            { item: "Onions", currentStock: 10, reorderLevel: 5 },
            { item: "Garlic", currentStock: 10, reorderLevel: 5 },
            { item: "Tomatoes", currentStock: 10, reorderLevel: 5 },
            { item: "Cheese", currentStock: 10, reorderLevel: 5 },
            { item: "Butter", currentStock: 10, reorderLevel: 5 },
            { item: "Milk", currentStock: 10, reorderLevel: 5 }
        ];

        //  Function to update inventory table
        function updateInventoryTable() {
            const tableBody = document.querySelector("#inventoryTable tbody");
            tableBody.innerHTML = "";

            inventory.forEach(item => {
                const row = document.createElement("tr");
                const status = item.currentStock <= item.reorderLevel ? "Reorder" : "OK";
                const statusClass = status === "Reorder" ? "reorder-alert" : "";

                row.innerHTML = `
                    <td>${item.item}</td>
                    <td>${item.currentStock}</td>
                    <td>${item.reorderLevel}</td>
                    <td class="${statusClass}">${status}</td>
                `;

                tableBody.appendChild(row);
            });
        }

        //  Function to add new item
        document.getElementById("addItemForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const newItem = {
                item: document.getElementById("itemName").value,
                currentStock: parseInt(document.getElementById("currentStock").value),
                reorderLevel: parseInt(document.getElementById("reorderLevel").value)
            };
            inventory.push(newItem);
            updateInventoryTable();
            this.reset();
        });

        //  Initial table update
        updateInventoryTable();
    </script>

    </body>
    </html>
    <?php
// Close connection
mysqli_close($conn);
?>