<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:../front_end/login_page.php");
}
/////////// Database connect
$mysqli=new mysqli('localhost','root','','record') or die(mysqli_error($mysqli));
//////////////////////////////////////////////
$id=0;
$itemname='';
$colour='';
$update=false;
//Insert data into table...............
if(isset($_POST['save']))
{
    $itemname=$_POST['itemname'];
    $colour=$_POST['colour'];
    $mysqli->query("INSERT INTO datas (itemname,colour) VALUES ('$itemname','$colour')") or die($mysqli->error);
    $_SESSION['message']="record has been saved";
    $_SESSION['msg_type']="success";
    header("location:../front_end/main_page.php");
}
//Delete data from table Using AJAX.................
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM datas WHERE id=$id");
    $result = $mysqli->query("select * from datas ORDER BY itemname,colour ASC");
    
    while($row=$result->fetch_array()){
        echo "<tr>";
        echo "<td>" . $row['itemname'] . "</td>";
        echo "<td>" . $row['colour'] . "</td>";
        echo "<td><button type='button' class='edit'><a href='add_value.php?edit=".$row['id']."'>Edit</a></button>";
        echo "<button type='button' class='delete' onclick='ajax_request(".$row['id'].")'>Delete</button></td>";
        echo "</tr>"; 
    }
}
//Fetch all data from tabel by clicking edit button................
if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM datas WHERE id=$id") or die($mysqli->error());
    $row=$result->fetch_array();
    $itemname=$row['itemname'];
    $colour=$row['colour'];
}
//Upadte datas into tabel..............
if(isset($_POST['update'])){ 
    $id=$_POST['id'];
    $itemname=$_POST['itemname'];
    $colour=$_POST['colour'];
    $mysqli->query("UPDATE datas SET itemname='$itemname',colour='$colour' WHERE id=$id") or die($mysqli->error());
    $_SESSION['message']="record has been updated";
    $_SESSION['msg_type']="wrning";
    header("location:../front_end/main_page.php"); 
}
//       Log Out .....................
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    $_SESSION['error_massege'] = "logout";
    header("location:../front_end/login_page.php");
}
