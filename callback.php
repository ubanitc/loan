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

   
$value_in_satoshi = isset($_GET['value']);
$transaction_hash = isset($_GET['transaction_hash']);
$invoice_id = isset($_GET['invoice_id']); //invoice_id is passed back to the callback URL

$value_in_btc = $value_in_satoshi / 100000000;



$sql = "INSERT INTO blockchain (address,amount,userid) VALUES (?,?,?)";
$stmt =$pdo->prepare($sql);
$monkey = $stmt->execute([$invoice_id,$value_in_btc,$transaction_hash]);


if($monkey) {
   echo "*ok*";
   
}

echo $transaction_hash;
echo $value_in_btc;

?>

