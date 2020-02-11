<?php 
    session_start();
    if(isset($_SESSION['username'])){
        header("location:index.php");
    } 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>login</title> 
        <link rel="stylesheet" href="login_style.css">
    </head>    
<body>
        <div id="container">
            <div class="form_warp">
                <div id="message">
                    <ul id="form-message"></ul>
                </div>
            <h1>Login</h1>
       <form action="insertcode.php" method="post"> 
                    <div class="form_group">
                        <label for="username">email</label>
                        <input type="text" name="username" id="username" required >
                     <?php 
                    if(isset($_SESSION["not_match_massege"])){
                        echo $_SESSION['not_match_massege'];
                    } 
                    ?>
                    </div>
                    <div class="form_group">
                        <label for="password">password</label>
                        <input type="password" name="password" id="password" required>
                        <?php  
                        if(isset($_SESSION["pwd_not_massege"])){
                            echo $_SESSION['pwd_not_massege'];
                        } 
                        ?>
                    </div>
                    <div class="form_groups">
                        <input type="submit" class="login" name="login" value="Go!" >
                    </div>
         </form>  
            </div>
        </div>
    </body>
</html>    