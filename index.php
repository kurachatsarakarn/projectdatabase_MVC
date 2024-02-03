<?php
    if(isset($_GET['controller'])&&isset($_GET['action']))
    { 
     $controller = $_GET['controller'];
     $action = $_GET['action'];
    }
     else {
        $controller = 'pages';
        $action = 'home';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
    <style>
    .header {
        padding: 50px;
        text-align: center;
        background: #2E2F0E;
        color: burlywood;
        font-size: 30px;
        background-color: #EFF373;
    }
    body { 
        background-color: #fff;
        padding-bottom: 3rem; 
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; 
        margin-left: auto;
        margin-right: auto;
        list-style-type: none; margin: 0; padding: 0;
    }
   button { background: #333; border: none; padding: 0 1rem; margin: 0.25rem; border-radius: 10px; outline: none; color: #fff; }

    table {
        background-color: #efefef;
        text-align: center;
        border-spacing: 0;
        margin-left: auto;
        margin-right: auto;
    }
    .head {
        background-color: darkcyan;
        text-align: center;
        color: white;
    }
    table tr td {
        border: solid 1px silver;
    }
    /* Add a black background color to the top navigation */
.topnav {
  position: relative;
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

/* Centered section inside the top navigation */
.topnav-centered a {
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Right-aligned section inside the top navigation */
.topnav-right {
  float: right;
}

/* Responsive navigation menu - display links on top of each other instead of next to each other (for mobile devices) */
@media screen and (max-width: 600px) {
  .topnav a, .topnav-right {
    float: none;
    display: block;
  }

  .topnav-centered a {
    position: relative;
    top: 0;
    left: 0;
    transform: none;
  }
}
/*ของInsert*/
.topnavff {
  position: relative;
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnavff a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
  font-size: 15px;
}

/* Change the color of links on hover */
.topnavff a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnavff a.active {
  background-color: #04AA6D;
  color: white;
}

/* Centered section inside the top navigation */
.topnavff-centered a {
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Right-aligned section inside the top navigation */
.topnavff-right {
  float: right;
}
.vertical-center {
  margin: 0;
  position: absolute;
  top: 45%;
  left: 45%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
.container {
  height: 200px;
  position: relative;
  border: 3px solid green;
}

</style>
</head>
<body>
<div class="header">
<?php echo "controller = ".$controller." action = ".$action; ?>
</div>
<div class="topnav">
    
    <a href="?controller=pages&action=home">Home</a> 
    <a href="?controller=rain&action=index">ปริมาตรน้ำฝน</a>
    <a href="?controller=event&action=index">เหตุการณ์ที่เกิดขึ้น</a>
    <a href="?controller=summarize&action=index">สรุปเหตุการณ์ภาพรวม</a>
</div>
    <?php require_once("routes.php");?>
</body>   
</html>