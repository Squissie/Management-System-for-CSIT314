<?php

include "Admin.classes.php";

class AdminCreateUserProfileCtr
{
    //create users
    public function create($role)
    {
        //store message to output(success or fail)
        $message = '';

        //trim whitespaces on right and left of string
        $role = trim($role);

        //call entity to create user
        //create admin object
        $admin = new Admin();

        $output = $admin->createProfile($role);

        if($output === TRUE)
        {
            $message = 'Profile created Successfully.';
        }
        else
        {
            $message = 'Profile creation failed.';
        }
        return $message;
    }

}
?>