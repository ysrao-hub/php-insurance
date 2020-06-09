<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insurance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
}

$adult = 1;
$children = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["adult"])) {
    $adult = $_POST["adult"];
  }
  
  if (isset($_POST["children"]) && $_POST["children"]>1 ) {
    $children = 1;
  }
}
//echo $adult ."-".$children."<br>";

$sql = "SELECT c.name, p.price FROM companies c JOIN plan_prices p ON c.id = p.company_id WHERE p.adult = ".$adult." AND p.children = ".$children;
$result = $conn->query($sql);

$plan_prices = [];
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  $name = make_name($row['name']);
	  $plan_prices[$name] = $row['price'];
  }
}
$conn->close();

function make_name($str) {
	$string = preg_replace('/\s+/', '', $str);
	return strtolower($string);
}

$selectedAdult = $_POST["adult"]?:1;
$selectedChildren = $_POST["children"]?:0;
$givenDate = $_POST['data-date']?:date('m-d-Y');
$selectedDate = date("d/m/Y", strtotime($givenDate));
?>


<!DOCTYPE html>
<html>
<head>
<title>Insurance Plans</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<style>
.sidebar-widget {
	margin-top: 10px;
	background: #e7f2f3;
    padding: 15px;
    border: 1px solid #b4d1d4;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-3 sidebar">
<div class="sidebar-widget category-widget sb">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<div class="form-group row">
<label for="inputEmail" class="col-sm-3 col-form-label">Adults</label>
<div class="col-sm-7 offset-2">
<select id="adult" name="adult" class="form-control" onchange="changeChildern(this.value)">
<option selected value="1">1 Adult</option>
<option value="2">2 Adults</option>
</select>
</div>
</div>
<div class="form-group row">
<label for="inputPassword" class="col-sm-3 col-form-label">Children</label>
<div class="col-sm-7 offset-2">
<select id="children" name="children" class="form-control">
<option selected value="0">0 Children</option>
<option value="1">1 Child</option>
<option value="2">2 Children</option>
<option value="3">3 Children</option>
<option value="4">4 Children</option>
<option value="5">5 Children</option>
<option value="6">6 Children</option>
<option value="7">7 Children</option>
<option value="8">8 Children</option>
<option value="9">9 Children</option>
<option value="10">10 Children</option>
</select>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12">
<label for="inputCity">Start Date</label>
<div class="input-group date mb-date" data-provide="datepicker">
<input type="text" name="data-date" class="form-control" id="data-date">
<div class="input-group-addon">
<span class="fa fa-calendar"></span>
</div>
</div>
</div>
</div>
<div class="form-group row">
<div class="col-sm-10 offset-sm-2">
<button type="submit" class="btn btn-success">Update Quote</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
function changeChildern(val) {
	if(val==1) {
		document.getElementById("children").value=0;
		document.getElementById("children").disabled = true;
	} else {
		document.getElementById("children").disabled = false;
	}
}
(function() {
	document.getElementById('adult').value = "<?php echo $selectedAdult; ?>";
	document.getElementById('children').value = "<?php echo $selectedChildren; ?>";
	if(<?php echo $selectedAdult	 ?>==1) {
		document.getElementById("children").value=0;
		document.getElementById("children").disabled = true;
	}
	// alert( "<?php echo $_POST['data-date']; ?>");
	//$('#data-date').datepicker({
	//	format: 'dd-mm-yyyy',
	//	defaultDate: "<?php echo $_POST['data-date']; ?>"
	//});
	
	$('#data-date').datepicker("update", "<?php echo $givenDate; ?>");
})();

</script>
</body>
</html>

<?php
echo "Selected Values: Adult=".$selectedAdult." Children=".$selectedChildren." Date=".$selectedDate."<br>";
echo "Australian Unity=".$plan_prices['australianunity']."<br>";
echo "Medibank=".$plan_prices['medibank']."<br>";
echo "Iman=".$plan_prices['iman']."<br>";
echo "Alliance=".$plan_prices['alliance']."<br>";
echo "Bupa=".$plan_prices['bupa']."<br>";
?>
<?php //echo $plan_prices['australianunity']?:"0"; ?>





