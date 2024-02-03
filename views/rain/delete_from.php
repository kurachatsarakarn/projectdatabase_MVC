 <?php echo "<br>".'<p style="text-align:center;">'."rainID:$r->rainID วันที่บันทึก:$r->date ชื่อพายุ:$r->strom จังหวัด:$r->province อำเภอ:$r->amphures
            ตำบล:$r->district</p>";?>
<div class="vertical-center">
<form method="GET" action="">
    <input type="hidden" name="RID" value="<?php echo $r->rainID; ?>"/>
    <input type="hidden" name="controller" value="rain"/>
    <button type="submit" name="action" value="index">back</button>
    <button type="submit" name="action" value="delete">delete</button>
</form>
</div>