<?php
include ('includes/session.php');

$page_title = "Geekd Reviews";
include ('./includes/header.php');
?>

<div class="page-header">
	<h2>Welcome to Geekd Reviews!</h2>
</div>
<div>
	<h3>Find Game by Title</h3>
	<?php
		
		echo "<select name= 'GameName'>";
		echo '<option value="">'.'--- Please Select a Game ---'.'</option>';
		require_once ('mysqli_connect.php');
		$query = mysqli_query($dbc, "SELECT GameName FROM GameCatalogue");
				
		while($row = mysqli_fetch_array($query)) {
			echo"<option value='gamepage.php?game='" . $row['GameName'] . ">" . $row['GameName']
			.'</option>';
		}
		echo '</select>';
	?>
	
	<h3>Or View Recent Titles</h3>
	
	<?php
		
		require_once ('mysqli_connect.php');
		$user = $_SESSION['UserName'];
		$images_dir = "/images/";
		$query = @\mysqli_query($dbc, "SELECT * FROM GameCatalogue");

		while($row = mysqli_fetch_array($query)) {
			// The href here passes essentially allows us to send
			// a variable to the next page as long as there is a session.
			// ?game= will pick up the value inside of $row['GameName']
			// and we can grab it on the next page and use it to find a
			// specific row in the database. It links to gamepage which should
			// be empty otherwise.
			echo"<a href='gamepage.php?game=" . $row['GameName'] . "'>";
				echo"<div value='" . $row['CatalogueID'] . "'>" . $row['GameName'];
					// The src will read the appropriate folder and the data stored in
					// Image is the file name.
					echo"<img class='img-responsive' src=\"images/" . $row['Image'] . "\">";
					echo"</img>";
				echo"</div>";
			echo"</br>";
		}
		
	?>

</div>

<?php
include ('./includes/footer.html');
?>