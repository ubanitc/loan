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

   
$transaction_hash = $_GET['transaction_hash'];
$value_in_satoshi = $_GET['value'];
$value_in_btc = $value_in_satoshi / 100000000;





//Add the invoice to the database
$stmt = $pdo->prepare("INSERT INTO blockchain (address, userid) values(?, ?)");
$stmt->execute($transaction_hash, $value_in_btc);

if($stmt->execute()) {
   echo "*ok*";
}


?>

