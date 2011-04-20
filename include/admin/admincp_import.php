<?php
	print_r($_FILES);
	print_r($_POST);
	if(0)
	{
		require_once '../../import/reader.php';
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('utf-8'); 
		$filename = $_POST['filename'];
		$data->read('$filename');
		echo '<table border=1>';
		for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) 
		{
			echo '<tr>';
			for ($j=1;$j<=$data->sheets[0]['numCols'];$j++)echo '<td>'.$data->sheets[0]['cells'][$i][$j].'</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
?> 