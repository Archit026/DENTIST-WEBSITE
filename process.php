<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");

$database = $client->selectDatabase('USCLINIC');
$collection = $database->selectCollection('patient');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['first']) && isset($_POST['last']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['problem']) && isset($_POST['date'])){
        $firstName = $_POST['first'];
        $lastName = $_POST['last'];
        $age = (int)$_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $number = (int)$_POST['number'];
        $problem = $_POST['problem'];
        $date = $_POST['date'];

        $insertOneResult = $collection->insertOne([
            'first'=>$firstName,
            'last'=>$lastName,
            'age'=>$age,
            'gender'=>$gender,
            'email'=>$email,
            'number'=>$number,
            'problem'=>$problem,
            'date'=>$date

        ]);
        echo "Appointment Succesfull.";
    }
}
?>