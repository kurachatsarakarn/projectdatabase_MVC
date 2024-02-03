<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="">
    <input type="hidden" name="EVID" value="<?php echo $eventID; ?>"/>
    <br><label>วันที่บันทึก<input type="date" name="date" value="date"/></label><br>
    <br><label for="">ระดับน้ำสูงสุด <input type="text" name="hight" /></label><br>
    <br><label for="">ระดับน้ำเฉลี่ย <input type="text" name="mean" /></label><br>
    <br><label for="">รายละเอียด <input type="text" name="detail" /></label><br>
    <input type="hidden" name="controller" value="eventdaily"/><br>
    <br><button type="submit" name="action" value="index">back</button>
    <button type="submit" name="action" value="save">save</button>
    </form>
</body>
</html>