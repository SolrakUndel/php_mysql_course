<?php
include "html_begin.php";
?>
<body>
	<?php
		include "header.php";
	?>
	<div id="main">
		<div id="welcome">
			<h2>Welcome to the registration process</h2>
		</div>
		<div id="forms">
			<form method="post" action="index.php">
				<label for="name">Name</label>
				<input type="text" id="name" name="name"/>

				<label for="surname">Surname</label>
				<input type="text" id="surname" name="surname"/>

				<label for="email">Email</label>
				<input type="text" id="email" name="email"/>

				<label for="user">Username</label>
				<input type="text" id="user" name="user"/>

				<label for="password">Password</label>
				<input type="password" id="password" name="password"/>

				<label for="password_repeated">Repeat password</label>
				<input type="password" id="password_repeated" name="password_repeated"/>

				<input type="hidden" name="action" value="create_user_creation"/>
				
				<!-- I could have used the submit value instead of the hidden tag -->
				<button type="submit" value="enter">Enter</button>
				<button type="reset" value="reset">Reset</button>
			</form>
			<form method="post" action="index.php">
				<input type="hidden" name="action" value="intro"/>
				<button type="submit" value="cancel">Cancel</button>
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