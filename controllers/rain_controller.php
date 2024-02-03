<?php
class RainController
{
    public function index()
        {
        
        $rain_list = rain::getAll();
        foreach($rain_list as $r);
        require_once('views/rain/index_rain.php');
        }
    public function add()
        {
            $rain_list = rain::getAll();
            $stromlist = strom::getstrom();
            require_once("views/rain/add_rain.php");
        }
    public function save()
    {
            $IDs = $_GET['IDs'];
            $province = $_GET['province'];
            $amphures = $_GET['amphures'];
            $district = $_GET['district'];
            $date = $_GET['date'];
            $rainvolume = $_GET['rainvolume'];
            $areapercent = $_GET['areapercent'];
            $IDnoti = event::getIDnoti($IDs,$province);
            echo $province.$amphures.$district.$date.$rainvolume; 
            rain::add($IDnoti,$amphures,$district,$date,$rainvolume,$areapercent);
            RainController::index();
    }        
    public function updatefrom(){
        $RID = $_GET["RID"];
        $rain_list = rain::get($RID);
        foreach($rain_list as $r); 
        $stromlist = strom::getstrom();
        #foreach($stromlist as $s);
        $province = address::getprovince($r->strom);
        #foreach($province as $p);
        $amphures = address::getamphures($r->province);
        $district = address::getdistrict($r->amphures);
        #foreach($district as $d);
        #echo $d->district;
        require_once("views/rain/update_from.php");
    }
    public function update()
        {
            
            $IDs = $_GET['IDs'];
            $province = $_GET['province'];
            $IDnoti = event::getIDnoti($IDs,$province);
            $RID = $_GET['RID'];
            $amphures = $_GET['amphures'];
            $district = $_GET['district'];
            $date = $_GET['date'];
            $rainvolume = $_GET['rainvolume'];
            $areapercent = $_GET['areapercent'];
            rain::update($IDs,$IDnoti,$amphures,$district,$date,$rainvolume,$areapercent);
            RainController::index();
            #echo $amphures,$district;
        }
        public function deletefrom()
        {
        $RID = $_GET["RID"];
        $rain = rain::get($RID);
        foreach($rain as $r);
        require_once('views/rain/delete_from.php');
        }

        public function delete()
        {
            $RID = $_GET["RID"];
            rain::delete($RID);
            RainController::index();
            
        }

    }
?>