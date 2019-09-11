<?php
function remove_dir($folder){
	if(!rmdir($folder)) {
		foreach (scandir($folder) as $item) {
			if ($item == '.' || $item == '..') {
				continue;
			}else{
				if(is_dir($folder.'/'.$item)){
					remove_dir($folder.'/'.$item);
				}
				echo $item. "<br>";
				unlink($folder .'/'.$item);
			}
		}
		rmdir($folder);
	}
}
?>