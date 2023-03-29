<!DOCTYPE html>
<html>
<head>
<center><h1>Search User Account</h1></center>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
label {width: 100px text-align:left;}
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
  font-size: 20px;
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

.button {
  background-color: #808080;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

 input {
        padding: 5px 10px;
		}

textarea {
  resize: none;
}
</style>


</head>
<body>

<div class="sidebar">
  <a title="#home" href = "AdminDashboard.php" target= "_self">&#x2190 back</a>

  
    <a title ="#search user">Search User Account</a>
    
</div>

<div class="main">
  <div class="search-container">
    <form action="" method="post">
      <input type="text" placeholder="Search by username.." name="uname" id="uname" size="100" method="post">
      <button type="submit" name="search" id="search"><i class="fa fa-search"></i></button><br><br>

      <?php
        include 'AdminSearchUserAccountCtr.php'; 

          
        if(isset($_POST['search']))
        {  
          
          $uid = $_POST["uname"];

          if($uid != null)
          {
            $admin = new AdminSearchUserAccountCtr();

            $output = $admin->search($uid);

            echo "<br><br>" . $output;
          }
        }
      ?>
    </form>
  </div>
</div>
</div>   
</body>
</html> 