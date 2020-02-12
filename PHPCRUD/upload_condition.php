<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    include "navbar.php";
    
?>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign up</title>
        <link rel="stylesheet" href="upload_condition_style.css">
    </head>
    <body>
        <div id="container">
            <div class="form_warp">
                <h1>Upload Condition</h1>
                <form action="insertcode.php" method="post">
                    <div class="form_group">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="form_group">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form_group">
                        <label for="phone number">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" required>
                    </div>
                    <div class="form_group">
                            <select name="select" class="option_colour" id="select" onchange="selectData()">
                                <option value="occupation">Occupation</option>
                                <option value="pilot">Pilot</option>
                                <option value="doctor">Doctor</option>
                            </select>
                    </div>
                    <div id="pilot">
                        <div class="form_group">
                            <label for="Pilot_id">Pilot Name</label>
                            <input type="text" name="Pname" id="Pid">
                        </div>
                        <div class="form_group">
                            <label for="Pilot_name">Pilot Phone</label>
                            <input type="number" name="Pnumber" id="Pname">
                            </div>
                    </div>    
                    <div id="doctor">
                        <div class="form_group">
                            <label for="doctor_id">Doctor Name</label>
                            <input type="text" name="Dname" id="Did">
                            </div>
                        <div class="form_group">
                            <label for="doctor_name">Doctor Phone</label>
                            <input type="number" name="Dnumber" id="Dname">
                            </div>
                    </div>
                        <div class="form_group">
                            <input type="submit" name="submit" value="Submit" class="btn">
                        </div>
                </form>
            </div>    
        </div>
        <script>
            window.onload = function() {
                    document.getElementById("pilot").style.display = 'none';
                    document.getElementById("doctor").style.display = 'none';
                }
            function selectData()
            {
                var select = document.getElementById("select").value;
                if(select == "pilot")
                {
                    document.getElementById("pilot").style.display = '';
                    document.getElementById("doctor").style.display = 'none';
                }
                else if(select == "doctor")
                {
                    document.getElementById("pilot").style.display = 'none';
                    document.getElementById("doctor").style.display = '';
                }
                else if(select == "occupation")
                {
                    document.getElementById("pilot").style.display = 'none';
                    document.getElementById("doctor").style.display = 'none';
                }
            }
        </script>
    </body>     