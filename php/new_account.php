<html>
<body>
    <form name="myform" action="../index.php">
    <input type="hidden" id="message" name="message" value="
        <?php

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
            
            $sql_statement = $conn->prepare(
                "INSERT INTO tblLogin (
                    EmployeeName,
                    UserName,
                    PassWord,
                    UserType,
                    Role,
                    Company,
                    JobTitle,
                    Email,
                    Phone,
                    HomePhone,
                    Address,
                    City,
                    StateProvince,
                    ZipPostalCode,
                    CountryRegion,
                    Photo)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"
            );
            $sql_statement->bindParam(1, $_POST["em_name"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(2, $_POST["u_name"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(3, $_POST["u_password"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(4, $_POST["u_type"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(5, $_POST["u_role"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(6, $_POST["u_company"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(7, $_POST["jobtitle"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(8, $_POST["email"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(9, $_POST["u_phone"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(10, $_POST["h_phone"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(11, $_POST["address"], PDO::PARAM_STR, 100);
            $sql_statement->bindParam(12, $_POST["u_city"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(13, $_POST["state"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(14, $_POST["zip"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(15, $_POST["country"], PDO::PARAM_STR, 50);
            $sql_statement->bindParam(16, $_POST["photo_file"], PDO::PARAM_LOB);
            $sql_statement->execute();
            echo "Register Success";
            $conn = null;
        ?>
    ">
    
    </form>

    <script type="text/javascript">
        document.myform.submit();
    </script>

</body>
</html>
