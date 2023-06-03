<?php
require 'config/config.php';
require 'config/db.php';

require_once 'vendor/autoload.php';

use Faker\Factory;
$faker = Factory::create('en_PH');

for ($id = 7; $id <= 1000; $id++) {
    $lastname = $faker->lastName;
    $firstname = $faker->firstName;
    $office_id = $faker->numberBetween(1, 6);
    $address = [
        'Bgry. San Pedro',
        'Bgry. Tiniguiban',
        'Brgy. San Jose',
        'Bgry. San Manuel',
        'Bgry. Santa Monica',
        'Bgry. Sicsican',
        'Brgy. Irawan',
    ];
    $myAddress = $faker->randomElement($address);

    $employee = [
        'lastname' => $lastname,
        'firstname' => $firstname,
        'office_id' => $office_id,
        'address' => $myAddress,
    ];

    $query = "INSERT INTO employee (lastname, firstname, office_id, address) VALUES ('{$employee['lastname']}', '{$employee['firstname']}', {$employee['office_id']}, '{$employee['address']}')";
    if ($conn->query($query) === false) {
        echo 'Something wrong in connection.' . $conn->error;
    }
}
$conn->close();
?>
