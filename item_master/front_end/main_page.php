<?php
session_start();
?>

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
            font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
            line-height:1.7em;
            background:#6600ff;
        }
        a{
            text-decoration:none;
        }
        #navbar{
            background:#00b8e6;
            color:#fff;
            overflow:auto;
            display:flex;
            flex-direction:row-reverse;
            padding:10px;
        }
        #navbar a{
            margin-right:3px;
            background:#ffff00;
            color:#990033;
            font-size:20px;
            padding:10px;
            border:1px solid #ffff00;
            border-radius:50%;
        }
        #navbar a:hover{
            margin-right:3px;
            background:#007a99;
            color:#ffff00;
            font-size:20px;
            padding:10px;
            border:1px solid #007a99;
            border-radius:50%;
        }
        .menu_style{
            margin-right:80px;
            padding:10px;
            border:1px solid #ffff00;
            background:#ffff00;
            color:#990033;
            border-radius:50%;
        }
        .menu_style:hover{
            margin-right:80px;
            padding:10px;
            background:#007a99;
            color:#ffff00;
            border-radius:50%;
            border:1px solid #007a99;
            border-radius:50%;
            cursor:pointer;
        }
        #container{
                margin:70px auto;
                max-width:600px;
                padding:20px;    
        }
        table{
            width:100%;
            padding:15px;
        }
        th{
            color:#fff;
            font-size:20px;
            margin:5px 5px 5px 5px;
        }
        thead{background-color:#ababab;}
        td{
            color:#99ff33;
            font-size:20px;
            text-align:center;
            height:10px;
            margin:5px 5px 5px 5px;
        }
        .edit{
            background:#ababab;
            border:1px solid #009900;
            border-radius:8px;
            font-size:20px;
            padding:10px;
        }
        .edit a{color:#ffffff;}
        .edit:hover{
            background:#ffffff;
            border:1px solid #0d3300;
            border-radius:8px;
            font-size:20px;
            cursor:pointer;
        }
        .edit:hover a{color:#000000;}
        .delete{
            background:#ff0000;
            border:1px solid #ff0000;
            border-radius:8px;
            color:#ffffff;
            font-size:20px;
            padding:10px;
        }
        .delete:hover{
            background:#ffffff;
            border:1px solid #ffffff;
            border-radius:8px;
            color:#000000;
            font-size:20px;
            cursor:pointer;
        }
        header{
            text-align:center;
            background:#00b8e6;
        }
        </style>
    </head>
    <body>
        <header>
        	<?php
        	if(isset($_SESSION['message'])) {
        		echo $_SESSION['msg_type'];
        		unset($_SESSION['message']);
        	}
        	?>
            <nav id="navbar">
               
                <form action="../bussiness_logic/processing.php" method="post">
                        <a href="add_value.php" class="menu_style">add</a>
                        <input type="submit" name="logout" value="logout" class="menu_style">
                </form>
            </nav>
        </header>

                    <?php
                $mysqli=new mysqli('localhost','root','','record') or die(mysqli_error($mysqli));
                $result=$mysqli->query("SELECT * FROM datas ORDER BY itemname,colour ASC") or die($mysqli->error);
            ?>
            <div id="container">
                <table id="result" style="border:#ffffff 10px solid;">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Color</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody id="output">
                    <?php while($row=$result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['itemname']; ?></td>
                        <td><?php echo $row['colour']; ?></td>
                        <td>
                            <button type="button" class="edit"><a href="add_value.php?edit=<?php echo $row['id']; ?>">Edit</a></button>
                            <button type="button" class="delete" onclick="ajax_request(<?php echo $row['id']; ?>);">Delete</button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <script>
                function ajax_request(id)
                {
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function()
                  {
                      if(xmlhttp.readyState == 4 && xmlhttp.status==200)
                      {
                          var test_div = document.getElementById('output');
                          test_div.innerHTML = xmlhttp.responseText;
                      }
                  }
                  xmlhttp.open('POST','../bussiness_logic/processing.php?delete='+id+'',true);
                  xmlhttp.send();
                }
            </script>
    </body>
</html>