<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <h1>LOGIN</h1>
        <ul>
        <form name="Login" action="Login.php" method="POST" >
            <table cellpadding='0' cellspacing='0' border='1'>
                <tr>
                    <td>
                        Username :
                    </td>
                    <td>
                        <input type='text' name='username' />
                    </td>
                </tr>
                <tr>
                    <td>
                        Password :
                    </td>
                    <td>
                        <input type='password' name='password' />
                    </td>
                </tr>
            </table>
            <input type='submit' value='Login' />
            <a href='Register.php' title='Regiter'>Register</a>
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
$sql = "SELECT username, password FROM customer";
if (mysql_num_rows($sql) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    $stmt = $pdo->prepare($sql);
    if (Username != 'username') {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    if (Password != 'password') {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    else
 {
    if($stmt->execute() == TRUE){
        echo "Login successfully.";
    } else {
        echo "Please try again ";
    }
 }
 
?>
    </body>
</html>