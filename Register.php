<!DOCTYPE html>
<html>
    <head>
<title>Insert data to PostgreSQL with php - creating a simple web application</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body>
<h1>REGISTER</h1>
<h2>Enter data into table</h2>
<ul>
    <form name="Register" action="Register.php" method="POST" >
<li>Username:</li><li><input type="text" name="username" /></li>
<li>Email:</li><li><input type="text" name="email" /></li>
<li>Address:</li><li><input type="text" name="address" /></li>
<li>Password:</li><li><input type="text" name="password" /></li>
<li><input type="submit" /></li>
</form>
</ul>

<?php

if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-34-206-31-217.compute-1.amazonaws.com;port=5432;user=ntdsfcrregsykn;password=35fabda0ca47320fbf2f48dcab008c70a946d9b5207b243aaaa7fce945928503",
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

//Khởi tạo Prepared Statement
//$stmt = $pdo->prepare('INSERT INTO student (stuid, fname, email, classname) values (:id, :name, :email, :class)');

//$stmt->bindParam(':id','SV03');
//$stmt->bindParam(':name','Ho Hong Linh');
//$stmt->bindParam(':email', 'Linhhh@fpt.edu.vn');
//$stmt->bindParam(':class', 'GCD018');
//$stmt->execute();
//$sql = "INSERT INTO student(stuid, fname, email, classname) VALUES('SV02', 'Hong Thanh','thanhh@fpt.edu.vn','GCD018')";
$sql = "INSERT INTO customer(username, email, address, password)"
        . " VALUES('[username]','[email]','[address]','[password]')";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null([username])) {
   echo "Username must be not null";
 }
 else
 {
    if($stmt->execute() == TRUE){
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: ";
    }
 }
?>
</body>
</html>