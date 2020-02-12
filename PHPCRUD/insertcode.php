<?php
session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    
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

if(isset($_POST['itemname']) && isset($_POST['colour']))
{
    $query ="INSERT INTO category_details(Itemname,colour) VALUES ('$itemname','$colour')";
    $query_run = mysqli_query($connection,$query);
}
if(isset($_POST['deleteid']))
{
    $userid = $_POST['deleteid'];
    $query = "DELETE FROM category_details WHERE id='$userid'";
    $query_run = mysqli_query($connection,$query);
}
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
if(isset($_POST['up_update_id']))
{
    $up_update_id = $_POST['up_update_id'];
    $up_itemname = $_POST['up_itemname'];
    $up_colour = $_POST['up_colour'];
    $query = "UPDATE category_details SET Itemname='$up_itemname',colour='$up_colour' WHERE id='$up_update_id'";
    $query_run = mysqli_query($connection,$query);
}
if(isset($_POST['logout']))
    {
        session_unset();
        session_destroy();
        header("location:login.php");
    }

    //////////////////for upload_condition ///////////////////////////////////////////////

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $occupation = $_POST['select'];
        $personnel_id = $_POST['Personnel_id'];
        $pilot_id = $_POST['Pid'];
        $pilot_name = $_POST['Pname'];
        $doctor_id = $_POST['Did'];
        $doctor_name = $_POST['Dname'];
        if($occupation == "pilot")
        {
            $query = "INSERT INTO pilot_personnel(username,email,personnel_id,occupation,pilot_id,pilot_name) 
            VALUES ('$username','$email','$personnel_id','$occupation','$pilot_id','$pilot_name')";
            $do_query = mysqli_query($connection,$query);
            header("location:main_page.php");
        }
        if($occupation == "doctor")
        {
            $query = "INSERT INTO doctor_personnel(username,email,personnel_id,occupation,doctor_id,doctor_name) 
            VALUES ('$username','$email','$personnel_id','$occupation','$doctor_id','$doctor_name')";
            $do_query = mysqli_query($connection,$query);
            header("location:main_page.php");
        }
    }