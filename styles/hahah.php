<?php
/**
 * // * Created by PhpStorm.
 * // * User: yafei
 * // * Date: 2018-01-03
 * // * Time: 19:26
 * // */
////echo "<p>Copyright © 2006-" . date("Y") . " W3School.com.cn</p>";
////echo "<p>Copyright © 2006-" . date("Y- m-d H:i:s",1414986049) . "W3School.com.cn</p>";
//$nextyear  = mktime(date("H"), 0, date("s"), date("m"),   date("d")+13,   date("Y"));
//echo $nextyear;
//$today = date("Y-m-d H:i:s",$nextyear);
//$tYday = date("Y-m-j H:i:s",$nextyear+60*60*24*30);
////$today = date("Y-m-d ",$nextyear);
//echo  "<br/>";
//echo $today;
//echo  "<br/>";
//echo $tYday;
//?>
<?php
$HHH= strtotime("now");
echo date("Y-m-d H:i:s",$HHH);

echo "<br/>";
echo strtotime("10 September 2000"), "\n";
echo "<br/>";
echo strtotime("+1 day"), "\n";
echo "<br/>";
echo strtotime("+1 week"), "\n";
echo "<br/>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo "<br/>";
echo strtotime("next Thursday"), "\n";
echo "<br/>";
echo strtotime("last Monday"), "\n";
echo "<br/>";
?>