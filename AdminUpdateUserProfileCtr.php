<?php

include "Admin.classes.php";

    class AdminUpdateUserProfileCtr
    {
        public function update($uname, $role)
        {
            $message = '';
    
            //trim whitespaces on right and left of string
            $uname = trim($uname);
            $role = trim($role);

            $admin = new Admin();
    
            
            $output = $admin->updateUserProfile($uname, $role);
    
            if($output === TRUE)
            {
                $message = 'Profile has been updated.';
            }
            else
            {
                $message = 'Update failed.';
            }
    
            return $message;
        }

    }
?>