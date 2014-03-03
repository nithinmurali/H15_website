 <?php 
	chmod( '../img/posters', 0777 );
	$path="../img/posters/" . $_REQUEST['cat'].'/';
	
	if(!empty($_GET['delete_file'])){
		foreach($_GET['delete_file'] as $val) {
		unlink($path . $val) or die(' cant delete');
		echo 'sucessfull.......  ' . $path . $val ;
	}
	}else
	{
		die("cant delete :(");
	}
?>