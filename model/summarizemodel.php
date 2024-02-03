<?php 
    class sum{
        public $eventID,$notificationID,$amphures,$district,$date,$detail,$value,$province,$strom,$mean,$hight,$min;
        public function __construct($eventID,$amphures,$notificationID,$district,$date,$detail,$value,$province,$strom,$mean,$hight,$min)
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
            $this->mean = $mean;
            $this->hight = $hight;
            $this->min = $min;
        } 

        public static function getAll()
        {
            $sumlist = [];
            require("connect_db.php");
            $sql = "SELECT
            ae.area_event_id AS ID,
            ae.id_notification AS noti,
            ae.date AS DATE,
            sl.stormName AS sname,
            p.name_th AS pname,
            am.name_th AS amname,
            d.name_th AS dname,
            ae.detai AS detail,
            ae.amountvalue AS VALUE,
              ifnull(t1.mean,0) as mean,
              ifnull(t1.hight,0) as hight,
              ifnull(t1.min,0) as min
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
           LEFT JOIN 
           (SELECT aed.area_event_id as ID,sum(aed.mean_water)/count(aed.area_eventdaily_id) as mean,max(aed.hight_water) as hight,min(aed.mean_water) as min FROM area_eventdaily as aed
            GROUP by aed.area_event_id)as t1 on t1.ID = ae.area_event_id;";
            $conn->select_db("db23_120");
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc())
            {
                $eventID = $row['ID'];
                $notificationID = $row['noti'];
                $date = $row['DATE'];
                $strom = $row['sname'];
                $province = $row['pname'];
                $amphures = $row['amname'];
                $district = $row['dname'];
                $value = $row['VALUE'];
                $detail = $row['detail'];
                $mean = $row['mean'];
                $hight = $row['hight'];
                $min = $row['min'];
                $sumlist[] = new sum($eventID,$amphures,$notificationID,$district,$date,$detail,$value,$province,$strom,$mean,$hight,$min);
            }
            require('close_db.php');
            return $sumlist;
        }
    }