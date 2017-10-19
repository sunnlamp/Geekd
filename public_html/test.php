<?php # Script 3.4 - index.php
include ('includes/session.php');

$page_title = 'Welcome to this Site!';
include ('./includes/header.php');
?>
<div class="page-header">
    <h1>This is your Web site</h1>
</div>
<div class="well">
	<p>On this page we will test new functionality.</p>
	<p>Each div should test a specific use case.</p>
</div>
<div class="well">
	<p>Feel free to add your own divs and copy and paste whatever useful bits are on this page.</p>
	<p>This is just testing out video embedding.</p>
	<iframe width="560" height="315" src="https://www.youtube.com/embed/R6QL1Nm2b5A" frameborder="0" allowfullscreen></iframe>
	<p>Game data should be TYPE "Review", "Walkthrough" or "Video"?</p>
	<p>Need a way to differentiate between the types?</p>
</div>

<div class="well">
<p>Test for submitting game's data, reviews, or walkthroughs.</p>
<p>Test should only show up when user is signed in.</p>
	<p>
	<?php 
			if (!isset($_SESSION['UserID'])) 
				{
				echo 'Log in to post a guide or review!';

				}
			else
			{
				if ($is_admin) 
				{
					echo 'Check this to auto-approve!';
					echo "</br>";
					echo 'This is a placeholder for mod approval checkbox!';
				}
				
				$sql = "SELECT GameName FROM GameCatalogue";
				$result = mysql_query($sql);
				echo "<select name = 'GameName'>";
				while ($row = mysql_fetch_array($result)) {
					echo "<option value='" .$row['GameName'] . "'>" . $row['GameName'] . "</option>";
				}
				echo "</select>";
				echo 'Dropdown menu of available games!';
				echo 'GOES HERE';
				echo 'Upload a text file!'; 
				echo 'GOES HERE';
				echo 'Submit button!';
				echo 'GOES HERE';
				    //<p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Register</button></p>
				   		
			}
	?>
	
	</p>
</div>
</div>
<div class="well">
	<p>Test for retrieving specific game's data, reviews, and walkthroughs.</p>
</div>
<div class="well">
<p>Test for retrieving all guides, reviews, and data for specific game goes here.</p>
<p>User role should not matter for this test.</p>
<p>Results should allow option below for administrator - combine tests later?</p>
</div>
<div class="well">
<p>Test for approving or deleting guides/walkthrough goes here.</p>
<p>Should only appear if signed in as administrator.</p>
<p>Should show all unapproved guides, and should allow deletion from database or approval to appear on regular search or catalog functions.</p>
</div>
<div class="well">
<p>Test for submitting a guide/review goes here.</p>
<p>Should allow automatic approval if admin.</p>
<p>Should take text file and apply userID to submitted database entry.</p>
</div>
<?php
include ('./includes/footer.html');
?>