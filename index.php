<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MySql</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		html {
			background: #000;
			color: #fff;
			font-family: verdana;			
		}
		.sql_commands {
			margin-left: 23px;
		}
		.sql_commands li::marker {
			color: firebrick;
		}
		.sql_commands span {
			color: firebrick;
		}
	</style>
</head>
<body>

	<?php 

	include("connect_info.php");

	// connection
	$kone = new mysqli($servername, $username, $password, $dbname);
	if($kone -> connect_error):die("Connection failed: " . $kone -> connect_error);
	endif;



	// ************* BIND PARAM ***************//
	// $stmt = $kone->prepare("INSERT INTO spending (amount, item, category, the_date) VALUES (?, ?, ?, ?)");
	// $stmt->bind_param("ssss", $amount, $item, $category, $the_date);


	// $amount = "2.19";
	// $item = "yeast";
	// $category = "croissants";
	// $the_date = "2023-01-01";
	// $stmt -> execute();

	// $amount = "12.19";
	// $item = "coffee";
	// $category = "food";
	// $the_date = "2023-01-01";
	// $stmt -> execute();

	// $amount = "12.35";
	// $item = "cigarettes";
	// $category = "smoke";
	// $the_date = "2023-01-01";
	// $stmt -> execute();

	// $amount = "80";
	// $item = "weed";
	// $category = "smoke";
	// $the_date = "2023-01-02";
	// $stmt -> execute();

	// $amount = "24.99";
	// $item = "juul";
	// $category = "smoke";
	// $the_date = "2023-01-02";
	// $stmt -> execute();

	// $amount = "10.58";
	// $item = "butter";
	// $category = "croissants";
	// $the_date = "2023-01-02";
	// $stmt -> execute();

	// $amount = "9.59";
	// $item = "greentea";
	// $category = "food";
	// $the_date = "2023-01-02";
	// $stmt -> execute();

	// $amount = "351.02";
	// $item = "Mixer";
	// $category = "croissants";
	// $the_date = "2023-01-03";
	// $stmt -> execute();

	// $amount = "25.94";
	// $item = "uber";
	// $category = "transport";
	// $the_date = "2023-01-03";
	// $stmt -> execute();


	// $stmt -> close();

	

	$sql_21 = "SELECT * FROM spending WHERE the_date >= ? AND the_date < ?";
	$stmt = $kone->prepare($sql_21);

	function zzz($t1, $t2) {
		$GLOBALS['stmt']->bind_param("ss", $t1, $t2);
		$GLOBALS['stmt']->execute();
		$GLOBALS['result'] = $GLOBALS['stmt'] -> get_result();

		while($row = $GLOBALS['result'] -> fetch_assoc()):
			echo "$".$row["amount"]." ".$row["item"]."<br>";
		endwhile;

		echo "<br>";
	}

		zzz('2023-01-01','2023-01-02');
		zzz('2023-01-02','2023-01-03');
		zzz('2023-01-03','2023-01-04');

	$kone -> close();

	?>
</body>
</html>