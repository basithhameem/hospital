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
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$(function() {
    $('.discharge').click(function(e) {
        e.preventDefault();
        if (window.confirm("Are you sure?")) {
            location.href = this.href;
        }
    });
});
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
.dischargeenable {border: 1px solid green; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); background-color: green; font-size: 16px; color:white} 
.discharge {border: 1px solid green; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); background-color: #f44336; font-size: 16px; color:white}
.deleteroom {border: 1px solid green; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); background-color: black; font-size: 16px; color:white}

</style>
</style>
</head>
<body>

<ul class="topnav">
  <li><a<?php if ($page == "staff-dashboard") { echo ' class="active"';} ?> href="staff-dashboard.php">Staff Dashboard</a></li>
  <li><a<?php if ($page == "staff-allocated-room") { echo ' class="active"';} ?> href="staff-allocated-room.php">Total Allocated Room</a></li>
  <li><a<?php if ($page == "staff-add-room") { echo ' class="active"';} ?> href="staff-add-room.php">Add Room</a></li>
  <li class="right"><a href="logout-staffs.php">Logout</a></li>
</ul>
