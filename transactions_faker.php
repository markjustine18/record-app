<?php
require 'config/config.php';
require 'config/db.php';

require_once 'vendor/autoload.php';

use Faker\Factory;
$faker = Factory::create('en_PH');

for ($id = 50; $id <= 210; $id++) {
    $employee_id = $faker->numberBetween(1, 1000);
    $office_id = $faker->numberBetween(1, 55);
    $datelog = $faker->dateTime->format('Y-m-d H:i:s');
    $action = ['IN', 'OUT', 'COMPLETE'];
    $myAction = $faker->randomElement($action);
    $remarks = ['Not Signed', 'For Approval', 'Approved', 'Rejected'];
    $myRemarks = $faker->randomElement($remarks);
    $documentcode = $faker->numerify('DC-####');

    $transaction = [
        'employee_id' => $employee_id,
        'office_id' => $office_id,
        'datelog' => $datelog,
        'action' => $myAction,
        'remarks' => $myRemarks,
        'documentcode' => $documentcode,
    ];

    $query = "INSERT INTO transaction (employee_id, office_id, datelog, action, remarks, documentcode) VALUES ('{$transaction['employee_id']}', '{$transaction['office_id']}', '{$transaction['datelog']}', '{$transaction['action']}', '{$transaction['remarks']}', '{$transaction['documentcode']}')";
    if ($conn->query($query) === false) {
        echo 'Something wrong in connection.' . $conn->error;
    }
}
$conn->close();
?>
