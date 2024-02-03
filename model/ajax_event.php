<?php 
$function = $_GET['function'];
$id = $_GET['id'];
echo $id.$function;
if(isset($function) && $function == 'IDs')
{
    require("../connect_db.php");
    $conn->select_db("db23_120");
    $sql = "SELECT p.id as ID,p.name_th as pname FROM Storm as s INNER JOIN StormDetails as sd on sd.StormID = s.StormID INNER JOIN 
    stormList as sl on sd.stormListID = sl.stormListID INNER JOIN 
    reportStorm as rs on rs.stormID = s.StormID INNER JOIN 
    warning as w on w.reportStormID = rs.reportStormID INNER JOIN 
    notifications as n on n.id_warning = w.id_warning INNER JOIN 
    surveillance_area as sa on sa.id_notification = n.id_notification INNER JOIN 
    Province as p on p.id = sa.province
    WHERE s.StormID ='$id';";
    $result = $conn->query($sql);
    echo "<option selected disabled>กรุณาเลือกจังหวัด</option>";
    foreach($result as $value)
    {
        echo '<option value="'.$value['ID'].'">'.$value['pname'].'</option>';
    }
    require('../close_db.php');
}
if(isset($function) && $function == 'province')
{
    require("../connect_db.php");
    $conn->select_db("db23_120");
    $sql = "SELECT am.id as ID,am.name_th as name,p.name_th FROM Province as p 
    INNER JOIN amphures as am on p.id = am.province_id
    WHERE p.id = '$id';";
    $result = $conn->query($sql);
    echo "<option selected disabled>กรุณาเลือกอำเภอ</option>";
    foreach($result as $value)
    {
        echo '<option value="'.$value['ID'].'">'.$value['name'].'</option>';
    }
    require('../close_db.php');
}
if(isset($function) && $function == 'amphures')
{
    require("../connect_db.php");
    $conn->select_db("db23_120");
    $sql = "SELECT d.id as ID,d.name_th as name,p.name_th FROM Province as p INNER JOIN amphures as am on p.id = am.province_id
    INNER JOIN districts as d on am.id = d.amphure_id
    WHERE am.id ='$id';";
    $result = $conn->query($sql);
    echo "<option selected disabled>กรุณาเลือกตำบล</option>";
    foreach($result as $value)
    {
        echo '<option value="'.$value['ID'].'">'.$value['name'].'</option>';
    }
    require('../close_db.php');
}
?>