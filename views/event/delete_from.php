<?php echo "<br>".'<p style="text-align:center;">'."EVID:$e->eventID Date:$e->date strom:$e->strom province:$e->province amphures:$e->amphures
            district:$e->district</p>";?>
<div class="vertical-center">
<form method="GET" action="">
    <input type="hidden" name="EVID" value="<?php echo $e->eventID; ?>"/>
    <input type="hidden" name="controller" value="event"/>
    <button type="submit" name="action" value="index">back</button>
    <button type="submit" name="action" value="delete">delete</button>
</form>
</div>