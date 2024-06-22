<?php
// Start or resume the session
session_start();

// Check if the "email" session variable is not set
if (!(isset($_SESSION["email"]))) {
    // Destroy the session
    session_destroy();
    
    // Redirect to the login page
    header('Location: u_login.php');
    exit(); // Important to stop further script execution
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pathfinder Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="../css/map.css" />
    
  </head>
  <body>
    
      <div id="map"></div>
      
      <!-- <div class="nav">
        <div class="user"><img alt="ham-menu" src="img/user.png" class="s-img"></div>
          
          <input id="searchInput" type="text" placeholder="  Search for a location">
          <button class="sub" value="Go">GO</button>
        </form>
      </div> -->

      <div class="nav">
        <div class="user" id="circle" ><center><img alt="ham-menu" src="../img/user.png" class="s-img"></center></div>
          <form id="searchForm">
          <input id="searchInput" name="pk_name" type="text" placeholder="  Search for a location">
          <input type="submit" class="sub" value="Go">
        </form>
      </div>

    <div id="custom-map-control-button"></div>
    <div id="parking_loc"></div>
     <div id="cls_parking_loc"></div>
    <div id="searchResults"></div>
    
    <div class="sidebar" id="sidebar">
      <a href="#" style="margin-top:20px;"><img src="../img/user.png" class="image">  User</a>
      <a href="#"><img src="../img/parking.png" class="image">  Current Bookings</a>
      <a href="#"><img src="../img/history.png" class="image">  History</a>
      <a href="#"><img src="../img/star.png" class="image">  Reviews & Ratings</a>
      <a href="#"><img src="../img/about.png" class="image">  Info</a>
      <a href="#"><img src="../img/contact.png" class="image">  Contact Us</a>
      <span class="close-button" id="closeButton">&times;</span>
    </div>
   
     <!-- <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
      ({key: "AIzaSyCzoq1WmjBzqOAG4IG0vT-oao0j1CYzzxI", v: "weekly"});</script>     <-API KEY_new:-AIzaSyDUKXSCCmEiCddVooFcEM7-tu0UvQ_U218- ><-- old: AIzaSyCzoq1WmjBzqOAG4IG0vT-oao0j1CYzzxI >
      -->
     <script
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUKXSCCmEiCddVooFcEM7-tu0UvQ_U218&callback=initMap&libraries=places&v=weekly" 
     defer
   ></script> 
   <script type="module" src="../js/map.js" ></script>
   <!-- <script>
    // Function to load JavaScript with cache-busting
    function loadScript(src, callback) {
        var script = document.createElement('script');
        script.src = src + '?v=' + new Date().getTime(); // Append timestamp
        script.onload = callback;
        document.head.appendChild(script);
    }

    // Load your JavaScript with cache-busting
    loadScript('script.js', function() {
        // Your callback function after the script is loaded
    });
</script> -->
  <script>
    // Find the input element with type="text"
    const inputElement = document.getElementById("searchInput");

    // Check if the input element was found
    if (inputElement) {
        // Add event listener for when the input is focused (clicked)
        inputElement.addEventListener('focus', function() {
            this.style.backgroundColor = 'none';
            this.style.border = 'none';
        });

        // Add event listener for when the input loses focus (clicked outside)
        inputElement.addEventListener('blur', function() {
            this.style.backgroundColor = 'none'; // Restore original background color
            this.style.border = 'none'; // Restore original border
        });
    } else {
        console.log("Input element not found.");
}

  
  </script>

  </body>
</html>


