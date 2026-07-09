<?php

use PHPUnit\Framework\TestCase;


require_once __DIR__.'/../src/auth.php';


class LoginTest extends TestCase
{


    private $users = [

        [
            "name"=>"Ahmed",
            "email"=>"ahmed@test.com",
            "password"=>"123456"
        ]

    ];



    public function testCorrectEmailAndPassword()
    {

        $result = login(
            "ahmed@test.com",
            "123456",
            $this->users
        );


        $this->assertTrue($result);

    }



    public function testWrongEmail()
    {

        $result = login(
            "wrong@test.com",
            "123456",
            $this->users
        );


        $this->assertFalse($result);

    }




    public function testWrongPassword()
    {

        $result = login(
            "ahmed@test.com",
            "wrongpassword",
            $this->users
        );


        $this->assertFalse($result);

    }



    public function testPasswordWithSpecialCharacter()
    {

        $result = login(
            "ahmed@test.com",
            "123;456",
            $this->users
        );


        $this->assertFalse($result);

    }


}