<?php
include "html_begin.php";
?>
<body>
	<?php
		include "header.php";
	?>
	<div id="main">
		<div id="welcome">
			<h2>Welcome to Home 
				<?php
					echo "$_SESSION[user]";
				?>
			</h2>
		</div>
		<div id="forms">
			<form method="post" action="index.php">
				<h3>You can unlog by clicking right here.</h3>
				<button type="submit" name="action" value="unlog">Unlog</button>
			</form>
		</div>
	</div>
	<?php
		include "footer.php";
	?>
</body>
</html>