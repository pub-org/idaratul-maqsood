<?php 

	$iframePdfSrc = 'pdfs/noFileFound.pdf'; 
	if(isset($_GET['pdfSrc'])){
		$iframePdfSrc = $_GET['pdfSrc'] . '/preview?usp=drivesdk' . 
				'&pid=explorer&efh=false&a=v&chrome=false&embedded=true'; 
	}

	echo '<iframe style="padding:0px; margin:-8px; " 
			src="' . $iframePdfSrc . '" 
			width="100.9%" height="99.4%" 
		/>' ; 

?> 