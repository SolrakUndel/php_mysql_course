<?php
	include "/php/config.php";

	/*
		result:
			- 5 user_exists
			- 4 user_created
			- 3 create_user
			- 2 user_identified
			- 1 go to intro
			- 0 nothing
			- -1 database_error
			- -4 identification_failed
			- -5 creation_failed
			- -6 forbidden
	*/

	/*
		user_action:
			- intro
			- intro_identification
			- create_user
			- create_user_creation
			- home
			- unlog
	*/
	$result = 0;

	//Some initializations
	session_start();

	$connection = new mysqli($db_server, $db_user, $db_pass, $db_name);

	if ($connection->connect_errno == 0)
	{
		//If an unlog action was sent, let's destroy the user element of $_SESSION
		if (isset($_POST['action']) && $_POST['action'] == "unlog")
		{
			if (isset($_SESSION['user']))
			{
				unset($_SESSION['user']);
			}

			//And go to intro.php
			$result = 1;
		}
		//In case the user is logged, we are going to check it for real
		elseif (isset($_SESSION['user']))
		{
			$user = $_SESSION['user'];

			$query = "SELECT * FROM students WHERE userName = '$user'";

			$res = $connection->query($query);

			//It is really logger, let's go to home.php
			if ($res->num_rows > 0)
			{
				$result = 2;
			}
			//It's fake, this place is forbidden for this user, go to intro.php and tell it something
			else
			{
				unset($_SESSION['user']);

				$result = -6;
			}
		}
		//In any other action case
		elseif (isset($_POST['action']) && preg_match("/^[A-Za-z0-9_]{1,20}$/", $_POST['action']))
		{
			$user_action = $_POST['action'];
			//It's trying to identify itself
			if ($user_action == "intro_identification")
			{
				//In case user and password of the POST message are correct
				if (isset($_POST['user']) && isset($_POST['password']) && preg_match("/^[A-Za-z][A-Za-z0-9_]{1,99}$/", $_POST['user'])
					&& preg_match("/^[A-Za-z0-9_]{1,50}$/", $_POST['password']))
				{
					//And match an existing user
					$user = $_POST['user'];
					$password = $_POST['password'];
					$query = "SELECT * FROM students WHERE userName = '$user' and password = '$password'";
					$res = $connection->query($query);

					//Let's go to home.php
					if ($res->num_rows == 1)
					{
						$_SESSION['user'] = $user;

						$result = 2;
					}
					//Nah, he is nobody, go to intro.php and tell it something
					else
					{
						$result = -4;
					}
				}
				else
				{
					$result = -4;
				}
			}
			//It's trying to go the creation of user page, let him
			elseif ($user_action == "create_user")
			{
				$result = 3;
			
			}
			//It is trying to create a new user
			else if ($user_action == "create_user_creation")
			{
				//Check if the info is good
				/*
					name: begins with capital leter and can have spaces, some names have spaces
					surname: the same as name
					email: begin with letter, contain combination of letters/numbers/_/., then @, then a combination of lower 
					case letters and ., a ., and more lower case letters. Also, smaller than 100.
					user and passwords are easy to understand.
				*/
				if (isset($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['user'], $_POST['password']) && 
					preg_match("/^[A-Z][a-zA-Z\040]{1,299}$/", $_POST['name']) &&
					preg_match("/^[A-Z][a-zA-Z\040]{1,299}$/", $_POST['surname']) &&
					preg_match("/^[A-Za-z][A-Za-z0-9_\.]*@[a-z\.]+\.[a-z]+$/", $_POST['email']) && (count($_POST['email']) <= 100) &&
					preg_match("/^[A-Za-z][A-Za-z0-9_]{1,99}$/", $_POST['user']) &&
					preg_match("/^[A-Za-z0-9_]{1,50}$/", $_POST['password']) &&
					preg_match("/^[A-Za-z0-9_]{1,50}$/", $_POST['password_repeated']) &&
					($_POST['password'] == $_POST['password_repeated']))
				{
					$name = $_POST['name'];
					$surname = $_POST['surname'];
					$email = $_POST['email'];
					$user = $_POST['user'];
					$password = $_POST['password'];
					$password_repeated = $_POST['password_repeated'];

					$query = "SELECT * FROM students WHERE userName = '$user' OR email = '$email'";
					$res = $connection->query($query);

					//If the info is good and such user does not already exists, try to create the user
					if ($res->num_rows == 0)
					{
						$query = "INSERT INTO students(name, surnames, email, userName, password) VALUES ('$name','$surname','$email','$user','$password')";

						$res = $connection->query($query);

						//If everything went fine, go to intro and tell the user the results.
						if ($res)
						{
							$result = 4;
						}
					}
				}

				//If the user was not created, go 
				if ($result != 4){
					$result = -5;
				}
			}
			//If it tried to go to home
			else if ($user_action == "home" && isset($_SESSION['user']))
			{
				$user = $_SESSION['user'];

				$query = "SELECT * FROM students WHERE userName = '$user'";

				$res = $connection->query($query);

				if ($res->num_rows > 0)
				{
					$result = 2;
				}
				else
				{
					unset($_SESSION['user']);
					$result = -6;
				}
			}
			elseif($user_action == "intro")
			{
				$result = 1;
			}
			else
			{
				$result = 1;
			}
		}
		else
		{
			$result = 1;
		}
	}
	else
	{
		$result = -1;
	}

	//Now let's include the corresponding View.
	$text = "";
	switch ($result)
	{
		case -6:
			$text = "You are forbidden from going to that place. You first may log in the system.";
			include "/php/intro.php";
			break;
		case -5:
			$text = "The user could not be created.";
			include "/php/create_user.php";
			break;
		case -4:
			$text = "The user or the password were wrong.";
			include "/php/intro.php";
			break;
		case -1:
			$text = "Database access error.";
			include "/php/display_error.php";
			break;
		case 0:
			break;
		case 1:
			include "/php/intro.php";
			break;
		case 2:
			include "/php/home.php";
			break;
		case 3:
			include "/php/create_user.php";
			break;
		case 4:
			$text = "The user was successfully created.";
			include "/php/intro.php";
			break;
	}
	$connection->close();
?>