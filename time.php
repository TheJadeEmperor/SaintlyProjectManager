<?php
/*
$one_day = 60 * 60 * 24;
$two_days = 60 * 60 * 24 * 2;
$three_days = 60 * 60 * 24 * 3;

echo '<br>Time right now: '.time();
echo '<br>1 day from now: '.(time() + $one_day);
echo '<br>2 days from now: '.(time() + $two_days);
echo '<br>3 days from now: '.(time() + $three_days);
echo '<br>1 day before: <input type=text value="'.(time() - $one_day).'" onclick="select()">';

echo strtotime('2014-01-22');
if(time() <= strtotime('2014-01-23')) {
    echo 'true';
}
*/

$time_start = $_POST['time_start'];

$d = new DateTime( $time_start );
echo $d->format( 'Y-m-d H:i:s' ), "\n";

$time_start = date('Y-m-d H:i:s', strtotime($time_start));

?>

<form method="post">
<input type="text" name="time_start" />
<input type="submit" />
</form>

sql format: <?=$time_start?>