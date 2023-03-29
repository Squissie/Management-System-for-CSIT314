<?php

include "Admin.classes.php";

    class AdminSearchUserProfileCtr
    {
         
        public function search($role)
        {
            #create admin object
            $admin = new Admin();

            #call search function in admin class(entity)
            $output = $admin->searchProfile($role);

            return $output;
        }


    }
?>