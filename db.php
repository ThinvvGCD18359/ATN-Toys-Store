<?php

if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-52-0-155-79.compute-1.amazonaws.com;port=5432;user=uhkywoqfpojzhn;password=e9df249d095cd9b696dc315aa505ef07cfa1d5019e593b3c1a1dd2f9c99b6482;dbname=d9r7n9bel5srhd",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

if($pdo === false){
     echo "ERROR: Could not connect Database";
}
?>