<?php


include "../user.classes.php";

class Admin Extends User
{

    //view info on all users
    public function getAll()
    {   
        //store output to return
        $output = '';

        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        //query
        $sql = "SELECT * from $dbtable";
        $result = $conn->query($sql);

        //if the query returned any rows
        if ($result->num_rows > 0)
        {
            while ($row=$result->fetch_assoc())
            {
                //format output
                $output .= "<div class='AccountInfo'>";
                $output .= "<div class='AccountTextHolder'>";
                $output .= "User ID : " . $row["u_id"] . "<br>";
                $output .= "Role : " . $row["u_role"] . "<br>";
                $output .= "</div>";
                $output .= "</div>";
            }
        }
        //if query returned 0 rows
        else
        { 
            $output = "No record"; 
        }

        return $output;
    }


    //view info on all users
    public function getAllProfiles()
    {   
        //store output to return
        $output = '';

        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "profiles";
        $conn = $database->connectDB($dbtable);

        //query
        $sql = "SELECT * from $dbtable";
        $result = $conn->query($sql);

        //if the query returned any rows
        if ($result->num_rows > 0)
        {
            while ($row=$result->fetch_assoc())
            {
                //format output
                $output .= "<table style='width:70%'>";
                $output .= "<tr height = 30px>";
                $output .= "<td>";
                $output .=  $row["u_role"] . "<br>";
                $output .= "</td>";
                $output .= "</tr>";

            }
            $output .= "</table>";
        }
        //if query returned 0 rows
        else
        { 
            $output = "No record"; 
        }

        return $output;
    }

    public function createProfile($role)
    {
        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "profiles";
        $conn = $database->connectDB($dbtable);

        
        //try to insert user into database
        try
        {
            //query
            $sql = "INSERT INTO $dbtable (u_role)
            VALUES ('$role')";

            $result = $conn->query($sql);
        }
        //catch errors(failed to insert etc.)
        catch(Exception $e)
        {
            return false;
        }

        return true;

    }


    public function createUser($name, $uname, $pwd, $role)
    {
        //create database object
        $database = new Dbh();

        //check if role exists
        $checkRole = false;

        //connect to database
        $dbtable = "profiles";
        $conn = $database->connectDB($dbtable);

        //query
        $sql = "SELECT * FROM $dbtable WHERE u_role='$role'";
        $result = $conn->query($sql);

        //if query returns 1 or more rows
        if ($result->num_rows > 0)
        {
            $checkRole = true;
        }
        else
        {
            $checkRole = false;
        }

        $database->close($conn);


        echo "<br> check role : " . $checkRole . "<br>";

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);
        

        if($checkRole === true)
        {
            try
            {
                //query
                $sql = "INSERT INTO $dbtable (u_id, u_name, u_password, u_role)
                VALUES ('$name', '$uname', '$pwd', '$role')";
    
                $result = $conn->query($sql);
            }
            //catch errors(failed to insert etc.)
            catch(Exception $e)
            {
                return false;
            }
    
            return true;
        }

        return false;

    }

    /*
    public function deleteUser($uid)
    {
        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        //query
        $sql = "DELETE FROM $dbtable WHERE u_id='$uid'";
        $result = $conn->query($sql);

        if($conn->affected_rows < 1)
        {
            return false;
        }

        return true;
    }
    */


    public function searchUser($uid)
    {
        //store output to return
        $output = '';

        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        //query
        $sql = "SELECT * FROM $dbtable WHERE u_name='$uid'";
        $result = $conn->query($sql);

        //if query returns 1 or more rows
        if ($result->num_rows > 0)
        {
            $row=$result->fetch_assoc();
            $output .= "<div class='AccountInfo'>";
            $output .= "<div class='AccountTextHolder'>";
            $output .= "User ID : " . $row["u_id"] . "<br>";
            $output .= "Username : " . $row["u_name"] . "<br>";
            $output .= "Role : " . $row["u_role"] . "<br>";
            $output .= "</div>";
            $output .= "</div>";
        }
        //if query returns 0 rows
        else
        {
            $output = "Account does not exists.";
        }

        return $output;

    }

    public function updateUser($uname, $new_uname, $pwd)
    {

        $result1 = true;
        $result2 = true;


        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        //check if uid exists
        $sql = "SELECT * FROM $dbtable WHERE u_name='$uname'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0)
        {
            return false;
        }

        if($pwd != null)
        {
            $sql = "UPDATE $dbtable SET u_password='$pwd'
                    WHERE u_name='$uname'";
            $result2 = $conn->query($sql);
        }
        

        if($new_uname != null)
        {
            $sql = "UPDATE $dbtable SET u_name='$new_uname'
                    WHERE u_name='$uname'";
            $result1 = $conn->query($sql);
        }


        if($result1 === TRUE && $result2 === TRUE)
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        
        return $result;

    }

    public function searchProfile($role)
    {
        //store output to return
        $output = '';

        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "profiles";
        $conn = $database->connectDB($dbtable);

        //query
        $sql = "SELECT * FROM $dbtable WHERE u_role='$role'";
        $result = $conn->query($sql);
        $output = '';

        //if query returns 1 or more rows
        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();

            $output .= "<div>";
            $output .= "Role : " . $row["u_role"] . "<br>";
            $output .= "</div>";
        }
        else
        {
            $output = 'Profile not found!';
        }

        return $output;
    }


    public function updateUserProfile($uname, $role)
    {
        $result1 = true;


        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        //check if uid exists
        $sql = "SELECT * FROM $dbtable WHERE u_name='$uname'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0)
        {
            return false;
        }

        //check if role exists
        $sql = "SELECT * FROM profiles WHERE u_role = '$role'";
        $result = $conn->query($sql);

        if($result->num_rows == 0)
        {
            return false;
        }


        //update role
        $sql = "UPDATE $dbtable SET u_role='$role'
                WHERE u_name='$uname'";
        $result1 = $conn->query($sql);



        if($result1 === TRUE)
        {
            return true;
        }
        
        return false;

    }

}


?>