<?php 
include ('includes/session.php');
$page_title = 'Sign In';
$errors = "";

if (isset($_POST['submitted'])) {

    require_once ('login_functions.inc.php');
    require_once ('mysqli_connect.php');
    list ($check, $data) = check_login($dbc, $_POST['Email'], $_POST['Password']);

    if ($check) { // OK!
            session_save_path('');
            // Set the session data:.
            $_SESSION['UserID'] = $data['UserID'];
            $_SESSION['FirstName'] = $data['FirstName'];
            $_SESSION['LastName'] = $data['LastName'];
            $_SESSION['RoleID'] = $data['RoleID'];
            $_SESSION['UserName'] = $data['UserName'];

            // Store the HTTP_USER_AGENT:
            $_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

            // Redirect:
            $url = absolute_url ('index.php');
            header("Location: $url");
            exit();

    } else { // Unsuccessful!
		$errors = $data;
    }

    mysqli_close($dbc);	    
} // End of the main submit conditional.

include ('includes/header.php');

// Print any error messages, if they exist:
if (!empty($errors)) {
	echo '<div class="alert alert-danger">
				<strong>Error signing in.</strong><br />
	The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
		}
	echo '</p><p>Please try again.</p></div>';
}     
?>
<form class="form-signin" role="form" action="login.php" method="post">
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="normal" class="form-control" placeholder="Email address" required autofocus name="Email" value="<?php if (isset($_POST['Email'])) echo $_POST['Email']; ?>">
    <input type="password" class="form-control" placeholder="Password" required name="Password">
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-sm btn-primary" type="submit" name="submit">Sign in</button>
    <input type="hidden" name="submitted" value="TRUE" />
</form>

<?php
include ('includes/footer.html');
?>