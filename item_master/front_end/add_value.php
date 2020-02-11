 <?php require_once '../bussiness_logic/processing.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <style>
        *{
            box-sizing:border-box;
            padding:0;
            margin:0;
        }
        body{
            background:#0099cc;
            font-family: 'Raleway', sans-serif;
            color:#ffff;
            line-height: 1.8;
        }
        #container{
            margin:150px auto;
            max-width:400px;
            padding:20px; 
        }
        .form_warp{
                 background:#004d66;   
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
        .form_group .option_colour{
            width:100%;
            padding:8px;
            border:solid 1px #fff;
            border-radius:10px;
        }   
        .form_group .login{
                margin-top:15px;
                width:50%;
                margin-left:25%;
                padding:8px;
                border:1px solid #00e600;
                border-radius:10px;
                color:#fff;
                background:#99cc00;
                font-size:15px;
        } 
        .form_group .login:hover{
                background:#608000;
                border:1px solid #608000;
        }
    </style>
   
</head>
    <body>
        <div id="container">
            <div class="form_warp">
                <h1>Add value</h1>
                <form action="../bussiness_logic/processing.php" method="post">
                    <div class="form_group">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label>itemname</label>
                            <input type="text" id="itemname" name="itemname" value="<?php echo $itemname; ?>">
                    </div>
                    <div class="form_group">
                            <select name="colour" class="option_colour" id="colour">
                                <option value="<?php echo $colour;?>" selected><?php echo $colour;?></option>
                                <option value="red">red</option>
                                <option value="green">green</option>
                                <option value="yellow">yellow</option>
                            </select>
                    </div>
                    <div class="form_group">
                            <?php 
                            if($update==true):
                            ?>
                            <button type="submit" class="login" name="update">update</button>
                            <?php else: ?>
                            <button type="submit" class="login" name="save">save</button>
                            <?php endif ?>
                    </div>
                    <input type="hidden" name="form_action" value="save">     
                </form>
            </div>
        </div>  
    </body>
</html>