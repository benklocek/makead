<?php
include 'banner-class.php';
$banner = New BPLBanner();
foreach($_GET as $n=>$v){
	$banner->Set($n, $v);
}
//var_dump($banner);
echo $banner->Display();
?>