"use strict";
var audio = new Audio('https://soundbible.com/mp3/old-fashioned-door-bell-daniel_simon.mp3');
function getCall(){
  axios.get('/liveapistaff').then(function (response) {
   var delivered=response.data.delivered;
   var notification_status=response.data.status;
    console.log(delivered);

    if(delivered == false && notification_status == 'wait_confirmation'){
        audio.play();
        
      }

  })
  .catch(function (error) {
    console.log(error);
  });
  

  

};
