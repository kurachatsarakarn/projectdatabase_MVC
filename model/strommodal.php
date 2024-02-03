<?php 
class strom
{
    public $ID,$strom;
    public function __construct($ID,$strom)
    {
        $this->ID = $ID;
        $this->strom = $strom;
    }
    
    public static function getstrom()
    {
        $stromlist = [];
        require("connect_db.php");
        $sql = "SELECT s.StormID as ID,sl.stormName as strom FROM Storm as s INNER JOIN StormDetails as sd on sd.StormID = s.StormID 
        INNER JOIN stormList as sl on sd.stormListID = sl.stormListID;";
        $conn->select_db("db23_120");
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $ID = $row['ID'];
            $strom = $row['strom'];
            
            $stromlist[] = new strom($ID,$strom);
        }
        require('close_db.php');
        return $stromlist;
    }    
    
    


}



?>