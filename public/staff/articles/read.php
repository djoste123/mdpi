<?php
require_once('../../../private/initialize.php');

$myfile = fopen("xml_test.xml", "r") or die("Unable to open file!");
$return =  fread($myfile,filesize("xml_test.xml"));
//echo $return;
fclose($myfile);
$xml=simplexml_load_string($return) or die("Error: Cannot create object");

$servername = DB_SERVER;
$username = DB_USER;
$password = DB_PASS;
$dbname = DB_NAME;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($xml as $rec){
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO articles(doi, title, abstract, pub_date)
    VALUES (:doi, :title, :abstract, :pub_date)");
    $stmt->bindParam(':doi', $rec->doi);
    $stmt->bindParam(':title', $rec->title);
    $stmt->bindParam(':abstract', $rec->{'abstract'});
    $stmt->bindParam(':pub_date', $rec->publicationDate);
    
    $stmt->execute();
    
    $id = $conn->lastInsertId();
    
    }


    echo "New records created successfully";

        //handle the rest action here

    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
//print_r($xml);

?>
