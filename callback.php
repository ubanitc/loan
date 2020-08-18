<?php
    $host = "us-cdbr-east-02.cleardb.com";
$username = "bd698371ac76ff";
$password = "2d522430";
$dbname = "heroku_cdd723afa6c6aef";

$dsn = ("mysql:host=".$host.";dbname=".$dbname);

try{
    $pdo = new pdo($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
        echo "connection error:".$e->getMessage();
}

   


$sql = "SELECT * FROM blockchain";
$stmt = $pdo->query($sql);

$thise = $stmt->fetchAll();

foreach($thise as $thiss){
    echo $thiss->address;
    
}



$sql = "INSERT INTO blockchain (address, userid) VALUES (?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['monkey','baboon']);
?>

