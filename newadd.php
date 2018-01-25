<?php
ini_set('display_errors', 1);

include "core.php";
include "dbconnection.php";

//if user not logged in, redirect to home page
if (!isset($_SESSION['uid'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>new add</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css"/>
    <script src="js/myscript.js" language="javascript" type="text/javascript"></script>
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
            <h2>newadd</h2>
            <?php

            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $name = validateInput($_POST['txtName']);
                $address = validateInput($_POST['txtDescription']);
                $number = validateInput($_POST['txtnumber']);
                $zip = validateInput($_POST['txtPrice']);

//                $uploadpath = "../images/products/" . basename($_FILES['fileImage']['name']);
//                $imagepath = "images/products/" . basename($_FILES['fileImage']['name']);
//                $temppath = $_FILES['fileImage']['tmp_name'];
//                $filesize = $_FILES['fileImage']['size'];

//                $stmt = $con->prepare("INSERT INTO address (name, address, number, zip) VALUES (?, ?, ?, ?)");
//                $stmt->bind_param("sssd", $name, $address, $number, $zip);
//                echo "<pre>";
//                print_r($_FILES);
//                echo "</pre>";}

                $stmt = $con->prepare("INSERT INTO address (name, address, number,zip,uid) VALUES (?, ?, ?, ?,?)");
                print_r($con->error);
                if($stmt){

                    $stmt->bind_param("sssds", $name, $address, $number, $zip, $_SESSION['uid']);
                    echo "<pre>";
                    print_r($_FILES);
                    echo "</pre>";
//if (isset($_SESSION['uid'])) {
//            if ($_SERVER['REQUEST_METHOD'] == "POST") {
//                    $stmt = $con->prepare("INSERT INTO address (uid) VALUES (?)");
//                   $stmt->bind_param("i", $_SESSION['uid']);
////
////
//                if ($filesize > 2000000 || !getimagesize($temppath)) {
//                    echo "Select an image file less than 2Mb<br/>";
//                } else {
                    if ($stmt->execute()) {
                        header("Location: address.php");
//                    if ($stmt->execute() && move_uploaded_file($temppath, $uploadpath)) {
                        echo "Product added successfully!<br/>";
                    } else {
                        echo "Failed to add address<br/>";
                        print_r($stmt->error);
                    }



            }
            else{
                echo 1111;}
            }


            ?>
            <form action="newadd.php" method="post" enctype="multipart/form-data" name="form1" id="form1"
                  onsubmit="return validateAddProduct()">
                <p>
                    <label>name:
                        <br/>
                        <input name="txtName" type="text" id="txtName"/>
                    </label>
                </p>
                <p>
                    <label>address:
                        <br/>
                        <input name="txtDescription" type="text" id="txtDescription"/>
                    </label>
                </p>

                <p>
                    <label>number:
                        <br/>
                        <!--                        <input name="fileImage" type="text" id="fileImage"/>-->
                        <input name="txtnumber" type="text" id="txtnumber"/>
                    </label>
                </p>

                <p>
                    <label>zip:
                        <br/>
                        <input name="txtPrice" type="text" id="txtPrice"/>
                    </label>
                </p>
                <p>
                    <input type="submit" name="Submit" value="Submit"/>
                </p>
            </form>
            <p>
                <input type="submit" name="Submit" value="Submit"/>
            </p>
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