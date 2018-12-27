<?php

$method = filter_input(INPUT_SERVER,'REQUEST_METHOD');
//$method = $_SERVER['REQUEST_METHOD']; same code, first code is secured



if ($method == "POST"){
    
    $requestbody = file_get_contents('php://input');
    $json = json_decode($requestbody);
    
    $text = $json ->result->parameters->text; // change 'text' with your parameter
    
    switch ($text){
    case 'hi':
        $speach = "Hi, Nice to meet you";
        break;
    
        case 'bye':
            $speach = "Bye, good night";
            break;
        
        default :
            $speach = "Sorry, I didn't get that, Please ask me something else.";
            break;
    }
    
    
    
    
    $response = new \stdClass();
    $response->speech = "";
    $response->displayText = "";
    $response->source = "webhook";
    echo json_encode($response);
    
    
    
} else {
    echo 'method not allowed';
}



