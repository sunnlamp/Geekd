<?php
include ('includes/session.php');

$page_title = "Geekd Reviews";
include ('./includes/header.php');
?>
<div>
	<?php
		include_once(mysqli_connect.php);
		$displayIntro = mysqli_query($dbc,"SELECT * FROM GameCatalogue");
		$displayTitle = mysqli_fetch_row($displayIntro);

		echo "<div>";
		echo "<h1>" . $displayTitle['GameName'] . "</h1>";
		echo "<p>" . $displayTitle['GameID'] . "</p>";
		echo "</div>";
	?>
</div>
<?php
include ('includes/footer.html');
?>