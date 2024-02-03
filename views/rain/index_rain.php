<div class="vertical-center"><br><form method="GET" action="">
    <input type="hidden" name="controller" value="rain"/>
    <button type="submit" name="action" value="add">เพิ่มข้อมูล</button></div>
<br><br><br><br><table border="1">
<tr> <td>rainID</td><td>ชื่อพายุ</td><td>จังหวัด</td><td>อำเภอ</td><td>ตำบล</td><td>ปริมาตรน้ำฝน</td><td>พื้นที่ครอบคลุม(%)</td>
<td>update</td>
<td>delete</td></tr>
<?php 
    echo "<br>";
    foreach($rain_list as $r)
    {
        echo"<from method=GET action=><tr>
        <td>$r->rainID</td>
        <td>$r->strom</td>
        <td>$r->province</td>
        <td>$r->amphures</td>
        <td>$r->district</td>
        <td>$r->rainvolume</td>
        <td>$r->areapercent</td>
        <td><a href=?controller=rain&action=updatefrom&RID=$r->rainID>update</a></td>
        <td><a href=?controller=rain&action=deletefrom&RID=$r->rainID>delete</a></td>
        </tr></from>";
    }
echo "</table>";
?>
