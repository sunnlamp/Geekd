<?php # Script 3.4 - index.php
include ('includes/session.php');

$page_title = 'Geekd!';
include ('./includes/header.php');
?>
<div class="page-header">
    <h1 class="text-primary">Welcome to Geekd!</h1>
  </div>
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="@carousel-example-generic" data-slide-to="1"></li>
      <li data-target="@carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="item active">
        <img src="images/Bloodbourne.jpeg">
        <div class="carousel-caption">
          <h3 class="pull-left">Bloodbourne</h3>
        </div>
      </div>
      <div class="item">
        <img src="images/SunsetOverdrive.jpg">
        <div class="carousel-caption">
          <h3 class="pull-left">Sunset Overdrive secret locations</h3>
        </div>
      </div>
      <div class="item">
        <img src="images/Fallout4.png">
        <div class="carousel-caption">
          <h3 class="pull-left">Fallout 4 crafting guide</h3>
        </div>
      </div>
    </div>

    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
  </br>
      Here at Geekd, you can find community-sourced walkthroughs and reviews for the newest games. Check back often to see what's new!<br />
    It's free and easy to become a member and contribute! It's not required, though we would love to have you join our community!
    <h2>More new games added every week! Some features under construction!<h2>
  <br />
  <a href= "README.txt">README FILE</a>
  </br>
  <a href= "GeekdPresentation.pptx">Presentation File</a>
  <div>
  <?php
		
		require_once ('mysqli_connect.php');
		$user = $_SESSION['UserName'];
		$images_dir = "/images/";
		$query = @\mysqli_query($dbc, "SELECT * FROM GameCatalogue");
		echo'<h2>Check out these games on Geekd!</h2>';
		while($row = mysqli_fetch_array($query)) {
			// The href here passes essentially allows us to send
			// a variable to the next page as long as there is a session.
			// ?game= will pick up the value inside of $row['GameName']
			// and we can grab it on the next page and use it to find a
			// specific row in the database. It links to gamepage which should
			// be empty otherwise.
			echo"<a href='gamepage.php?game=" . $row['GameName'] . "'>";
				echo"<div value='" . $row['CatalogueID'] . "'>" . 
				"<h3>" . $row['GameName'] . "</h3>";
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