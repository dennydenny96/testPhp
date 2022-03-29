<?php

$_fp = fopen ("php://stdin","r");
fscanf($_fp,"%d %d",$n,$k);
fscanf($_fp,"%d %d",$rQueen,$cQueen);

$up = $n - $rQueen;
$down = $rQueen - 1;

$right = $n - $cQueen;
$left = $cQueen - 1;

$downLeft = min($down, $left);
$downRight = min($down, $right);
$upLeft = min($up, $left);
$upRight = min($up, $right);

for($a0 = 0; $a0 < $k; $a0++){
	fscanf($_fp,"%d %d",$rObstacle,$cObstacle);
	if ($rObstacle === $rQueen && $cObstacle < $cQueen) {
		// left
		$left = min($left, $cQueen-$cObstacle-1);
	} elseif ($rObstacle === $rQueen && $cObstacle > $cQueen) {
		// right
		$right = min($right, $cObstacle-$cQueen-1);
	} elseif ($cObstacle === $cQueen && $rObstacle < $rQueen) {
		// down
		$down = min($down, $rQueen - $rObstacle-1);
	} elseif ($cObstacle === $cQueen && $rObstacle > $rQueen) {
		// up
		$up = min($up, $rObstacle- $rQueen-1);
	} elseif ($cObstacle-$cQueen === $rObstacle-$rQueen && $cObstacle < $cQueen) {
		// downleft
		$downLeft = min($downLeft, $cQueen - $cObstacle-1);
	} elseif ($cObstacle-$cQueen === $rObstacle-$rQueen && $cObstacle > $cQueen) {
		// upright
		$upRight = min($upRight, $cObstacle - $cQueen-1);
	} elseif ($cObstacle-$cQueen === -1*($rObstacle-$rQueen) && $cObstacle < $cQueen) {
		// upleft
		$upLeft = min($upLeft, $cQueen-$cObstacle - 1);
	} elseif ($cObstacle-$cQueen === -1*($rObstacle-$rQueen) && $cObstacle > $cQueen) {
		// downright
		$downRight = min($downRight, $cObstacle - $cQueen - 1);
	}
}
echo $up+$down+$left+$right+$downLeft+$downRight+$upLeft+$upRight . "\n";

?>