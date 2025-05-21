<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Category - Master Thai Parts & Accessories</title>
    <link rel="stylesheet" href="category.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <img src="Master Thai Parts logo.jpg" alt="logo" class="logo-img">
            </div>
            <div class="logo-container">
                <h2 class="logo">Master Thai Parts & Accessories</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="dashboard.php"><ion-icon name="home-outline"></ion-icon>Home</a></li>
                    <li><a href="profile.php"><ion-icon name="person-outline"></ion-icon>Profile</a></li>
                    <li><a href="category.php"><ion-icon name="grid-outline"></ion-icon>Category</a></li>
                    <li><a href="report.php"><ion-icon name="document-text-outline"></ion-icon>Report</a></li>
                    <li><a href="logout.php"><ion-icon name="log-out-outline"></ion-icon>Logout</a></li>
                    
                </ul>
            </div>
            <div class="date-time">
                <span id="datetime"></span>
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li><a href="dashboard.php"><ion-icon name="home-outline"></ion-icon>Home</a></li>
                    <li><a href="profile.php"><ion-icon name="person-outline"></ion-icon>Profile</a></li>
                    <li><a href="category.php"><ion-icon name="grid-outline"></ion-icon>Category</a></li>
                    <li><a href="report.php"><ion-icon name="document-text-outline"></ion-icon>Report</a></li>
                    <li><a href="logout.php"><ion-icon name="log-out-outline"></ion-icon>Logout</a></li>
                
            </ul>
            </div>
                <div class="page-content">
            <h1>Stocks</h1>
            <p>Items:</p>
            
            <div class="category-buttons">
                <button class="cn"><a href="brakeparts.php">Braking System Parts</a></button>
                <button class="cn"><a href="engineparts.php">Engine Parts</a></button>
                <button class="cn"><a href="exhaustsystem.php">Exhaust Parts</a></button>
                <button class="cn"><a href="fuels.php">Fuel Parts</a></button>
                <button class="cn"><a href="suspension.php">Suspension Parts</a></button>
                <button class="cn"><a href="transmissionandclutch.php">Transmission and Clutch Parts</a></button>
            </div>

           

            <a href="dashboard.php">Back to Home</a>
        </div>
    </div>
    <script>
        function updateDateTime() {
            const now = new Date();
            const dateTimeStr = now.toLocaleString();
            document.getElementById('datetime').textContent = dateTimeStr;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
</body>
</html>
