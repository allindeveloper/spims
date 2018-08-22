<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT DISTINCT visit_id FROM visitors WHERE visit_id like '" . $_POST["keyword"] . "%' ORDER BY visit_id ";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list_visitor">
<?php
foreach($result as $staff) {
?>
<li onClick="selectVisitor('<?php echo $staff["visit_id"]; ?>');"><?php echo $staff["visit_id"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>