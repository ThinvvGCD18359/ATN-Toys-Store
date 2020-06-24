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
<h1>LOGIN</h1>
<h2>Enter data into table</h2>
<ul>
    <form name="Login" action="Login.php" method="POST" >
<li>Username:</li><li><input type="text" name="username" /></li>
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
        "host=ec2-34-206-31-217.compute-1.amazonaws.com;port=5432;user=ntdsfcrregsykn;password=35fabda0ca47320fbf2f48dcab008c70a946d9b5207b243aaaa7fce945928503;dbname=d6veukljhn49ai",
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
$sql = "SELECT username, password FROM customer WHERE username='username'";
$stmt = $pdo->prepare($sql);
       
        if($stmt->execute() == TRUE) {
        echo "Xin chào <b>" . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";
        die();
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
        
        }
?>        
</body>
</html>