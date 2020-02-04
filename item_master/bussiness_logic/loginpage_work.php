<?php
    session_start();
    $source = (isset($_REQUEST['source'])) ? $_REQUEST['source'] : 'login';
    switch($source)
        {
            case "login" :
                // to do //
                echo "step-2<br>";
                validatelogin();
            break;
            default :
                 echo "no source found";
        }
    function validatelogin()
        {
            $cons="admin";
            if(isset($_REQUEST['submit']))
                {
                    $username=$_REQUEST['username'];
                    $password=$_REQUEST['password'];
                    if($username=="")
                        {
                            $_SESSION["error_massege"] = $_SESSION["error_massege"] . "empty";
                            header("location:../front_end/login_page.php");
                        }    
                    elseif($username!=$cons)
                        {
                            $_SESSION["error_massege"] = $_SESSION["error_massege"] . "invalid username"; 
                            header("location:../front_end/login_page.php");
                        }
                    elseif($password=="")
                        {
                            $_SESSION["error_massege"] = $_SESSION["error_massege"] . "empty";
                            header("location:../front_end/login_page.php");
                        }
                    elseif($password!=$cons)
                        {
                            $_SESSION["error_massege"] = $_SESSION["error_massege"] . "invalid password";
                            header("location:../front_end/login_page.php");
                        }
                    else
                        {
                            $_SESSION['username']=$username;
                            $_SESSION['password']=$password;
                            header("location:../front_end/main_page.php");
                        }
                 }
        }  

