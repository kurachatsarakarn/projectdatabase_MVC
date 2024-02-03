<?php 
    $controllerslist = array('pages'=>['home','error'],'rain'=>['index','add','save','updatefrom','update','deletefrom','delete'],
    'event'=>['index','add','save','updatefrom','update','deletefrom','delete'],
    'eventdaily'=>['index','add','save','updatefrom','update','deletefrom','delete'],
    'summarize'=>['index']);
    function call($controller,$action){
        
        switch($controller)
        {
            case 'rain': 
                require_once('controllers/'.$controller."_controller.php");
                require_once("model/rainmodel.php");
                require_once("model/eventmodal.php");
                require_once("model/strommodal.php");
                require_once("model/addressmodel.php");
                $controller = new RainController;
                break;
           case 'pages':
                require_once('controllers/'.$controller."_controller.php");
                $controller = new PagesController;
                break;
            case 'event': 
                require_once('controllers/'.$controller."_controller.php");
                require_once("model/eventmodal.php");
                require_once("model/strommodal.php");
                require_once("model/addressmodel.php");
                $controller = new EventController;
                break;
            case 'eventdaily': 
                require_once('controllers/'.$controller."_controller.php");
                require_once("model/eventmodal.php");
                require_once("model/eventdailymodal.php");
                $controller = new EventDailyController;
                break;
            case 'summarize':
                require_once('controllers/'.$controller."_controller.php");
                require_once("model/summarizemodel.php");
                $controller = new SumController;
                break;
        }
        $controller->{$action}();
    }
    
    
    
    
    
    if(array_key_exists($controller,$controllerslist))
    {
        if(in_array($action,$controllerslist[$controller]))
        {
            call($controller,$action);
        }
        else
        {
            call('page','error');
        }
    }
    else
    {
        call('page','error');
    }
    
    
?>