<?php

include "Admin.classes.php";

    class AdminSearchUserAccountCtr
    {
         
        public function search($uid)
        {
            #create admin object
            $admin = new Admin();

            #call search function in admin class(entity)
            $output = $admin->searchUser($uid);

            return $output;
        }


    }
?>