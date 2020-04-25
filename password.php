<html>
	<head>
		<title>Password Strength Tester</title>
	</head>

<body>
	<form action = "password.php" method = "POST"> 
	<p>
		A good password should contain eight or more characters made up of uppercase 
		and lowercase alphabet (letters) and special characters.
	</p>
	
	<p1>
		Enter a password below using a combination of uppercase, lowercase letters 
		and special characters ~!@#$%^&*()_?+><
	</p>
	
	<p2>
		<input type = "text" name = "password"></p>
	<p2>
	
	<p3>
		<input type = "submit" name = "submit" value = "Test Password Strength">
	</p3>
	</form>
	
	<br><br>
	

		<?php
			
			$text = '';
			if(isset($_POST['submit']))							//makes sure that submit button is clicked on after password is inputted
			{
				$text = $_POST['password'];						//stores data from password portion of the form into a string variable named $text
			
				$length = strlen($text);						//$length holds that length of the password
				
				$special_char = "~!@#$%^&*()_?+<>";				//placed all special characters into a single string to be compared later on	
				$uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";		//placed all uppercase characters into a single string to be compared later on	
				$lowercase = "abcdefghijklmnopqrstuvwxyz";		//placed all lowercase characters into a single string to be compared later on	
				$numbers = "0123456789";						//placed all numbers characters into a single string to be compared later on	
				
				
				$uppercase = similar_text($text, $uppercase, $percent); //similar_text is a function that returns the number of similarities 2 strings have
				$u = false;										//$u is a variable that holds the boolean value based on whether there are uppercase letters in the password
				if($uppercase > 0)
				{
					$u = true;
				}
				
				
				$lowercase = similar_text($text, $lowercase, $percent);	//compares similarity between $text and $lowercase 
				$l = false;										//$l is a variable that holds the boolean value based on whether there are lowercase letters in the password
				if($lowercase > 0)
				{
					$l = true;
				}
				
				
				$special_char = similar_text($text, $special_char, $percent);	//compares similarity between $text and $special_char
				$sp = false;									//$sp is a variable that holds the boolean value based on whether there are special letters in the password
				if($special_char > 0)
				{
					$sp = true;
				}
				
				
				$numbers = similar_text($text, $numbers, $percent);	//compares similarity between $text and $numbers 
				$num = false;									//$num is a variable that holds the boolean value based on whether there are numbers in the password
				if($numbers > 0)
				{
					$num = true;
				}
				
				
				
				if (isset($_POST['password']) && $length < 8)						//determines whether password length is less than 8
				{
					echo "Strength Message";
					echo "<br></br><b>INVALID</b>";
					
					echo "<br></br>Reason Message";
						echo "<br></br><b>Password is less than 8 characters</b>";
				}
				
				elseif($num) 															//determines whether password contains invalid characters, which are numbers
				{
					echo "Strength Message";
					echo "<br></br><b>INVALID</b>";
					
					echo "<br></br>Reason Message";
						echo "<br></br><b>Password contains invalid characters</b>";
				}
				
				else
				{
					
					if ($l == true)
					{
						if($u and $l)
						{
							if($u and $l and $sp)
							{
								echo "Strength Message";
								echo "<br></br><b>GOOD</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password contains uppercase, lowercase, and special characters</b>";
							}
								

								
							else
							{
								echo "Strength Message";
								echo "<br></br><b>MEDIUM</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password does not contain special characters</b>";
							}
						}
							
						elseif ($sp and $l)
						{
							if($u and $l and $sp)
							{
								echo "Strength Message";
								echo "<br></br><b>GOOD</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password contains uppercase, lowercase, and special characters</b>";
							}
								
							else 
							{
								echo "Strength Message";
								echo "<br></br><b>MEDIUM</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password does not contain uppercase characters</b>";
							}
								
						}
							
						else
						{
							echo "Strength Message";
							echo "<br></br><b>POOR</b>";
								
							echo "<br></br>Reason Message";
								echo "<br></br><b>Password does not contain uppercase or special characters</b>";
								
						}
							
					}
					
					elseif($u == true)
					{
						if($u and $l)
						{
							if($u and $l and $sp)
							{
								echo "Strength Message";
								echo "<br></br><b>GOOD</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password contains uppercase, lowercase, and special characters</b>";
							}
								
							else
							{
								echo "Strength Message";
								echo "<br></br><b>MEDIUM</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password does not contain special characters</b>";
							}
						}
							
						elseif ($u and $sp)
						{
							if($u and $l and $sp)
							{
								echo "Strength Message";
								echo "<br></br><b>GOOD</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password contains uppercase, lowercase, and special characters</b>";
							}
								
							else 
							{
								echo "Strength Message";
								echo "<br></br><b>MEDIUM</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password does not contain lowercase characters</b>";
							}
								
						}
							
						else
						{
							echo "Strength Message";
							echo "<br></br><b>POOR</b>";
								
							echo "<br></br>Reason Message";
								echo "<br></br><b>Password does not contain lowercase or special characters</b>";	
						}
					}
					
					else
					{
						if($l and $sp)
						{
							if($u and $l and $sp)
							{
								echo "Strength Message";
								echo "<br></br><b>GOOD</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password contains uppercase, lowercase, and special characters</b>";
							}
								
							else
							{
								echo "Strength Message";
								echo "<br></br><b>MEDIUM</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password does not contain uppercase characters</b>";
							}
						}
							
						elseif ($sp and $l)
						{
							if($u and $l and $sp)
							{
								echo "Strength Message";
								echo "<br></br><b>GOOD</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password contains uppercase, lowercase, and special characters</b>";
							}
								
							else 
							{
								echo "Strength Message";
								echo "<br></br><b>MEDIUM</b>";
									
								echo "<br></br>Reason Message";
									echo "<br></br><b>Password does not contain uppercase characters</b>";
							}
								
						}
					
						
						else
						{
							echo "Strength Message";
							echo "<br></br><b>POOR</b>";
								
							echo "<br></br>Reason Message";
								echo "<br></br><b>Password does not contain uppercase or lowercase characters</b>";
								
						}
					}	
				}
			}
		?>
				
		</body>
</html>