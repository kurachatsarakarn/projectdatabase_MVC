<div class="vertical-center"><br><form method="GET" action="">
    <input type="hidden" name="controller" value="eventdaily"/>
    <input type="hidden" name="EVID" value="<?php echo $e->eventID; ?>"/>
    <button type="submit" name="action" value="add">เพิ่มข้อมูล</button></div>
<br><br><br><br>
<?php echo "<br>".'<p style="text-align:center;">'."EventID:$e->eventID Date:$e->date จังหวัด:$e->province อำเภอ: $e->amphures ตำบล:$e->district</p>";?>
<table border="1">
<tr><td>EventdailyID</td><td>วันที่บันทึก</td><td>ระดับน้ำเฉลี่ย</td><td>ระดับน้ำสูงสุด</td><td>รายละเอียด</td>
<td>update</td>
<td>delete</td>
</tr>
<?php 
    foreach($eventdaily_list as $ed)
    {
        
        echo"<from method=GET action=><tr>   
        <td>$ed->eventdailyID</td>
        <td>$ed->date</td>
        <td>$ed->mean</td>
        <td>$ed->hight</td>
        <td>$ed->detail</td>
        <td><a href=?controller=eventdaily&action=updatefrom&EVDAID=$ed->eventdailyID&EVID=$e->eventID>update</a></td>
        <td><a href=?controller=eventdaily&action=deletefrom&EVID=$e->eventID&EVDAID=$ed->eventdailyID>delete</a></td>
        </tr></from>";
    }
echo "</table>";
?>
