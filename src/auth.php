<?php

function login($email, $password, $users)
{

    foreach($users as $user){

        if(
            $user['email'] == $email &&
            $user['password'] == $password
        ){
            return true;
        }

    }

    return false;

}

?>