<?php
require 'vendor/autoload.php'; // Load MongoDB PHP Library

try {
    // Connect to MongoDB Atlas with your password
    $mongoClient = new MongoDB\Client("mongodb://roverspc1:Abomk_1234@cluster0-shard-00-00.jakqu.mongodb.net:27017,cluster0-shard-00-01.jakqu.mongodb.net:27017,cluster0-shard-00-02.jakqu.mongodb.net:27017/?replicaSet=atlas-10770w-shard-0&ssl=true&authSource=admin&retryWrites=true&w=majority&appName=Cluster0");

    // Select Database and Collection
    $database = $mongoClient->portfolio;  // Database Name
    $collection = $database->contacts;    // Collection Name

    // Get Form Data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validate Data
    if (empty($name) || empty($email) || empty($message)) {
        die("All fields are required.");
    }

    // Insert Data into MongoDB
    $insertResult = $collection->insertOne([
        'name' => $name,
        'email' => $email,
        'message' => $message,
        'submitted_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    if ($insertResult->getInsertedCount() > 0) {
        echo "Message saved successfully!";
    } else {
        echo "Error saving message.";
    }

} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
