<?php
include ('includes/session.php');
// Use the $_GET to the the value of game.
$game = $_GET['game'];
$page_title = $game;
include ('./includes/header.php');
?>

<div>
	<?php
		require_once('mysqli_connect.php');
		// When setting the query variable use WHERE to find the appropriate row.
		//$query = "SELECT * FROM GameCatalogue WHERE GameName='$game'";
		$query = "SELECT * FROM GameCatalogue 
		LEFT JOIN CatalogueObject 
		ON CatalogueObject.CatalogueID =GameCatalogue.GameID 
		WHERE GameName='$game'";
		$q = @\mysqli_query($dbc, $query);
		// Load the entries from the row into an array and then place
		// those values into variables that can be used.
		while($row = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
			$catalogueID = $row['CatalogueID'];
			$gameName = $row['GameName'];
			$publisher = $row['Publisher'];
			$developer = $row['Developer'];
			$genre = $row['Genre'];
			$platform = $row['Platform'];
			$yearReleased = $row['YearReleased'];
			$rating = $row['Rating'];
			$image = $row['Image'];
			$review = $row['Review'];
			$link = $row['Link'];
		
		
		echo'<div id="mycarousel" class="carousel slide" data-ride="carousel">';
			echo'<div class="carousel-inner">';
				echo'<div class="item active">';
					echo"<img class='img-responsive' src=\"images/" . $image . "\">";
					echo"<h2 class='carousel-caption text-danger'>" . $gameName;
					echo'</h2>';
				echo'</div>';	
			echo'</div>';
		echo'</div>';
		
		echo'<form>';
			echo'<div class="form-group"';
				echo'<label for="Publisher" ><b>Publisher: </b> ' . $publisher . '</label>';
			echo'</div>';
			echo'<div class="form-group"';
				echo'<label for="Developer" ><b>Developer: </b>' . $developer . '</label>';
			echo'</div>';
			echo'<div class="form-group"';
				echo'<label for="Genre" ><b>Genre: </b>' . $genre . '</label>';
			echo'</div>';
			echo'<div class="form-group"';
				echo'<label for="Platform" ><b>Platform: </b>' . $platform . '</label>';
			echo'</div>';
			echo'<div class="form-group"';
				echo'<label for="YearReleased" ><b>Year Released: </b>' . $yearReleased . '</label>';
			echo'</div>';
			echo'<div class="form-group"';
				echo'<label for="Rating" ><b>ESRB Rating: </b>' . $rating . '</label>';
			echo'</div>';
			echo'<div class="form-group"';
				echo'<label for="Walkthrough" ><b>Walkthrough: <br /></b>' . $link . '</label>';
			echo'</div>';
			echo'<div class="form-group"';
				echo'<label for="Rating" ><b>User Submitted Review: </b>' . $review . '</label>';
			echo'</div>';
			echo'<div class="form-group"';
			
						echo'<div>';
						echo'<label for="Review">Submit your own review:  </label>';
						echo'<textarea class="form-control" row="10" placeholder="Enter your review here!">
						</textarea>';
						echo'<button type="submit" class="btn btn-primary">Sumbit Review</button>';
						echo'</div>';
			/* How to update the reviews?
			        $q = "UPDATE CatologueItem SET Review = ('$f') WHERE CatalogueObject = $CatalogueID;
					$s = @mysqli_query ($dbc, $q); // Run the query.
			
			    if (empty($_POST['Review'])) {
            $errors[] = 'You forgot to enter your review!.';
    } else {
            $f = mysqli_real_escape_string($dbc, trim($_POST['Review']));
    }
			*/
			
				if(empty($review))
				{
					echo'<div class="well"><h3>There is no review yet.</h3></div>';
					if(!isset($_SESSION['UserID'])) //should this line be switched, logically, with the line checking review?
					{
						echo'<h3>Log in to post a review!</h3>';
					} 
					else 
					{
					
						if($is_admin)
						{
							
						}
						
					}
						

					
				}
				
						/*
						echo'<div>';
						echo'<label for="Review">Submit your own review:  </label>';
						echo'<textarea class="form-control" row="10" placeholder="Enter your review here!">
						</textarea>';
						echo'<button type="submit" class="btn btn-primary">Sumbit Review</button>';
						echo'</div>';
						*/
						
			echo'</div>';
			
		echo'</form>';
		

		
		
		}
		mysqli_close($dbc);
	?>
	
</div>

<?php
include ('./includes/footer.html');
?>