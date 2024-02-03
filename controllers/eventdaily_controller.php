<?php
class EventDailyController
{
    public static function index()
    {
        $eventID = $_GET["EVID"];
        $event_list = event::get($eventID);
        foreach($event_list as $e);
     
        $eventdaily_list = eventdaily::get($eventID);
        require_once('views/eventdaily/index_eventdaily.php');
        
    }
    public static function add()
    {
        $eventID = $_GET["EVID"];
        #echo "ev".$eventID;
        require_once('views/eventdaily/add_eventdaily.php');
    }
    public function save()
    {
        $eventID = $_GET["EVID"];
        $date = $_GET["date"];
        $mean = $_GET["mean"];
        $hight = $_GET["hight"];
        $detail = $_GET["detail"];
       
        eventdaily::add($eventID,$date,$detail,$mean,$hight);
        EventDailyController::index();
    
    }
    public function updatefrom()
    {
        $eventID = $_GET["EVID"];
        $eventdailyID = $_GET['EVDAID'];
        $EVDAID = eventdaily::getdailyID($eventdailyID);
        foreach($EVDAID as $EVDAID);
        require_once("views/eventdaily/update_from.php");
    }
    public function update()
    {
        $eventID = $_GET["EVID"];
        $EVDAID = $_GET["EVDAID"];
        $date = $_GET["date"];
        $mean = $_GET["mean"];
        $hight = $_GET["hight"];
        $detail = $_GET["detail"];
        #echo " date: ".$date." mean: ".$mean." hight: ".$hight." d: ".$detail;
        eventdaily::update($EVDAID,$date,$detail,$mean,$hight);
        EventDailyController::index();
    }
    public function deletefrom()
    {
        $eventID = $_GET["EVID"];
        $eventdailyID = $_GET['EVDAID'];
        $EVDAID = eventdaily::getdailyID($eventdailyID);
        foreach($EVDAID as $ed);
        require_once('views/eventdaily/delete_from.php');
    }    
    
    public function delete()
    {
        $eventdailyID = $_GET['EVDAID'];
        $eventID = $_GET["EVID"];

        eventdaily::delete($eventdailyID);
        EventDailyController::index();
    }
}
?>