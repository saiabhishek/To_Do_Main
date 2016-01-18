<?php
include_once('access2.php');
if(isset($_POST['delete_multi'])){
    $idArr = $_POST['checked_id'];
    foreach($idArr as $id){
        mysqli_query($conn,"DELETE FROM todotabel WHERE id=".$id);
    }
    header("Location:display.php");
}
?>