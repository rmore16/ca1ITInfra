<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php


// define variables and set to empty values
$servername = "localhost";
$username = "bundles_manager";
$password = "Pass1";
$dbname = "bundles_inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$servername = "localhost";
$username = "bundles_manager";
$password = "Pass1";
$dbname = "bundles_inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO bundles (PLAN_NAME, MINS, DATA)
        VALUES ('ASIA PLUS', '500', '80 GB');";
$sql .= "INSERT INTO bundles  (PLAN_NAME, MINS, DATA)
        VALUES ('EUROPE PLUS', '800', '80 GB');";
$sql .= "INSERT INTO bundles  (PLAN_NAME, MINS, DATA)
        VALUES ('UAE PLUS', '900', '60 GB')";

if ($conn->multi_query($sql) === TRUE) {
          } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
		  }
	$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bundles";
$var = mysqli_query($conn, $sql);
$count = 1;

if (mysqli_num_rows($var) > 0) {
    while ($count <= 3) {
		$arr = mysqli_fetch_row($var);
        echo "<div class='card bg-dark' style='max-width: 100rem;'>
        <img src='I$count.jpeg' class='card-img'>
        <div class='card-img-overlay'>
          <h5 class='card-title' text-align='center'>$arr[0]</h5>
          <p class='card-text'><strong>People like to talk and it keeps them connected to their loved ones. Therefore we bring to you $arr[1] mins.</strong></p>
          <p class='card-text'><strong>Stay connected with high speed data with limit $arr[2]</strong></p>
        </div>
      </div>";

   $count = $count +1; }
    echo "</table>";
    mysqli_free_result($var);
} else {
    echo "<p style='color:white;font-weight:bold'>No Results Found!</p>";
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>