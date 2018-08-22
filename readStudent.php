<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT DISTINCT stud_id FROM student WHERE stud_id like '" . $_POST["keyword"] . "%' ORDER BY stud_id ";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list_student">
<?php
foreach($result as $staff) {
?>
<li onClick="selectStudent('<?php echo $staff["stud_id"]; ?>');"><?php echo $staff["stud_id"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>