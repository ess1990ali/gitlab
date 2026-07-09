<?php

include __DIR__ . "/../src/config.php";


function assertTest($testName, $result)
{
    if ($result) {
        echo "PASS: $testName\n";
    } else {
        echo "FAIL: $testName\n";
        exit(1);
    }
}


// Test 1 - Correct login

$email = "admin@test.com";
$password = "123456";

$found = false;

foreach ($users as $user) {

    if (
        $user['email'] == $email &&
        $user['password'] == $password
    ) {
        $found = true;
    }

}

assertTest(
    "Valid email and password",
    $found
);



// Test 2 - Wrong email

$email = "wrong@test.com";

$found = false;

foreach ($users as $user) {

    if ($user['email'] == $email) {
        $found = true;
    }

}


assertTest(
    "Invalid email rejected",
    !$found
);



// Test 3 - Wrong password

$email = "admin@test.com";
$password = "wrongpass";


$found = false;


foreach ($users as $user) {

    if (
        $user['email'] == $email &&
        $user['password'] == $password
    ) {
        $found = true;
    }

}


assertTest(
    "Invalid password rejected",
    !$found
);



// Test 4 - Password contains ;

$password = "123;456";


assertTest(
    "Password with ; character rejected",
    !str_contains($password, ";")
);


echo "All tests completed";