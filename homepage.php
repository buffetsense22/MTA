<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Thai Parts & Accessories</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <img src="Master Thai Parts logo.jpg" alt="logo" class="logo-img">
            </div>
            <div class="logo-container">
                <h2 class="logo">Master Thai Parts & Accessories</h2>
                <div class="logoh3">
                    <h3 class="logoh3">Blk,17 Old Site Baseco Port Area Manila</h3>
                </div>
                <div id="form">
                    <h1>Welcome to Masterthaiparts & Accessories</h1>
                    <form name="form" action="login.php" method="POST" onsubmit="return validateForm()">
                        <label for="user">Username:</label>
                        <input type="text" id="user" name="user" value="<?php echo isset($_GET['user']) ? htmlspecialchars($_GET['user']) : ''; ?>" required><br><br>
                        <label for="pass">Password:</label>
                        <input type="password" id="pass" name="pass" value="<?php echo isset($_GET['pass']) ? htmlspecialchars($_GET['pass']) : ''; ?>" required><br><br>
                        <input type="submit" id="btn" value="Login" name="submit">
                        <?php
                        if (isset($_GET['login-failed'])) {
                            $reason = $_GET['login-failed'];
                            if ($reason === "password") {
                                echo '<p id="errorMessage" style="color: red; display: block;">Incorrect password.</p>';
                            } elseif ($reason === "username") {
                                echo '<p id="errorMessage" style="color: red; display: block;">Username not found.</p>';
                            } elseif ($reason === "both") {
                                echo '<p id="errorMessage" style="color: red; display: block;">Both username and password are incorrect.</p>';
                            }
                        } else {
                            echo '<p id="errorMessage" style="display: none;"></p>'; // Hidden by default
                        }
                        ?>
                    </form>
                </div>
                <div>
                    <div class="datetime" id="datetime"></div>
                    <script>
                        // Function to update date and time
                        function updateDateTime() {
                            var dateTimeElement = document.getElementById("datetime");
                            var now = new Date();
                            var dateTimeString = now.toLocaleString(); // Format date and time
                            dateTimeElement.textContent = dateTimeString; // Update content of the div
                        }

                        // Call the function initially
                        updateDateTime();

                        // Update date and time every second
                        setInterval(updateDateTime, 1000);

                        // Form validation function
                        function validateForm() {
                            var username = document.getElementById("user").value;
                            var password = document.getElementById("pass").value;

                            if (username === "" || password === "") {
                                document.getElementById("errorMessage").style.display = "block";
                                document.getElementById("errorMessage").textContent = "Both fields are required.";
                                return false;
                            }
                            return true;
                        }

                        // Check if login failed and display error message
                        const urlParams = new URLSearchParams(window.location.search);
                        const loginFailed = urlParams.get('login-failed');
                        if (loginFailed) {
                            document.getElementById("errorMessage").style.display = "block";
                            if (loginFailed === "both") {
                                document.getElementById("user").value = "";
                                document.getElementById("pass").value = "";
                            } else if (loginFailed === "username") {
                                document.getElementById("user").value = "";
                            } else if (loginFailed === "password") {
                                document.getElementById("pass").value = "";
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
