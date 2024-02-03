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
    <input type="hidden" name="EVDAID" value="<?php echo $EVDAID->eventdailyID; ?>"/>
    <br><label>วันที่บันทึก<input type="date" name="date" value="<?php echo $EVDAID->date; ?>"/></label><br>
    <br><label for="">ระดับน้ำสูงสุด <input type="text" name="hight"  value="<?php echo $EVDAID->hight; ?>"/></label><br>
    <br><label for="">ระดับน้ำเฉลี่ย <input type="text" name="mean" value="<?php echo $EVDAID->mean; ?>"/></label><br>
    <br><label for="">รายละเอียด <input type="text" name="detail" value="<?php echo $EVDAID->detail; ?>"/></label><br>
    <input type="hidden" name="controller" value="eventdaily"/><br>
    <br><button type="submit" name="action" value="index">back</button>
    <button type="submit" name="action" value="update">update</button>
    </form>
</body>
</html>