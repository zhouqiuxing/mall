<!--
"Demo Shopping Cart" is a non comprehensive e-commerce website developed only for academic purposes. This is just a demonstration of a simple shopping cart and it may contain bugs and errors.

Design and development by Rasan Samarasinghe. (c) 2015 All Rights Reserved.
-->
<?php
ini_set('display_errors', 1);

include "core.php";
include "dbconnection.php";

//if user logged in, redirect to home page
if (isset($_SESSION['uid'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Login</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css"/>
    <script src="js/myscript.js" language="javascript" type="text/javascript"></script>
<!--    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/mmm.js"></script>
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
            <h2>Login</h2>
            <?php

            //            print_r($_SERVER);
            //

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //$email = validateInput($_POST['txtEmail']);
                //$password = md5(validateInput($_POST['txtPassword']));
                print_r($_POST);
                echo "<br />";
                echo '<pre>';
                print_r($_FILES);
                print "</pre>";
                echo "<br />";
                print_r($_GET);
                $uploaddir = 'uploaded/';
                $uploadfile = $uploaddir . basename($_FILES['haaaa']['name']);

                echo '<pre>';
                if (move_uploaded_file($_FILES['haaaa']['tmp_name'], $uploadfile)) {
                    echo "File is valid, and was successfully uploaded.\n";
                } else {
                    echo "Possible file upload attack!\n";
                }

                echo "Here is some more debugging info.\n";
                print_r($_FILES);

                print "</pre>";

                // exit;
                $email = $_POST['txtEmail'];
                $password = $_POST['txtPassword'];
                $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";
                echo $sql;
                //exit;
                $result = $con->query($sql);
                if ($result->num_rows > 0) {

                    //login success
                    $row = $result->fetch_assoc();

                    $_SESSION["uid"] = $row['uid']; //set session
                    setcookie("uid", $row['uid'], time() + (86400 * 30), "/"); //set cookie

                    $_SESSION["username"] = $row['username']; //set session
                    setcookie("username", $row['username'], time() + (86400 * 30), "/"); //set cookie
                    header("Location: index.php");
                    //header("Location: http://www.google.com/");
                } else {
                    //login failed
                    // setcookie("uid","yyyy", time() + (2 * 30), "/");
                    echo "Invali0d login<br/>";
                }
            }

            error_log(print_r($_SERVER, true), 3, "logs/llll/my-errors.log");

            ?>


            <form id="form1" name="form1" method="post" action="login.php" enctype="multipart/form-data"
                  onsubmit="return validateLogin()">
                <p>
                    <label>Email:
                        <br/>
                        <input name="txtEmail" type="text" id="txtEmail"/>
                    </label>
                </p>
                <p>
                    <label>Password:
                        <br/>
                        <input name="txtPassword" type="password" id="txtPassword"/> >
                    </label>
                </p>
                <p>
                    <label>select pitvhre
                        <br/>
                        <input type="file" name="haaaa"/>
                    </label>
                </p>

                <p>
                    <input type="submit" name="Submit" value="Sub mit"/>

                </p>
            </form>
        </div>
    </div>
    <i id="tees">测试</i>
    <span id="ddd">ddddddd</span>
    <br/>
    <span id="ccc">ccccccc</span>
    <div class="footer">
        <?php

        showFooter();

        ?>
    </div>
</div>

<form action="http://118.190.6.78/sc.php" method="post">
    姓名：<input type="text" name="nam4"><br>
    电邮：<input type="text" name="email"><br>
    <input type="submit">
</form>

<script>
    $("#tees").click(function (e) {
        // alert("hhgg");

        var txtEmail = $("#txtEmail").val();

        var option = {
            url: "http://zsr.iirii.com/aqq/test.php?y=888",
            type: "get",
            data: {stt: "ggggg", txtEmail: txtEmail},
            success: function (result) {
                $("span#ccc").html(result);
            }
        };
        $.ajax(option);
    //     $("#tees").click(function (e) {
    //         // alert("hhgg");
    //
    //         var txtEmail = $("#txtEmail").val();
    //
    //         $.ajax({
    //             url: "http://zsr.iirii.com/aqq/test.php?yyy=888",
    //             type: "GET",
    //             data: {stt: "ggggg", txtEmail: txtEmail},
    //             success: function (result) {
    //                 $("span#ccc").html(result);
    //             }
    //         });


    });
    $(".navigation").mousemove(function (e) {
        //alert("hhg---g");
        $("span#ddd").text(e.pageX + ", " + e.pageY);
    });
</script>

</body>
</html>
