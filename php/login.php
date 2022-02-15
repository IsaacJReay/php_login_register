<html>
<body>
    <form name="myform" action="../index.php">
    <input type="hidden" id="message" name="message" value="
        <?php

            // echo "username:".$_POST["username"];
            // echo "password:".$_POST["password"];

            $servername = "localhost";
            $db_username = "root";
            $db_password = "";
            $db_name = "chheangmaiDB";


            try {
                    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "Connected successfully";  
            }   
            catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
            }
            
            $sql_statement = $conn->prepare("SELECT EmployeeID,UserName FROM tblLogin WHERE UserName=? AND PassWord=? LIMIT 1");
            $sql_statement->bindParam(1, $_POST["username"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(2, $_POST["password"], PDO::PARAM_STR, 50);
            $sql_statement->execute();
            $row = $sql_statement->fetch(PDO::FETCH_ASSOC);

            if(! $row) {
                echo 'Login Failed';
            }
            else {
                echo 'Login Success';
            }



            $conn = null;
        ?>
    ">
    
    </form>

    <script type="text/javascript">
        document.myform.submit();
    </script>

</body>
</html>
