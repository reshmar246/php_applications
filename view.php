<?php
include "db_conn.php";
require_once("dbcontroller.php");
$db_handle = new DBController();
$query1 ="SELECT * FROM tbl_country";
$results = $db_handle->runQuery($query1);


?>




<html>
<head>
	<title>User Page</title>
	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	
	<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "getState.php",
	data:'country_id='+val,
	success: function(data){
		$("#state-list").html(data);
		getCity();
	}
	});
}


function getCity(val) {
	$.ajax({
	type: "POST",
	url: "getCity.php",
	data:'state_id='+val,
	success: function(data){
		$("#city-list").html(data);
	}
	});
}

</script>


</head>

<body>
<form action="#" method="post">
<br><br><br>
	<table>
	<tr>
	<td>Name</td>
	<td><input type="text" name="uname"></td>
	</tr>
	
	<tr>
	<td>Country:</td>
	<td><select name="country" id="country-list" class="demoInputBox" onChange="getState(this.value);">
                <option value disabled selected>Select Country</option>
                <?php
		foreach($results as $country) {
		?>
                <option value="<?php echo $country["cid"]; ?>"><?php echo $country["cname"]; ?></option>
                <?php
		}
		?></select>
	</td>
	</tr>
	<tr>
	<td>State:</td>
	<td><select name="state" id="state-list" class="demoInputBox" onChange="getCity(this.value);">
                <option value="">Select State</option>
            </select></td>
	</tr>
	<tr>
	<td>District:</td>
	<td><select name="district" id="city-list" class="demoInputBox">
                <option value="">Select District</option>
            </select></td>
	</tr>
	</table>
	<br>
	&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Submit"><br>
</form>	
       

</body>
</html>

	
	<?php
	if(isset($_POST["submit"]))
	{

$a=$_POST["uname"];
$b=$_POST["district"];

//$q="select did from `tbl_district` where district_id='$b'";

$sql11=("insert into `tbl_user` ( `uname`, `did`)  values('$a','$b')");
$result11=mysqli_query($con,$sql11);

	}
	?>





