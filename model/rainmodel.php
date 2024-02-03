<?php 
    class rain{
        public $rainID,$notificationID,$amphures,$district,$date,$rainvolume,$areapercent,$province,$strom;
        public function __construct($rainID,$amphures,$notificationID,$district,$date,$rainvolume,$areapercent,$province,$strom)
        {
            $this->rainID = $rainID;
            $this->notificationID = $notificationID;
            $this->amphures = $amphures;
            $this->district = $district;
            $this->date = $date;
            $this->rainvolume = $rainvolume;
            $this->areapercent = $areapercent;
            $this->province = $province;
            $this->strom = $strom;
        } 

        public static function getAll()
        {
            $rainlist = [];
            require("connect_db.php");
            $sql = "SELECT
            ae.area_rain_id AS ID,
                      ae.id_notification AS noti,
                      ae.date AS date,
                      sl.stormName AS sname,
                      p.name_th AS pname,
                      am.name_th AS amname,
                      d.name_th AS dname,
                      ae.rain_volume AS volume,
                      ae.area_percent AS percent
          FROM
            area_rain AS ae
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
            {   $rainID = $row['ID'];
                $notificationID = $row['noti'];
                $province = $row['pname'];
                $amphures = $row['amname'];
                $district = $row['dname'];
                $date = $row['date'];
                $rainvolume = $row['volume'];
                $areapercent = $row['percent'];
                $strom = $row['sname'];
                $rainlist[] = new rain($rainID,$amphures,$notificationID,$district,$date,$rainvolume,$areapercent,$province,$strom);
        
            }
            require('close_db.php');
            return $rainlist;
        }
    
        public static function add($IDnoti,$IDam,$IDd,$date,$rainvolume,$areapercent)
        {
            require("connect_db.php");
            $conn->select_db("db23_120");
            $sql = "INSERT INTO `area_rain` (`area_rain_id`, `id_notification`, `amphures_id`, `district_id`, `date`, `rain_volume`, `area_percent`) 
            VALUES (NULL, '$IDnoti', '$IDam', '$IDd', '$date', '$rainvolume', '$areapercent');";
            $resuit = $conn->query($sql);
            require("close_db.php");

        }
        
        public static function get($id)
        {
            $rainlist = [];
            require("connect_db.php");
            $sql = "SELECT
            ae.area_rain_id AS ID,
                      ae.id_notification AS noti,
                      ae.date AS date,
                      sl.stormName AS sname,
                      p.name_th AS pname,
                      am.name_th AS amname,
                      d.name_th AS dname,
                      ae.rain_volume AS volume,
                      ae.area_percent AS percent
          FROM
            area_rain AS ae
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
            WHERE ae.area_rain_id = '$id';";
            $conn->select_db("db23_120");
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $rainID = $row['ID'];
            $notificationID = $row['noti'];
            $date = $row['date'];
            $strom = $row['sname'];
            $province = $row['pname'];
            $amphures = $row['amname'];
            $district = $row['dname'];
            $rainvolume = $row['volume'];
            $areapercent = $row['percent'];
            $rainlist[] = new rain($rainID,$amphures,$notificationID,$district,$date,$rainvolume,$areapercent,$province,$strom);
            require('close_db.php');
            return $rainlist;
        }
    
        public static function update($RID,$IDnoti,$amphures,$district,$date,$rainvolume,$areapercent)
        {
            require("connect_db.php");
            $conn->select_db("db23_120");
            $sql = "UPDATE `area_rain` SET `id_notification`='$IDnoti',`amphures_id`='$amphures',`district_id`='$district',`date`='$date',`rain_volume`='$rainvolume',`area_percent`='$areapercent' 
            WHERE `area_rain_id`='$RID';";
            $resuit = $conn->query($sql);
            require("close_db.php");

        }
        public static function delete($id)
        {
            require("connect_db.php");
            $conn->select_db("db23_120");
            $sql = "DELETE FROM `area_rain` WHERE `area_rain_id` = '$id'";
            $resuit = $conn->query($sql);
            require("close_db.php");

        }
    
    }





?>