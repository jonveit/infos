
<?php
/* @param id */
/* return a array of infos */

	include "../config.php";
	include "../dbaccess.php";

	$name = $_POST['name'];

	if(isset($name)) {

	$SQL = "INSERT INTO profiles (name) VALUES (:name)";
    $statement = $db->prepare($SQL);
	$num_rows = $statement->execute(array(':name'=>$name));

	echo "New Profile Sucessfully Added!";

	} else {
		die("Error: Unable to Add Profile");
	}

?>
