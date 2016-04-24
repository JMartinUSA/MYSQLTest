<?php
header('Access-Control-Allow-Origin: *'); // Should work in Cross Domain ajax Calling request

mysql_connect("localhost","jaymartm_public","PUBLIC");
mysql_select_db("jaymartm_Demo");

if(isset($_GET['type']))
{
	if($_GET['type'] == "login")
	{
		$username = $_GET['UserName'];
		$password = $_GET['Password'];

		//Create Query
		$query = "Select * from registration Where UserName='$username' and Password='$password'";
		//Fire your Query against database
		$result1 = mysql_query($query);
		//get total no of rows from database according to the query
		$totalRows = mysql_num_rows($result1);

		//Prepare Code for json format
		if($totalRows > 0)
		{
			$recipes = array();
			while($recipe = mysql_fetch_array($result1, MYSQL_ASSOC))
			{
				$recipes[] = array('User'=>$recipe);
			}

			$output = json_encode("Login Successful");

			echo $output;

		}
		else
		{
			$output = json_encode("Login Failed");

			echo $output;
		}

	}
	else if($_GET['type'] == 'register')
	{

	}
}
else
{
	echo 'Invalid format';
}



?>