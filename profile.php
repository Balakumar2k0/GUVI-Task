<?php
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->selectDatabase('Profile');
$collection = $database->selectCollection('profileinfo');

$name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $pincode = $_POST["pincode"];
    $nationality = $_POST["nationality"];

$document = [
    "name" => $name,
    "age" => (int)$age,
    "gender" => $gender,
    "dob" => $dob,
    "email" => $email,
    "contact" => $contact,
    "address" => [
        "address1" => $address1,
        "address2" => $address2,
        "state" => $state,
        "country" => $country,
        "pincode" => $pincode,
    ],
    "nationality" => $nationality,
];

$result = $collection->insertOne($document);

if ($result->getInsertedCount() > 0) {
    echo "Profile saved successfully!";
} else {
    echo "Error saving profile";
}
?>
