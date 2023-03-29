<?php

include "Admin.classes.php";

    class AdminCreateUserAccountCtr
    {
        //create users
        public function create($name, $uname, $pwd, $role)
        {
            //store message to output(success or fail)
            $message = '';

            //trim whitespaces on right and left of string
            $name = trim($name);
            $uname = trim($uname);
            $password = trim($pwd);
            $role = trim($role);

            //call entity to create user
            //create admin object
            $admin = new Admin();

            $output = $admin->createUser($name, $uname, $pwd, $role);

            if($output === TRUE)
            {
                $message = 'Account created Successfully.';
            }
            else
            {
                $message = 'Account creation failed.';
            }
            return $message;
        }

    }
?>