
<?php echo "<br>".'<p style="text-align:center;">'."EVDAID:$ed->eventdailyID Date:$ed->date ระดับน้ำเฉลี่ย(วัน):$ed->mean ระดับน้ำสูงสุด(วัน):$ed->hight รายละเอียด:$ed->detail</p>";?>
<div class="vertical-center">
<form method="GET" action="">
    <input type="hidden" name="EVID" value="<?php echo $eventID; ?>"/>
    <input type="hidden" name="controller" value="eventdaily"/>
    <input type="hidden" name="EVDAID" value="<?php echo $ed->eventdailyID; ?>"/>
    <button type="submit" name="action" value="index">back</button>
    <button  type="submit" name="action" value="delete">delete</button>
       
</form>
</div>