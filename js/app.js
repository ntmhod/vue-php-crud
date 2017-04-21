(function(){



Vue.component("event-list", {

	  props: ["event"],

    template: "<div class='heading'>" +

            
             "<span class='id'> {{ event.id }} </span>" +
             "<h3 class='title'> {{event.title }} </h3> " +

             "<button class='delete' v-on:click = 'deleteevent(event.id)'> &#x2718; </button>" +
             "<p class='time'>  {{ event.time }}  </p>" +
             "<p class='desc'> {{event.description}} </p>   " +

            "</div>",


    methods: {

           deleteevent: function(id) {
                
                      return eventApp.deletedata(id);


           }


    }




});


var eventApp = new Vue({

    el: "#app",

    
    data:  function () {

           return {

            title: '',
            description: '',
          
            events: "",
            loading: true,
            sending: false

          };


    },

    created: function() {

          this.fetchdata();

        
    },

    methods: {

          fetchdata: function(){

          	   var self = this;


          	   $.ajax({

                    url: 'event.php',
                    method: 'GET'

          	   }) .done (function (data) {

          	   	      
                      self.events =  JSON.parse(data);

                        self.loading = false;                   


                      console.log("data get sucess");


          	   }) .fail (function(){

                    console.log("Data load failed");

          	   });




          },


          senddata: function() {

               
                var self = this;

                  self.sending = true;

                var data = {

                  title: self.title,
                  description: self.description

                };

              
                $.ajax({

                     
                   url: "event.php",
                   method: "POST",
                   data: data



                }) .done ( function(data) { 


                           self.fetchdata();
                             self.sending = false;

                             console.log("data posted");
                         


                }) .fail ( function () {

                     console.log("Data sent failed")
                });

            
          },


          deletedata: function(id){

            var self = this;

           

              var data = {

                    id: id
              };

              

             $.ajax({

                     
                   url: "event.php",
                   method: "POST",
                   data: data
                   
                }) .done ( function(data) {  

                        console.log("deleted");                 

                           self.fetchdata();

                }) .fail ( function () {

                     console.log("Delete failed failed")
                });      



          }
    }

});




})();

