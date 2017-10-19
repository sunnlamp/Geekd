<?php # Script 8.5 - register.php #2
include ('includes/session.php');

$page_title = 'Register';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

    $errors = array(); // Initialize an error array.

    // Check for a user name:
    if (empty($_POST['UserName'])) {
            $errors[] = 'You forgot to enter your user name.';
    } else {
            $un = mysqli_real_escape_string($dbc, trim($_POST['UserName']));
    }
    
	// Check for a first name:
    if (empty($_POST['FirstName'])) {
            $errors[] = 'You forgot to enter your first name.';
    } else {
            $fn = mysqli_real_escape_string($dbc, trim($_POST['FirstName']));
    }

    // Check for a last name:
    if (empty($_POST['LastName'])) {
            $errors[] = 'You forgot to enter your last name.';
    } else {
            $ln = mysqli_real_escape_string($dbc, trim($_POST['LastName']));
    }
    
        // Check for a user name:
    if (empty($_POST['UserName'])) {
            $errors[] = 'You forgot to enter your user name.';
    } else {
            $un = mysqli_real_escape_string($dbc, trim($_POST['UserName']));
    }

    // Check for an email address:
    if (empty($_POST['Email'])) {
            $errors[] = 'You forgot to enter your email address.';
    } else {
            $e = mysqli_real_escape_string($dbc, trim($_POST['Email']));
    }

    // Check for a password and match against the confirmed password:
    if (!empty($_POST['pass1'])) {
            if ($_POST['pass1'] != $_POST['pass2']) {
                    $errors[] = 'Your password did not match the confirmed password.';
            } else {
                    $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
            }
    } else {
            $errors[] = 'You forgot to enter your password.';
    }

    if (empty($errors)) { // If everything's OK.
        $t = ($_POST['RoleID']);
        
        // Register the user in the database...

        // Make the query:
        $q = "INSERT INTO User (RoleID, FirstName, LastName, UserName, Email, Password, DateReg) VALUES (2, '$fn', '$ln', '$un', '$e', '$p', NOW() )";
    	//$q = "INSERT INTO User (RoleID, FirstName, LastName, UserName, Email, Password, DateReg) VALUES (2, '$fn', '$ln', '$un', '$e', SHA1('$p'), NOW() )";		
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

                // Print a message:
                echo '<h1>Thank you!</h1>
        <p>You are now registered!</p><p><br /></p>';	

        } else { // If it did not run OK.

                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.

        mysqli_close($dbc); // Close the database connection.

        // Include the footer and quit the script:
        include ('includes/footer.html'); 
        exit();

    } else { // Report the errors.

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Print each error.
                    echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';

    } // End of if (empty($errors)) IF.
	
} 

$types = array();

// Make the query:
//$q = "SELECT RoleID, RoleName FROM UserRole ORDER BY RoleName ASC";		

//$result = mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($result);

if ($num > 0) { // If it ran OK, display the records.
       
    while ($row = mysqli_fetch_assoc($result)) {
        $types[] = $row;
    }

    mysqli_free_result ($result); // Free up the resources.	
}

mysqli_close($dbc); // Close the database connection.
?>
<div class="page-header">
    <h1>Register</h1>
</div>
<form class="form-signin" role="form" action="register.php" method="post">
    

    <p>First Name: <input type="normal" class="form-control" placeholder="Your first name" required autofocus name="FirstName" maxlength="40" value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>" /></p>
    <p>Last Name: <input type="normal" class="form-control" placeholder="Your last name" required name="LastName" maxlength="40" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>" /></p>
    <p>User Name: <input type="normal" class="form-control" placeholder="User Name" required name="UserName" maxlength="50" value="<?php if (isset($_POST['UserName'])) echo $_POST['UserName']; ?>"  /> </p>
    <p>Email Address: <input type="normal" class="form-control" placeholder="Email address" required name="Email" maxlength="80" value="<?php if (isset($_POST['Email'])) echo $_POST['Email']; ?>"  /> </p>
    <p>Password: <input type="password" class="form-control" placeholder="Password" required name="pass1" maxlength="20" /></p>
    <p>Confirm Password: <input type="password" class="form-control" placeholder="Password" required name="pass2" maxlength="20" /></p>
    <p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Register</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
    
    
</form>
<?php
include ('includes/footer.html');
?>
