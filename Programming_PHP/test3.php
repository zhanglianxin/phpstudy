<?php
// 一次对多个数组进行排序
$names = array("Tom", "Dick", "Harriet", "Brenda", "Joe");
$ages = array(25, 35, 29, 35, 35);
$zips = array(80052, '02140', 90210, 64141, 80522);

array_multisort($ages, SORT_ASC, $zips, SORT_DESC, $names, SORT_ASC);
for ($i = 0; $i < count($names); $i++) { 
    echo "{$names[$i]}, {$ages[$i]}, {$zips[$i]}<br>";
}
?>
<?php
// 翻转数组
$u2h = array('gnat' => "/home/staff/nathan", 'frank' => "/home/action/frank", 
    'petermac' => "/home/staff/petermac", 'ktatroe' => "/home/staff/kevin");
$h2u = array_flip($u2h);
$user = $h2u["/home/staff/kevin"];
echo $user; // ktatroe
?>
<?php
// 随机排序
$weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
shuffle($weekdays);
echo "<br>";
print_r($weekdays);
?>
