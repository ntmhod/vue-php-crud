<?php

  class Event {


      private $mysqli;

      private $msg =  array();
   
      private $getQuery = " SELECT id, title, description, timing FROM  events ORDER BY id desc";

      private $postQuery = "  INSERT INTO events (title, description, timing) VALUES (?, ?, ?) ";

      private $updateQuery = "UPDATE events SET title = ?, description = ? WHERE id = ? ";

      private $deleteQuery = "DELETE FROM events WHERE id = ? ";



      public function __construct() {



            $this->mysqli = new mysqli("127.0.0.1", 'root', '',  'event');


            if($this->mysqli->connect_error) {

                   die("Error:  (".   conntec_errno. ") " . $this->mysqli->connect_error);

            }else {

            	$this->msg[]  = "Database connected";


            }


            return $this->mysqli;



      }



      public function getData(){

      	    $event = array();
                   
            $statement = $this->mysqli->prepare($this->getQuery);

            $statement->bind_result($id, $title, $desc, $time);

            $statement->execute();

            while($statement->fetch()) {

                    
                    $event[] = array(
                            
                               "id" => htmlentities($id, ENT_QUOTES, "UTF-8"),

                               "title" => htmlentities($title, ENT_QUOTES, "UTF-8"),

                               "description" => htmlentities($desc, ENT_QUOTES, "UTF-8"),

                               "time" => htmlentities($time, ENT_QUOTES, "UTF-8")

                    	);

                   
          

            }


            if(!$statement->fetch()) {

            	      $this->msg[] = "Not getting data";

                  }



            $statement->close();

            echo json_encode($event);

            //return $event;

      }

      public function postData($title, $desc, $timing) {

              $title = htmlentities($title, ENT_QUOTES, "UTF-8");

              $desc = htmlentities($desc, ENT_QUOTES, "UTF-8");

              $timing = htmlentities($timing, ENT_QUOTES, "UTF-8");




      	       $statement = $this->mysqli->prepare($this->postQuery);

      	       $statement->bind_param("sss", $title, $desc, $timing);

      	       $send = $statement->execute();

      	      
      	       if(!$send) {

      	       	    $this->msg[] = "data not send";

      	       } else {  

                    $this->msg[]  = "Data sent success";
      	       }


      	       $statement->close();


      }

      public function deleteData ($id) {

               $statement = $this->mysqli->prepare($this->deleteQuery);

               $statement->bind_param("i", $id);

               $delete = $statement->execute();

               if(!$delete) {

               	     $this->msg[] = "Delete unsuccessfull";

               } else {

               	   $this->msg[] = "Deleted";

               }

               $statement->close();

      }

      public function updateDate ($id, $title, $desc) {

      	      $statement = $this->mysqli->prepare($this->updateQuery);

      	      $statement->bind_param("ssi", $title, $desc, $id);

      	      $updated = $statement->execute();

      	      if(!$updated) {

      	      	 $this->msg[] = " event Not updated";

      	      }else {

      	      	 $this->msg[] = "event updated";
      	      }

      	      $statement->close();

    

      }

      public function getMessage() {

      	   return $this->msg;
      }





  }


?>