<?php
	chmod($_REQUEST['fileused'], 0777 );
	$file=fopen($_REQUEST['fileused'],"w") or die("internal file error");
	for($x=1;$x<8;$x++)
	{	if($_POST['element_D'.$x.'_1'] != "" && $_POST['element_D'.$x.'_2'] != ""){
			$l1=trim($_POST['element_D'.$x.'_1']);
			$l2=trim($_POST['element_D'.$x.'_2']);
			fputs($file,$l1.";".$l2.";");
			
		}
	}
	fclose($file);
	echo('saved....');
	header('Refresh: 2 ;http://gymkhana.iitb.ac.in/~hostel15/council/index.php');
?>	