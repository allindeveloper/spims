<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT DISTINCT emp_id FROM staff WHERE emp_id like '" . $_POST["keyword"] . "%' ORDER BY emp_id ";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $staff) {
?>
<li onClick="selectStaff('<?php echo $staff["emp_id"]; ?>');"><?php echo $staff["emp_id"]; ?></li>

<?php } ?>
</ul>
<?php } } ?>