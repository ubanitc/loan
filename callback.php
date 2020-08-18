<?php
    $host = "us-cdbr-east-02.cleardb.com";
$username = "bd698371ac76ff";
$password = "2d522430";
$dbname = "heroku_a04909d9b1187cf";

$dsn = ("mysql:host=".$host.";dbname=".$dbname);

try{
    $pdo = new pdo($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
        echo "connection error:".$e->getMessage();
}


if($pdo){
    echo "connection succesful";
}else{
    echo "could not connect";
}



echo "will this work?" ;
?>
