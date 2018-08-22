<?php
session_start();
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clarification: cheers :);
*/
if(isset($_SESSION['admin_id'])) {
    session_destroy();
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_firstname']);
    unset($_SESSION['admin_lastname']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['admin_password']);
    
    header("Location: signin.php");
} else {
    header("Location: signin.php");
}
?>