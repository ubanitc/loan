$xPub = "xpub6C3jVD89yERqGxkMRTpxDqPqsrVGudpjwFSye8SSFjiuzvgcaKXibWiBbQtB5jDaZg3j47svapQpbJBXaryWdcyZEAm7f4dKtvBCZkP4RbX";
    $api = "2f205569-b3ca-4078-beac-1562d6cd0574";
    $callback = "https://loan-blockchain.herokuapp.com";
    $rootUrl = "https://api.blockchain.info/v2/receive";
    $gap_limit = 1000000000;
    $parameters = "xpub=".$xPub."&callback=".urlencode($callback)."&key=".$api."&gap_limit=".$gap_limit;

    $object = json_decode(file_get_contents($rootUrl."?".$parameters, true));

    echo "send payment to ".$object->address;

    $sql = "INSERT into blockchain (address) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$object->address]);
