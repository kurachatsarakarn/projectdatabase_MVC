<?php 
    class eventdaily{
        public $eventdailyID,$eventID,$date,$mean,$hight,$detail;
        public function __construct($eventdailyID,$date,$mean,$hight,$detail)
        {
            $this->eventdailyID = $eventdailyID;
            $this->date = $date;
            $this->mean = $mean;
            $this->hight = $hight;
            $this->detail = $detail;
           
        } 

        public static function get($id)
        {
            $eventlist = [];
            require("connect_db.php");
            $sql = "SELECT ae.area_eventdaily_id as EVDAID,ae.date as Date,ae.mean_water as mean,ae.hight_water as hight,ae.detai as detai 
            FROM area_eventdaily as ae WHERE ae.area_event_id = '$id';";
            $conn->select_db("db23_120");
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc())
            {
            $eventdailyID = $row['EVDAID'];
            $date = $row['Date'];
            $mean = $row['mean'];
            $hight = $row['hight'];
            $detail = $row['detai'];
            $eventlist[] = new eventdaily($eventdailyID,$date,$mean,$hight,$detail);
            }
            require('close_db.php');
            return $eventlist;
        }
        public static function getdailyID($id)
        {
            $eventlist = [];
            require("connect_db.php");
            $sql = "SELECT ae.area_eventdaily_id as EVDAID,ae.date as Date,ae.mean_water as mean,ae.hight_water as hight,ae.detai as detai 
            FROM area_eventdaily as ae WHERE ae.area_eventdaily_id = '$id';";
            $conn->select_db("db23_120");
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc())
            {
            $eventdailyID = $row['EVDAID'];
            $date = $row['Date'];
            $mean = $row['mean'];
            $hight = $row['hight'];
            $detail = $row['detai'];
            $eventlist[] = new eventdaily($eventdailyID,$date,$mean,$hight,$detail);
            }
            require('close_db.php');
            return $eventlist;
        }



        public static function add($eventID,$date,$detail,$mean,$hight)
        {
            require("connect_db.php");
            $conn->select_db("db23_120");
            $sql = "INSERT INTO `area_eventdaily` (`area_eventdaily_id`, `area_event_id`, `date`, `detai`, `mean_water`, `hight_water`) VALUES 
            (NULL, '$eventID', '$date', '$detail', '$mean', '$hight');";
            $resuit = $conn->query($sql);
            #echo "dddd";
            require("close_db.php");

        }
        public static function update($EVDAID,$date,$detail,$mean,$hight)
        {
            require("connect_db.php");
            $conn->select_db("db23_120");
            $sql = "UPDATE `area_eventdaily` SET `date`='$date',`detai`='$detail',`mean_water`='$mean',`hight_water`='$hight' WHERE `area_eventdaily_id`= '$EVDAID';";
            $resuit = $conn->query($sql);
            require("close_db.php");

        }
        public static function delete($id)
        {
            require("connect_db.php");
            $conn->select_db("db23_120");
            $sql = "DELETE FROM `area_eventdaily` WHERE `area_eventdaily`.`area_eventdaily_id` = $id;";
            $resuit = $conn->query($sql);
            require("close_db.php");

        }
    
    }