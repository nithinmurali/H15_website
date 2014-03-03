<?php
	$menu= file(mess-menu.txt);
	$day = date('w', strtotime($date));
	$menu_today=$menu[$day];
	$split_menu=strtok($menu_today,"*");
	echo $split_menu
?>
<?php
	$menu= file(mess-menu.txt);
	$day = date('w', strtotime($date));
	$menu_today=$menu[$day];
	$split_menu=strtok($menu_today,"*");
	$split_menu=strtok("*");
	echo $split_menu
?>	