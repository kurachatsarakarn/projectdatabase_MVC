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
    echo "<option selected disabled>กรุณาเลือกพายุ</option>";
        <?php 
            foreach($stromlist as $s)
            {
               
                echo "<option value =$s->ID >$s->strom</option> ";
            }
        ?></select><br>
    <br><label>จังหวัด</label><select name="province" id="province"></select><br>
    <br><label>อำเภอ</label><select name="amphures" id="amphures"></select><br>
    <br><label>ตำบล</label><select name="district" id="district"></select><br>  
    <br><label>วันที่บันทึก<input type="date" name="date" value="date"/></label><br>
    <br><label for="">ปริมาตรน้ำฝน<input type="text" name="rainvolume" /></label><br>
    <br><label for="">พื้นที่ครอบคลุม<input type="text" name="areapercent" /></label><br>
    <input type="hidden" name="controller" value="rain"/><br>
    <br><button type="submit" name="action" value="index">back</button>   
    <button type="submit" name="action" value="save">save</button>
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