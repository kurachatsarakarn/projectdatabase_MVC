<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="">
    <br><label>ชื่อพายุ</label><select name="IDs" id="IDs">
        <?php 
           
            echo "<option selected disabled>กรุณาเลือกพายุ</option>";
            foreach($stromlist as $s)
            {
                
                echo "<option value =$s->ID ";
                if($s->strom == $e->strom)
                {
                    echo 'selected="selected"';
                }
                echo ">$s->strom</option> ";
            }
            
        ?></select><br>
    <br><label>จังหวัด</label><select name="province" id="province">
    <?php 
           
           echo "<option selected disabled>กรุณาเลือกจังหวัด</option>";
           foreach($province as $p)
           {
               
               echo "<option value =$p->ID ";
               if($p->name == $e->province)
               {
                   echo 'selected="selected"';
               }
               echo ">$p->name</option> ";
           }
           
       ?>
    </select><br>
    <br><label>อำเภอ</label><select name="amphures" id="amphures">
    <?php 
           
           echo "<option selected disabled>กรุณาเลือกจังหวัด</option>";
           foreach($amphures as $am)
           {
               
               echo "<option value =$am->ID ";
               if($am->name == $e->amphures)
               {
                   echo 'selected="selected"';
               }
               echo ">$am->name</option> ";
           }
           
       ?>
    </select><br>
    <br><label>ตำบล</label><select name="district" id="district">
    <?php 
           
           echo "<option selected disabled>กรุณาเลือกตำบล</option>";
           foreach($district as $d)
           {
               
               echo "<option value =$d->ID ";
               if($d->name == $e->district)
               {
                   echo 'selected="selected"';
               }
               echo ">$d->name</option> ";
           }
           
       ?>
    </select><br>  
    <br><label>วันที่บันทึก<input type="date" name="date" value="<?php echo $e->date?>"/></label><br>
    <br><label for="">มูลค่าความเสียหาย<input type="text" name="value" value="<?php echo $e->value;?>"/></label><br>
    <br><label for="">รายละเอียดเพิ่มเติม<input type="text" name="datail" value="<?php echo $e->detail;?>"/></label><br>
    <input type="hidden" name="controller" value="event"/><br>
    <br><button type="submit" name="action" value="index">back</button>   
    <button type="submit" name="action" value="update">update</button>
    <input type="hidden" name="EVID" value="<?php echo $e->eventID?>"/><br>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script type = "text/javascript">
       $('#IDs').change(function(){
            var id = $(this).val();
        $.ajax({
        type: "GET",
        url: "model/ajax_event.php",
        data: {id:id,function:'IDs'},
        success: function (data){
                console.log(data)
            $('#province').html(data);
        }
    });
    });
    $('#province').change(function(){
            var id = $(this).val();
        $.ajax({
        type: "GET",
        url: "model/ajax_event.php",
        data: {id:id,function:'province'},
        success: function (data){
                console.log(data)
            $('#amphures').html(data);
        }
    });
    });
    $('#amphures').change(function(){
            var id = $(this).val();
        $.ajax({
        type: "GET",
        url: "model/ajax_event.php",
        data: {id:id,function:'amphures'},
        success: function (data){
            console.log(data)
            $('#district').html(data);
        }
    });
    });
     </script>
    </body>
</html>