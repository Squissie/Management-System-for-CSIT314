<?php

include "Admin.classes.php";

    class AdminUpdateUserAccountCtr
    {
        public function validateUpdate($uname, $new_uname, $pwd)
        {
            $message = '';
    
            //trim whitespaces on right and left of string
            $uname = trim($uname);
            $new_uname = trim($new_uname);
            $pwd = trim($pwd);

            $admin = new Admin();
    
            
            $output = $admin->updateUser($uname, $new_uname, $pwd);
    
            if($output === TRUE)
            {
                $message = 'Account details have been updated.';
            }
            else
            {
                $message = 'Update failed.';
            }
    
            return $message;
        }

    }
?>