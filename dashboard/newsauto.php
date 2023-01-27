<?php
  
  		$timezone = "Asia/Manila";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$cur_date = date("Y-m-d H:i:s");

 	    $result= mysqli_query($conn,"select * from news") or die (mysql_error());
		while ($row = mysqli_fetch_array ($result) ){
			$autopost=$row['autopost'];
			$news_id=$row['news_id'];
						
			if($autopost<$cur_date	){
				            $result= mysqli_query($conn,"select * from news where news_id='$news_id'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								$post=$row['post'];
							}
							
							
						    mysqli_query($conn,"update news set post='Yes' where news_id='$news_id'")or die(mysql_error());
							
						  
							
							echo "<script>window.location='news.php'</script>";
				
				
				
			}

		}
		

  
?>