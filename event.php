<?php

    require_once ("class/class.event.php");



    $app = new Event();

    $result = $app->getData();

    if( isset ( $_POST["title"] ) && isset ($_POST["description"] ) ) {
    	

    	  $time = date('d M Y, g:i a');

    	   $app->postData( $_POST["title"],
    	   	               $_POST["description"],
    	   	               $time
    	    );




   }


    if( isset ( $_POST["id"] )  ) {


    $app->deleteData($_POST["id"]);


      }



?>