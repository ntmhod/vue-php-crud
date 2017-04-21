<?php

  

  //  require ("delete.php");

   

  ?>


<!DOCTYPE html>
<html>
<head>

	<title> Event App || Ajax || PHP </title>

  <meta name="viewport" content="width= device-width, initial-scale=1.0">


  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 

  <link rel="stylesheet" type="text/css" href="css/home.css">


  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  


</head>
  <body>





  

      <div class="container">


            <div class="row">



                <div id="app">
                   
                     <div class="event-form" id="forms">


                     <form method="POST" action="" role="form" v-on:submit.prevent = "senddata" >


                              <div class="form-group">

                                  <label> Event Title </label>

                                  <input type="text" name="title" id="title" v-model="title"  class="form-control" required />

                              </div>

                               <div class="form-group">

                                  <label> Description </label>

                                  <input type="text" name="description" id="description" v-model="description" class="form-control" required />

                              </div>


                              <div class="form-group "  style="width: 200px;"> 

                                       <input type="submit" name="submit" value="submit" class="btn btn-danger submit"  >

                              </div>

                          



                    

                     </div>



                           <div id="view">


                            <h2 class="t"> Your Events </h2>

                            <h5 v-if="loading"> Please Wait --  Loading Events </h5>


                            <h5 v-if="sending"> Submiting  events </h5>


  
                              <div v-for = "event in events" class="list">
                                
                                       <event-list v-bind:event = "event" v-bind:delete = "deletedata">  </event-list>



                              </div>

                          

                         </div>


                  </div>


                    


            </div>
      	

      </div>


      <footer>
        
             <p class="text-center"> Event app || with Vue.js & PHP || 2017 </p>

      </footer>



      <script type="text/javascript" src="js/vue.js"> </script>
      <script type="text/javascript" src="js/app.js"> </script>






  </body>
</html>