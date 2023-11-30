<?php 
require '../connect.php';
$max_date = $_GET['days'];
$sql = "select 
date_format(Ordered_Date, '%e-%m') as 'ngay', 
SUM(Total_Price) as 'doanh_thu' 
from orders 
where Status = 3 and date(Ordered_Date) >= CURDATE()-INTERVAL $max_date DAY
group by date_format(Ordered_Date, '%e-%m');";
$result = mysqli_query($connect,$sql);
$arr=[];
$today = date('d');
if($today <$max_date) {
	$get_day_last_month = $max_date - $today;
    $last_month = date('m', strtotime("-1 month"));
    $this_month = date('m');
    $last_month_date = date('Y-m-d', strtotime("-1 month"));
    $max_day_last_month = (new DateTime($last_month_date))->format('t');
    $start_day_last_month = $max_day_last_month - $get_day_last_month;
    for ($i = $start_day_last_month; $i <= $max_day_last_month; $i++) {
	$key = $i. '-' . $last_month;
		$arr[$key] = 0;
}
$start_day_last_month = 1;
} else {
	$start_day_last_month = $today - $max_date;
}
$this_month = date('m');
for ($i = $start_day_last_month+1; $i <= $today; $i++) {
	$key = $i. '-' . $this_month;
		$arr[$key] = 0;
}
foreach ($result as $each) {
	$arr[$each['ngay']] =(int)$each['doanh_thu'];
}
echo json_encode($arr);