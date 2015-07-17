<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	</head>
	<body >
		<div id="container">
			<div id="lastModified" style="margin-left: 23%;">
				<b style="color: white;">
				<?php
					echo "Last modified: ".date("F d Y h:i:s.",filemtime("shubham.txt"));
				?>
				</b>
			</div>
			<div id="enter" style="margin-left: 15%;">
				<table id = "inputBoxes" style="border-spacing: 30px;">
					<tr>
						<td>
							<form name="shubham" onsubmit="savetoShubham()">
								<input name="exp" placeholder="Enter expenses-Shubham" type="text" autofocus/>
							</form>
						</td>
						<td>
							<form name="kaushal" onsubmit="savetoKaushal()">
								<input name="exp" placeholder="Enter any Notes,Loans" type="text" style="width:200%;"/>
							</form>
						</td>
					</tr>
				</table>
			</div>
			<div id="show" style="margin-left: 10%">
				<table style="border-spacing: 30px;">
					<tr>
						<td>
							<div class='answerform'>
								<?php
									$handle = fopen("shubham.txt", "r");
									$sum = 0;
									$auto = 0;
									$cig = 0;
									$food = 0;
									$daaru = 0;
									$masti = 0;
									if ($handle) {
	    								while (($line = fgets($handle)) !== false) {
	       									echo $line."<br>";
	       									$sum += filter_var($line, FILTER_SANITIZE_NUMBER_INT);
	       									if (stripos(strtolower($line), 'auto') !== false || stripos(strtolower($line), 'bus') !== false ||stripos(strtolower($line), 'metro') !== false || stripos(strtolower($line), 'train') !== false)
	       										$auto += filter_var($line, FILTER_SANITIZE_NUMBER_INT);
	       									if (stripos(strtolower($line), 'cig') !== false)
	       										$cig += filter_var($line, FILTER_SANITIZE_NUMBER_INT);
	       									if (stripos(strtolower($line), 'khana') !== false||stripos(strtolower($line), 'cook') !== false)
	       										$food += filter_var($line, FILTER_SANITIZE_NUMBER_INT);
	       									if (stripos(strtolower($line), 'daaru') !== false || stripos(strtolower($line), 'pub') !== false || stripos(strtolower($line), 'bar') !== false || stripos(strtolower($line), 'disco') !== false || stripos(strtolower($line), 'ladki') !== false || stripos(strtolower($line), 'maal') !== false)
	       										$daaru += filter_var($line, FILTER_SANITIZE_NUMBER_INT);
	    								}
	    								fclose($handle);
	    							}
	    						?>
	   						</div>
						</td>
						<td>
							<div class='notesform'>
								<?php 
									$handle = fopen("kaushal.txt", "r");
									if ($handle) {
	    								while (($line = fgets($handle)) !== false) {
	       									echo $line."<br>";
	    								}
	    								fclose($handle);
	    							}
	    						?>
							</div>
						</td>
					</tr>
				</table>
				<table border="1" style="border-spacing: 30px; margin-left: 8%; font-size:0.7em;">
					<tr>
						<th>
							Total Amount-<?php echo $sum; ?>
						</th>
						<th>
							Total Days passed-
							<?php 
								date_default_timezone_set('Asia/Calcutta');
								$from = strtotime('2015-05-17');
								$today = time();
								$difference = $today - $from;
								echo floor($difference / (60 * 60 * 24));
							?>
						</th>
					</tr>
					<tr>
						<td>
							Transportation- <?php echo $auto;echo "(".floor($auto*100.0/$sum)."%)"; ?>
						</td>
						<td>
							Fooding/Lodging- <?php echo $food;echo "(".floor($food*100.0/$sum)."%)"; ?>
						</td>
					</tr>
					<tr>
						<td>
							Cig- <?php echo $cig;echo "(".floor($cig*100.0/$sum)."%)"; ?>
						</td>
						<td>
							Movi,Shop,re4g- <?php echo $sum-($food + $cig + $auto +$daaru);echo "(".floor(($sum-($food + $cig + $auto + $daaru))*100.0/$sum)."%)"; ?>
						</td>
					</tr>
					<tr>
						<td>
							Partying- <?php echo $daaru;echo "(".floor($daaru*100.0/$sum)."%)"; ?>
						</td>
						<td>
						
						</td>
					</tr>
				</table>
			</div>
			<div id="notes">
		</div>
	</body>
	<script type="text/javascript">
		function savetoShubham()
		{
			var x = document.forms["shubham"]["exp"].value;
    		if (x == null || x == "") {
    	    	alert("Value must be filled out");
	    	}
	    	else
	    		$.get( "save.php", { name: "shubham", value: x  } );
		}
		function savetoKaushal()
		{
			var x = document.forms["kaushal"]["exp"].value;
    		if (x == null || x == "") {
    	    	alert("Value must be filled out");
	    	}
	    	else
				
	    		$.get( "save.php", { name: "kaushal", value: x  } );
		}
	</script>
</html>
