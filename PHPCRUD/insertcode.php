<?php
session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
////////////for login////////////////////////////////////////////////////    
$connection = mysqli_connect("localhost","root","","phpcurd");
if(isset($_POST['login']))
{
            $username=$_REQUEST['username'];
            $password=$_REQUEST['password'];
        if($username!="admin")
            {
                $_SESSION["not_match_massege"] = "invalid username"; 
                header("location:login.php");
            }
        elseif($password!="admin")
            {
                $_SESSION["pwd_not_massege"] = "invalid password";
                header("location:login.php");
            }
        else
            {
                $_SESSION['username']=$username;
                header('location:main_page.php');
            }
}
////////////////////////////////////////PHP CRUD/////////////////////////////////////////////////////

/////////////////////For Readrecord////////////////////
extract($_POST);
if(isset($_POST['readrecord']))
{
    $query = "SELECT * FROM category_details";
    $query_run = mysqli_query($connection,$query);
    $number = 1;
    while($row = mysqli_fetch_assoc($query_run))
    {
        $id =$row['id'];
        $itemname = $row['Itemname'];
        $colour = $row['colour'];
        echo "<tr>";
        echo "<td>$number</td>";
        echo "<td>$itemname</td>";
        echo "<td>$colour</td>";
        echo"<td><button onclick='GetUserDetails(".$row['id'].")' class='btn btn-success'>Edit</button></td>";
        echo"<td><button onclick='DeleteUser(".$row['id'].")' class='btn btn-danger'>Delete</button></td>";
        echo "</tr>";
        $number++;
    }
}
//////////////////////Add value in table//////////////////////
if(isset($_POST['itemname']) && isset($_POST['colour']))
{
    $query ="INSERT INTO category_details(Itemname,colour) VALUES ('$itemname','$colour')";
    $query_run = mysqli_query($connection,$query);
}
//////////////////////delete value into table///////////////////////////
if(isset($_POST['deleteid']))
{
    $userid = $_POST['deleteid'];
    $query = "DELETE FROM category_details WHERE id='$userid'";
    $query_run = mysqli_query($connection,$query);
}
//////////////////// for Edit///////////////////////////
if(isset($_POST['id']) && isset($_POST['id']) !="")
{
    $user_id=$_POST['id'];
    $query = "SELECT * FROM category_details WHERE id='$user_id'";
    if(!$result=mysqli_query($connection,$query))
    {
        exit(mysqli_error());
    }
    $response = array();
    if(mysqli_num_rows($result) > 0)
    {
            while($row = mysqli_fetch_assoc($result))
            {
                $response = $row;
            }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] ="Data not found!";
    }
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] ="Invalid request!";
}
/////////////////update/////////////////////////
if(isset($_POST['up_update_id']))
{
    $up_update_id = $_POST['up_update_id'];
    $up_itemname = $_POST['up_itemname'];
    $up_colour = $_POST['up_colour'];
    $query = "UPDATE category_details SET Itemname='$up_itemname',colour='$up_colour' WHERE id='$up_update_id'";
    $query_run = mysqli_query($connection,$query);
}
///////////////////////////crud end/////////////////

////////////for logout///////////////////////
if(isset($_POST['logout']))
    {
        session_unset();
        session_destroy();
        header("location:login.php");
    }


    //////////////////for Personnel...page-upload_condition.php ///////////////////////////////////////////////
$occupation_con = mysqli_connect("localhost","root","","occupation");
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $occupation = $_POST['select'];
        $phone_number = $_POST['phone_number'];
        $pilot_name = $_POST['Pname'];
        $pilot_number = $_POST['Pnumber'];
        $doctor_name = $_POST['Dname'];
        $doctor_number = $_POST['Dnumber'];
        
      $query = "INSERT INTO personnel(username,email,phone_number) VALUES ('$username','$email','$phone_number')";
      $run_query = mysqli_query($occupation_con,$query);
        $querys = "INSERT INTO doctor_personnel(doctor_name,doctor_phone) VALUES ('$doctor_name','$doctor_number')";
        $do_query = mysqli_query($occupation_con,$querys);
        $queryss = "INSERT INTO pilot_personnel(pilot_name,pilot_phone) VALUES ('$pilot_name','$pilot_number')";
        $do_the_query = mysqli_query($occupation_con,$queryss);
        header("location:main_page.php");
    }    