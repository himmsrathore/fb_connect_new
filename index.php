<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <title> FB connect </title> 
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div style="padding: 20px;"><h4>
<span>Connect With facebook</span></h4>
        
    <hr>
		
   
    <div  style="cursor:pointer;" >
        <button class="btn-lg-6 btn  btn-danger" id="login"> Login </button>
    </div>
    
    <br>
    
    <div  style="cursor:pointer;" >
        <button class="btn-lg-6 btn  btn-default" id="message"> Send message in group </button>
    </div>

    <br>

    <div  style="cursor:pointer;" >
        <button class="btn-lg-6 btn  btn-success" id="send_message"> Send message</button>
    </div>
    
    <br>
    
    <div  style="cursor:pointer;" >
        <button class="btn-lg-6 btn btn-warning" id="invite"> Invite  </button>
    </div>
    
    <br>
    
    <div  style="cursor:pointer;" >
        <button class="btn-lg-6 btn btn-info" id="share"> Share  </button>
    </div>
     
     <br>
    
    <div  style="cursor:pointer;" >
        <button class="btn-lg-6 btn btn-info" id="share_open_graph"> share_open_graph  </button>
    </div>
     
     <br>
     
      <div  style="cursor:pointer;" >
        <button class="btn-lg-6 btn btn-info" id="post"> post  </button>
    </div>
     
     <br>
    
    <div
  class="fb-like"
  data-send="true"
  data-width="450"
  data-show-faces="true"> 
</div>

    

		
 </div>

<script>



      window.fbAsyncInit = function() {
        FB.init({
          appId      : 'XXXXXXXXXXXXXX',
          xfbml      : true,
          version    : 'v2.1'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
  
  
  

  
	   
	   window.onload = function(){
               
               document.getElementById("post").onclick= function(){
                    FB.login(function(){
                    FB.api('/me/feed', 'post', {message: 'Hello, world!'});
                   }, {scope: 'publish_actions'});
               }
               
               document.getElementById("share_open_graph").onclick= function(){
                             FB.ui({
                                    method: 'share_open_graph',
                                    action_type: 'og.likes',
                                    action_properties: JSON.stringify({
                                     object:'https://developers.facebook.com/docs/',
                                    })
                                   }, function(response){});

                    },
               
                document.getElementById("share").onclick= function(){
                            FB.ui(
                                     {
                                      method: 'share',
                                      href: 'https://developers.facebook.com/docs/'
                                    }, function(response){});
               
                    },
               document.getElementById("login").onclick= function(){
                   
                              FB.login(
					function(response){
					alert("Logged In Succesfully");
					
					},
					{
                                           scope: 'email,user_birthday,user_friends'
                                         });
               }
               
	   
	    document.getElementById("invite").onclick =  function(){   
	   
                                FB.ui({method: 'apprequests',
                                     message: 'YOUR_MESSAGE_HERE'

                                   });
                               }
                               
                               
              document.getElementById("send_message").onclick =  function(){
                                    
                                    FB.ui({
                                          method: 'send',                                         
                                          message: "Some Kind of test ",                                         
                                          link: 'http://google.com/',
                                        //  display: 'iframe',
                                        //redirect_uri:redirect_uri,
                                      });

              }
                               
		   //function to check whether the user is logged in or not
		   document.getElementById("message").onclick =  function(){
				FB.getLoginStatus(function(response) {
				  if (response.status === 'connected') {
					//alert('Logged in.');
					//var redirect_uri= 'http://www.facebook.com/dialog/send?app_id=XXXXXXXX&link=http://gustavoadolfomonroy.com&redirect_uri=http://gustavoadolfomonroy.com/';
                                FB.ui({
                                          method: 'send',
                                          to:'XXXXXXXXXXXXXXX',  // id of user
                                          message: "Some Kind of test ",
                                          //app_id:736166379752452,
                                          link: 'http://google.com/',
                                          display: 'iframe',
                                        //redirect_uri:redirect_uri,
                                      });

    
				  }
				  else {
					FB.login(
					function(response){
					//alert("Logged In Succesfully");
					
					//var redirect_uri= 'http://www.facebook.com/dialog/send?app_id=XXXXXXXXX&link=http://gustavoadolfomonroy.com&redirect_uri=http://gustavoadolfomonroy.com/';
                                            FB.ui({
                                              method: 'send',
                                              //app_id:XXXXXXXXXXXXXXXX,
                                              link: 'http://google.com/',
                                              display: 'iframe',
                                              redirect_uri:redirect_uri,
                                            });

					},
					{
                                           scope: 'email,user_birthday,user_friends'
                                         });
				  }
				});
		   
		   }
		   
		   
		   } 
               
           
		   </script>
		  </body>
		  </html>
