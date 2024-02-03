<br><table border="1">
<tr> <td> ชื่อพายุ </td><td> จังหวัด </td><td> อำเภอ </td><td> ตำบล </td>
<td> วันที่บันทึก </td><td> รายละเอียด </td><td> มูลค่าความเสียหาย(บาท) </td>
<td> ระดับน้ำเฉลี่ย </td>
<td> ระดับน้ำสูงสุด </td>
<td> ระดับน้ำต่ำสุด </td>
</tr>
<?php 
    foreach($sum_list as $e)
    {
        
        echo"<from method=GET action=><tr>
        <td>$e->strom</td>
        <td>$e->province</td>
        <td>$e->amphures</td>
        <td>$e->district</td>
        <td>$e->date</td>
        <td>$e->detail</td>
        <td>$e->value</td>
        <td>$e->mean</td>
        <td>$e->hight</td>
        <td>$e->min</td>
        </tr></from>";
    }
echo "</table>";
?>
