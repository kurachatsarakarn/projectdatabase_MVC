<?php 
    class event{
        public $eventID,$notificationID,$amphures,$district,$date,$detail,$value,$province,$strom;
        public function __construct($eventID,$amphures,$notificationID,$district,$date,$detail,$value,$province,$strom)
        {
            $this->eventID = $eventID;
            $this->notificationID = $notificationID;
            $this->amphures = $amphures;
            $this->district = $district;
            $this->date = $date;
            $this->value = $value;
            $this->detail = $detail;
            $this->province = $province;
            $this->strom = $strom;
        } 

        public static function getAll()
        {
            $eventlist = [];
            require("connect_db.php");
            $sql = "SELECT
            ae.area_event_id AS ID,
            ae.id_notification AS noti,
            ae.date AS date,
            sl.stormName AS sname,
            p.name_th AS pname,
            am.name_th AS amname,
            d.name_th AS dname,
            ae.detai AS detail,
            ae.amountvalue AS value
            FROM
            area_event AS ae
          INNER JOIN
            notifications AS n ON n.id_notification = ae.id_notification
          INNER JOIN
            surveillance_area AS sa ON sa.id_notification = n.id_notification
          INNER JOIN
            Province AS p ON p.id = sa.province
          INNER JOIN
            amphures AS am ON am.province_id = p.id && ae.amphures_id = am.id
          INNER JOIN
            districts AS d ON d.id = ae.district_id
          INNER JOIN
            warning AS w ON w.id_warning = n.id_warning
          INNER JOIN
            reportStorm AS rs ON rs.reportStormID = w.reportStormID
          INNER JOIN
            Storm AS s ON s.StormID = rs.stormID
          INNER JOIN
            StormDetails AS sd ON sd.StormID = s.StormID
          INNER JOIN
            stormList AS sl ON sl.stormListID = sd.stormListID;";
            $conn->select_db("db23_120");
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc())
            {
                $eventID = $row['ID'];
                $notificationID = $row['noti'];
                $date = $row['date'];
                $strom = $row['sname'];
                $province = $row['pname'];
                $amphures = $row['amname'];
                $district = $row['dname'];
                $value = $row['value'];
                $detail = $row['detail'];
                $eventlist[] = new event($eventID,$amphures,$notificationID,$district,$date,$detail,$value,$province,$strom);
            }
            require('close_db.php');
            return $eventlist;
        }
        public static function get($id)
        {
            $eventlist = [];
            require("connect_db.php");
            $sql = "SELECT
            ae.area_event_id AS ID,
            ae.id_notification AS noti,
            ae.date AS date,
            sl.stormName AS sname,
            p.name_th AS pname,
            am.name_th AS amname,
            d.name_th AS dname,
            ae.detai AS detail,
            ae.amountvalue AS value
            FROM
            area_event AS ae
          INNER JOIN
            notifications AS n ON n.id_notification = ae.id_notification
          INNER JOIN
            surveillance_area AS sa ON sa.id_notification = n.id_notification
          INNER JOIN
            Province AS p ON p.id = sa.province
          INNER JOIN
            amphures AS am ON am.province_id = p.id && ae.amphures_id = am.id
          INNER JOIN
            districts AS d ON d.id = ae.district_id
          INNER JOIN
            warning AS w ON w.id_warning = n.id_warning
          INNER JOIN
            reportStorm AS rs ON rs.reportStormID = w.reportStormID
          INNER JOIN
            Storm AS s ON s.StormID = rs.stormID
          INNER JOIN
            StormDetails AS sd ON sd.StormID = s.StormID
          INNER JOIN
            stormList AS sl ON sl.stormListID = sd.stormListID
            WHERE ae.area_event_id = '$id';";
            $conn->select_db("db23_120");
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $eventID = $row['ID'];
            $notificationID = $row['noti'];
            $date = $row['date'];
            $strom = $row['sname'];
            $province = $row['pname'];
            $amphures = $row['amname'];
            $district = $row['dname'];
            $value = $row['value'];
            $detail = $row['detail'];
            $eventlist[] = new event($eventID,$amphures,$notificationID,$district,$date,$detail,$value,$province,$strom);
            require('close_db.php');
            return $eventlist;
        }
        public static function getIDnoti($id,$idp)
        {
            require("connect_db.php");
            $sql ="SELECT n.id_notification as IDnoti FROM Storm as s  INNER JOIN StormDetails as sd on sd.StormID = s.StormID
            INNER JOIN stormList as sl on sd.stormListID = sl.stormListID INNER JOIN 
            reportStorm as rs on rs.stormID = s.StormID INNER JOIN 
            warning as w on w.reportStormID = rs.reportStormID INNER JOIN 
            notifications as n on n.id_warning = w.id_warning INNER JOIN 
            surveillance_area as sa on sa.id_notification = n.id_notification INNER JOIN 
            Province as p on p.id = sa.province
            WHERE s.StormID ='$id' && p.id ='$idp';";
             $conn->select_db("db23_120");
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $notificationID = $row['IDnoti'];
            require('close_db.php');
            return $notificationID;
        }
        public static function add($IDnoti,$IDam,$IDd,$date,$detail,$value)
        {
            require("connect_db.php");
            $conn->select_db("db23_120");
            $sql = "INSERT INTO `area_event`(`area_event_id`, `id_notification`, `amphures_id`, `district_id`, `date`, `detai`, `amountvalue`) 
            VALUES (NULL,'$IDnoti','$IDam','$IDd','$date','$detail','$value');";
            $resuit = $conn->query($sql);
            require("close_db.php");

        }
        public static function update($EVID,$IDnoti,$amphures,$district,$date,$detail,$value)
        {
            require("connect_db.php");
            $conn->select_db("db23_120");
            $sql = "UPDATE `area_event` SET `id_notification`='$IDnoti',`amphures_id`='$amphures',`district_id`='$district',`date`='$date',`detai`='$detail',
            `amountvalue`='$value' WHERE `area_event_id`='$EVID';";
            $resuit = $conn->query($sql);
            require("close_db.php");

        }
    
        public static function delete($id)
        {
            require("connect_db.php");
            $conn->select_db("db23_120");
            $sql = "DELETE FROM `area_event` WHERE `area_event_id` = '$id'";
            $resuit = $conn->query($sql);
            require("close_db.php");

        }
    
    
    
    
    
    }





?>