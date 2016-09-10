
<?php
	// require 'connect_adb.php';
	include 'mcurl.php';
	for($i=1;$i<=2470;$i++){
		echo "<b>Page no: ".$i."<br>";
		$currPage="".$i;
		//echo $currPage."<br>";
		$results_page= curl($currPage);

		$results_page = scrape_between($results_page, '<ol id="posts" class="posts" ', '</ol>'); // Scraping out only the middle section of the results page that contains our results
		
		$separate_results = explode('<li class="postbitlegacy postbitim postcontainer"', $results_page);   // Expploding the results into separate parts into an array

		// For each separate result, scrape the URL
		foreach ($separate_results as $separate_result) {
			$bod=explode("<div class='postbody'>", $separate_result);
			foreach ($bod as $ibod) {
				if ((strpos($ibod, '') !== false)||(strpos($ibod, '') !== false)) {
					print_r($bod);
					echo "<br>---------------<br>";
				    break;
				}
			}
		}
	}
?>