<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<label> Logged in as: system admin</label>
<style>
label {display:block; width:x; height:y; text-align:right;}
body {font-family: "Lato", sans-serif;}

.sidebar {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}


</style>


</head>
<body>

<div class="sidebar">
  <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user"></i>Users</button>
  <div id="myDropdown" class="dropdown-content">
    <a title ="#user profiles" href="AdminCreateUserProfileUI.php" target="_self">Create User Profile</a>
    <a title="#user accounts" href="AdminCreateUserAccountUI.php" target="self">Create User Account</a>
	<a title="#view userprofile" href="AdminViewUserProfilesUI.php" target="_self">View user Profiles</a>
	<a title="#Search userprofile" href="AdminSearchUserProfileUI.php" target="_self">Search user Profiles</a>
	<a title="#Search useraccount" href="AdminSearchUserAccountUI.php" target="_self">Search user Accounts</a>
	<a title="#update userprofile" href="AdminUpdateUserProfileUI.php">Update User Profiles</a>
	<a title="#update useraccount" href="AdminUpdateUserAccountUI.php">Update User Accounts</a>
  </div>
</div>

  <span class="loginlogoutlink">
   <a title="Log Out" class="loginlogoutlink-logout" href="../index.php">Log Out</a>
</span>
</div>

<div class="main">
</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

    
</body>
</html> 