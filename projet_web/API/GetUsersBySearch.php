<?php
session_start();
require_once "../conf/database.php";
require_once "../functions/func.php";
$_GET = SecArrSql($conn,$_GET);
extract($_GET);
$id = $_SESSION['id'];
$sql="SELECT id,firstname,lastname,profile,ID_1	,ID_2	,CAS FROM users LEFT JOIN friends ON (users.id=friends.ID_2) where users.firstname Like '%a%'";
$q = $conn->query($sql);
$arr = array();
while($row = $q->fetch_assoc()){
    if(($row['ID_1'] == $id || $row['ID_2'] == $id)  && $row["CAS"] == "f"){
        $row["Status"] = "Friend";
    }elseif($row['ID_1'] == $id && $row["CAS"] == "a"){
        $row["Status"] = "Invitation Sended";
    }elseif($row['ID_2'] == $id && $row["CAS"] == "a"){
        $row["Status"] = "Accept invitation";
    }else{
        $row["Status"] = "";
    }
    unset($row['CAS']);
    unset($row['ID_2']);
    unset($row['ID_1']);
    array_push($arr, $row);


}
echo json_encode($arr);



?>
