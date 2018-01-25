<?php
ini_set('display_errors', 1);

include "core.php";

include "dbconnection.php";
//include "styles/hahah.php";
//print_r($_COOKIE);
//
//echo "=================";
//
//print_r($_SESSION);
//


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>address</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div class="page">
    <div class="header">
        <?php

        showHeading();

        ?>

    </div>
    <div class="wrapper">
        <div class="navigation">
            <?php

            mainMenu();

            ?>
        </div>
        <div class="contents">
            <h2>address!</h2>
            <?php

//            delete product
            if(isset($_GET['ttt']) ){
            //  $file = "/" . validateInput($_GET['zip']);
                $stmtdelete = $con->prepare("DELETE FROM address WHERE pid=?");
               // $stmtdelete->bind_param("i", validateInput($_GET['deletepid']));
                $stmtdelete->bind_param("i",$_GET['ttt']);
                if($stmtdelete->execute()){
                    echo "Product deleted successfully!<br/>";
                }else{
                    echo "Error deleting product<br/>";
                    printf("Error: %s.\n", $stmtdelete->error);
                }
            }

            ?>
            <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tr>
                    <th scope="col">产品 ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">addresss</th>
                    <th scope="col">number</th>
                    <th scope="col">zip</th>
                    <th scope="col">uid</th>
                    <th scope="col" colspan="2">Options</th>
                </tr>
                <?php



                //show product items
                $sql = "SELECT * FROM address WHERE uid=". $_SESSION["uid"];
                echo $sql;
                echo "<br/>";
                $result = $con->query($sql);
                print_r($con->error);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>". $row['pid'] . "</td>";
                        echo "<td>". $row['name'] . "</td>";
                        echo "<td>". $row['address'] . "</td>";
                        echo "<td>". $row['number'] . "</td>";
                        echo "<td>". $row['zip'] . "</td>";
                        echo "<td>". $row['uid'] . "</td>";
                        echo "<td><a href=\"address.php?ttt=" . $row['pid']  . "\" onclick=\"return confirmDelete()\">Delete</a></td>";
   //                     echo "<td><a href=..\"editproduct.php?editpid=" . $row['pid'] . "\">Edit</a></td>";
                        echo "</tr>";
                    }
                }else{
                    echo "<tr><td colspan=\"6\">No records found!</td></tr>";
                }

                ?>
            </table>

        </div>
    </div>
    <div class="footer">
        <?php

        showFooter();

        ?>
    </div>
</div>
</body>
</html>

/**
 * Created by PhpStorm.
 * User: yafei
 * Date: 2018-01-21
 * Time: 18:10
<!-- */-->