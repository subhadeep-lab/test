<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav button{
    width : 90px;
    height : 50px;
}

.topnav button:hover {
  background-color: #ddd;
  color: black;
}

.topnav button.active {
  background-color: #4CAF50;
  color: #0000;
}

.topnav-right {
  float: right;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="main_page.php">Home</a>
  <a href="index.php">Item Details</a>
  <a href="upload_condition.php">Conditional Form</a>
  <div class="topnav-right">
    <form action="insertcode.php" method="post">
        <button type="submit" name="logout" value="logout">logout</button>
    </form>
  </div>
</div>

<div style="padding-left:16px">

 
</div>

</body>
</html>


