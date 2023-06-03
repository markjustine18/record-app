<?php
require 'config/config.php';
require 'config/db.php';

require_once 'vendor/autoload.php';

use Faker\Factory;
$faker = Factory::create('en_PH');

for ($id = 50; $id <= 210; $id++) {
    $name = $faker->company;
    $contactnum = $faker->numerify('433-####');
    $email = $faker->email;
    $address = $faker->address;
    $city = 'Puerto Princesa';
    $country = 'Philipiness';
    $postal = '5300';

    $office = [
        'name' => $name,
        'contactnum' => $contactnum,
        'email' => $email,
        'address' => $address,
        'city' => $city,
        'country' => $country,
        'postal' => $postal,
    ];

    $query = "INSERT INTO office (name, contactnum, email, address, city, country, postal) VALUES ('{$office['name']}', '{$office['contactnum']}', '{$office['email']}', '{$office['address']}', '{$office['city']}', '{$office['country']}', '{$office['postal']}')";
    if ($conn->query($query) === false) {
        echo 'Something wrong in connection.' . $conn->error;
    }
}
$conn->close();
?>
