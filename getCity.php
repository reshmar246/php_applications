<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM tbl_district WHERE sid = '" . $_POST["state_id"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select District</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["did"]; ?>"><?php echo $city["dname"]; ?></option>
<?php
    }
}
?>
