<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>login</title> 
        <style>
            *   {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
                }
            body{
                font-family: 'Raleway', sans-serif;
                background-color: #fff;
                color:#ffff;
                line-height: 1.8;
                }
            #container{
                margin:150px auto;
                max-width:400px;
                padding:20px;    
                }    
            .form_warp{
                 background:#993399;   
                 padding:15px 20px;
                }       
            .form_warp h1{
                text-align:center;
            }    
            .form_warp .form_group{
                margin-top:10px;
            }
            .form_group label{
                display:block;
            }
            .form_group input{
                width:100%;
                padding:8px;
                border:solid 1px #fff;
                border-radius:10px;
            }
            .form_groups .login{
                margin-top:15px;
                width:50%;
                margin-left:25%;
                padding:8px;
                border:1px solid #00e600;
                border-radius:10px;
                color:#fff;
                background:#00e600;
                font-size:15px;
            }
            .form_groups .login:hover{
                background:#00b300;
                border:1px solid #00b300;
            }
            #go{
                text-align:center;
                background:#fff;
                color:black;
            }
            #form-massege{
                background:#ff66cc;
                border:1px solid #ff66cc;
                color:red;
                display:none;
                font-size:12px;
                font-weight:bold;
                margin-bottom:10px;
                padding:10px 25px;
                max-width:250px;
                border-radius:10px;
            }
        </style>
    </head>
    <body>
            <div id="go">
                <?php 
                session_start();
                    if(isset($_SESSION['username'])){
                        header("location:../front_end/main_page.php");
                    }
                    if(isset($_SESSION["error_massege"])){
                        echo $_SESSION['error_massege'];
                    }
            ?>
        </div> 
        <div id="container">
            <div class="form_warp">
                <div id="message">
                    <ul id="form-message"></ul>
                </div>
            <h1>Login</h1>
       <form action="../bussiness_logic/loginpage_work.php" method="post"> 
                    <div class="form_group">
                        <label for="username">email</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="form_group">
                        <label for="password">password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="form_groups">
                        <input type="submit" class="login" id="login" name="submit" value="Go!" >
                    </div>
         </form>  
            </div>
        </div>
    </body>
</html>    