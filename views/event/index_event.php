<div class="vertical-center"><br><form method="GET" action="">
    <input type="hidden" name="controller" value="event"/>
    <button type="submit" name="action" value="add">เพิ่มข้อมูล</button></div>
<br><br><br><br>
<table border="1">
<tr> <td>eventID</td><td>ชื่อพายุ</td><td>จังหวัด</td><td>อำเภอ</td><td>ตำบล</td>
<td>วันที่บันทึก</td><td>รายละเอียด</td><td>มูลค่าความเสียหาย(บาท)</td>
<td>update</td>
<td>delete</td>
<td>ระดับน้ำในแต่ละวัน</td>
</tr>
<?php 
    echo "<br>";
    foreach($event_list as $e)
    {
        
        echo"<from method=GET action=><tr>
        <td>$e->eventID</td>
        <td>$e->strom</td>
        <td>$e->province</td>
        <td>$e->amphures</td>
        <td>$e->district</td>
        <td>$e->date</td>
        <td>$e->detail</td>
        <td>$e->value</td>
        <td><a href=?controller=event&action=updatefrom&EVID=$e->eventID>update</a></td>
        <td><a href=?controller=event&action=deletefrom&EVID=$e->eventID>delete</a></td>
        <td><a href=?controller=eventdaily&action=index&EVID=$e->eventID>ระดับน้ำแต่ละวัน</a></td>
        </tr></from>";
    }
echo "</table>";
?>
