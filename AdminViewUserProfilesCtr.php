<?php

include "Admin.classes.php";

class AdminViewUserProfilesCtr
{
    //view users
    public function viewAll()
    {
        //create Admin User
        $admin = new Admin();
        
        //call view functions in admin class
        $output = $admin->getAllProfiles();
        
        //returns array of users and details
        return $output;
    }

}
    
?>