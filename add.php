<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$Name = $_POST['Name'];
	$Description = $_POST['Description'];
	$Price = $_POST['Price'];
	$Quantity = $_POST['Quantity'];

		
	// checking empty fields
	if(empty($Name) || empty($Description) || empty($Price) || empty($Quantity)) {
				
		if(empty($Name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($Description)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($Price)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		if(empty($Quantity)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(Name, Description, Price, Quantity) VALUES(:Name, :Description, :Price, :Quantity)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':Name', $Name);
		$query->bindparam(':Description', $Description);
		$query->bindparam(':Price', $Price);
		$query->bindparam(':Quantity', $Quantity);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
