<?php
include "html_begin.php";
?>
<body>
	<?php
		include "header.php";
	?>
	<div id="main">
		<div id="welcome">
			<h2>Welcome to the identification process</h2>
		</div>
		<div id="forms">
			<form method="post" action="index.php">
				<label for="user">User</label>
				<input type="text" id="user" name="user"/>

				<label for="password">Password</label>
				<input type="password" id="password" name="password"/>

				<input type="hidden" name="action" value="intro_identification"/>
				<button type="submit" value="enter">Enter</button>
				<button type="reset" value="reset">Reset</button>
			</form>
			<form method="post" action="index.php">
				<input type="hidden" name="action" value="create_user"/>
				<button type="submit" value="register">Register</button>
			</form>
		</div>
		<?php
			if (isset($text) && $text != "")
			{
				echo "<div id='messages'><h1>$text</h1></div>";
			}
		?>
	</div>
	<?php
		include "footer.php";
	?>
</body>
</html>