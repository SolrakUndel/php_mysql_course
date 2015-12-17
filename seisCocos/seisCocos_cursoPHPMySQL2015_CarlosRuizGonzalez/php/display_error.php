<?php
include "html_begin.php";
?>
<body>
	<?php
		include "header.php";
	?>
	<div id="main">
		<div id="welcome">
			<h2>You had a big error</h2>
		</div>
		<?php
			if (isset($text) && $text != "")
			{
				echo "<div id='messages'><h1>$text</h1></div>";
			}
		?>

		<div id="forms">
			<form method="post" action="index.php">
				<button type="submit" name="action" value="intro">Go to Index</button>
			</form>
		</div>
	</div>
	<?php
		include "footer.php";
	?>
</body>
</html>