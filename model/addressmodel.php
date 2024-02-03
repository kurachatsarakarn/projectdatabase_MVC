<?php 
class address
{
    public $ID,$name;
    public function __construct($ID,$name)
    {
        $this->ID = $ID;
        $this->name = $name;
    }
    
    public static function getprovince($id)
    {
        $plist = [];
        require("connect_db.php");
        $sql = "SELECT p.id as ID,p.name_th as pname FROM Storm as s INNER JOIN StormDetails as sd on sd.StormID = s.StormID INNER JOIN
        stormList as sl on sd.stormListID = sl.stormListID INNER JOIN 
        reportStorm as rs on rs.stormID = s.StormID INNER JOIN 
        warning as w on w.reportStormID = rs.reportStormID INNER JOIN 
        notifications as n on n.id_warning = w.id_warning INNER JOIN 
        surveillance_area as sa on sa.id_notification = n.id_notification INNER JOIN 
        Province as p on p.id = sa.province
        WHERE sl.stormName ='$id';";
        $conn->select_db("db23_120");
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $ID = $row['ID'];
            $province = $row['pname'];
            
            $plist[] = new address($ID,$province);
        }
        require('close_db.php');
        return $plist;
    }    
    
    public static function getamphures($id)
    {
        $amlist = [];
        require("connect_db.php");
        $sql = "SELECT am.id as ID,am.name_th as name,p.name_th FROM Province as p 
        INNER JOIN amphures as am on p.id = am.province_id
        WHERE p.name_th = '$id';";
        $conn->select_db("db23_120");
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $ID = $row['ID'];
            $amphures = $row['name'];
            
            $amlist[] = new address($ID,$amphures);
        }
        require('close_db.php');
        return $amlist;
    }    
    
    public static function getdistrict($id)
    {
        $dlist = [];
        require("connect_db.php");
        $sql = "SELECT d.id as ID,d.name_th as name,p.name_th FROM Province as p INNER JOIN amphures as am on p.id = am.province_id
        INNER JOIN districts as d on am.id = d.amphure_id
        WHERE am.name_th ='$id';";
        $conn->select_db("db23_120");
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $ID = $row['ID'];
            $district = $row['name'];
            
            $dlist[] = new address($ID,$district);
        }
        require('close_db.php');
        return $dlist;
    }    

}



?>