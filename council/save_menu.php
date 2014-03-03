<?php
	
	chmod( '../mess-menu.messtxt', 0777 );
	$file=fopen("../mess-menu.messtxt","wt") or die("internal file error");
	for($x=1;$x<8;$x++)
	{	
		$line= "<p><strong> Breakfast :</strong>".$_POST['element_D'.$x.'_1']."	</p><p><strong> Lunch : </strong>".$_POST['element_D'.$x.'_2']."</p> * <p><strong> Tiffin :</strong> ".$_POST['element_D'.$x.'_3']."		</p><p><strong> Dinner :</strong>	".$_POST['element_D'.$x.'_4']."</p>";
		fputs($file,$line);
		fputs($file,"\n");
	}
	fclose($file);
	echo('saved....');
	header('Refresh:2;http://gymkhana.iitb.ac.in/~hostel15/council/index.php');
?>	