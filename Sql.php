
<html>
<head>
<Title>Azure SQL Database - PHP Website</Title>
</head>
<body>
<form method="post" action="?action=add" enctype="multipart/form-data" >
Product ID <input type="text" name="ProductID" id="ProductID"/></br>
Product Name <input type="text" name="ProductName" id="ProductName"/></br>
Product Price <input type="text" name="ProductPrice" id="ProductPrice"/></br>
<input type="submit" name="submit" value="Submit" />
</form>

<?php
/*Connect using SQL Server authentication.*/
$serverName = "tcp:syba-sql.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "SYBA-Production",
    "UID" => "enfra-dev",
    "PWD" => "3nfr@5y5"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false)
    {
    die(print_r(sqlsrv_errors() , true));
    }

if (isset($_GET['action']))
    {
    if ($_GET['action'] == 'add')
        {
        /*Insert data.*/
        $insertSql = "INSERT INTO SYBA-Products (ProductID,ProductName,ProductPrice)
VALUES (?,?,?,?)";
        $params = array(&$_POST['ProductID'], &$_POST['ProductName'], &$_POST['ProductPrice']);
        $stmt = sqlsrv_query($conn, $insertSql, $params);
        if ($stmt === false)
            {
            /*Handle the case of a duplicte e-mail address.*/
            $errors = sqlsrv_errors();
            if ($errors[0]['code'] == 2601)
                {
                echo "";
                }

            /*Die if other errors occurred.*/
              else
                {
                die(print_r($errors, true));
                }
            }
          else
            {
            echo "Insert Complete.</br>";
            }
        }
    }

    ?>
</body>
</html>
