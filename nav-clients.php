<!DOCTYPE html><html><head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {margin: 0;}

ul.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: #4CAF50;}


ul.topnav li.right {float: right; background-color: #AF4C4C;}

@media screen and (max-width: 600px){
    ul.topnav li.right, 
    ul.topnav li {float: none;}
}
<script>
function validateForm() {
    var x = document.forms["addroom"]["name"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
<style>
#rooms {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#rooms td, #rooms th {
    border: 1px solid #ddd;
    padding: 8px;
}

#rooms tr:nth-child(even){background-color: #f2f2f2;}

#rooms tr:hover {background-color: #ddd;}

#rooms th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

.viewroom {border: 1px solid green; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); background-color: #008CBA; font-size: 16px; color:white} 
.discharge {border: 1px solid green; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); background-color: #f44336; font-size: 16px; color:white}

</style>
</head>
<body>

<ul class="topnav">
  <li><a<?php if ($page == "client-dashboard") { echo ' class="active"';} ?> href="client-dashboard.php">Dashboard</a></li>
    <li><a<?php if ($page == "client-profile") { echo ' class="active"';} ?> href="client-profile.php">My Profile</a></li>
  <li><a<?php if ($page == "client-allocated-room") { echo ' class="active"';} ?> href="client-allocated-room.php">Allocated Rooms</a></li>
  <li><a<?php if ($page == "client-add-room") { echo ' class="active"';} ?> href="client-add-room.php">Get Room</a></li>
  <li class="right"><a href="logout-clients.php">Logout</a></li>
</ul>
