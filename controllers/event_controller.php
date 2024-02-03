<?php
class EventController
{
    public function index()
        {
        $event_list = event::getAll();
        
        require_once('views/event/index_event.php');
        }
    public function add()
        {
            $stromlist = strom::getstrom();
            require_once("views/event/add_event.php");
        }
    public function save()
        {
            $IDs = $_GET['IDs'];
            $province = $_GET['province'];
            $amphures = $_GET['amphures'];
            $district = $_GET['district'];
            $date = $_GET['date'];
            $value = $_GET['value'];
            $datail = $_GET['datail'];
            $IDnoti = event::getIDnoti($IDs,$province);
            echo $IDnoti;
            event::add($IDnoti,$amphures,$district,$date,$datail,$value);
            EventController::index();
        }        
        public function updatefrom(){
            $eventID = $_GET["EVID"];
            $event_list = event::get($eventID);
            foreach($event_list as $e); 
            $stromlist = strom::getstrom();
            #foreach($stromlist as $s);
            $province = address::getprovince($e->strom);
            #foreach($province as $p);
            $amphures = address::getamphures($e->province);
            $district = address::getdistrict($e->amphures);
            #foreach($district as $d);
            #echo $d->district;
            require_once("views/event/update_from.php");
        }
        public function update()
        {
            
            $IDs = $_GET['IDs'];
            $province = $_GET['province'];
            $IDnoti = event::getIDnoti($IDs,$province);
            $EVID = $_GET['EVID'];
            $amphures = $_GET['amphures'];
            $district = $_GET['district'];
            $date = $_GET['date'];
            $value = $_GET['value'];
            $detail = $_GET['datail'];
            #echo $amphures,$district;
            event::update($EVID,$IDnoti,$amphures,$district,$date,$detail,$value);
            EventController::index();
            
        }
        public function deletefrom()
        {
        $EVID = $_GET["EVID"];
        $event = event::get($EVID);
        foreach($event as $e);
        require_once('views/event/delete_from.php');
        }

        public function delete()
        {
            $eventID = $_GET["EVID"];
            event::delete($eventID);
            EventController::index();
        }

}
?>