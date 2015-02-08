
<?php
/* @param id */
/* return a array of infos */

	include "../config.php";
	include "../dbaccess.php";

	$id = $_POST['id'];
	$name = $_POST['name'];
	$note = nl2br(strip_tags($_POST['note']));

	if(isset($name)) {

	$SQL = "INSERT INTO infos (_f_profile, name, note, dateCreated, lastModified) VALUES (:id, :name, :note, now(), now())";
    $statement = $db->prepare($SQL);
	$num_rows = $statement->execute(array(':id'=>$id,
									':name'=>$name,
									':note'=>$note));

		echo "New Info Sucessfully Added!";

	} else {
		die("Error: Unable to Add Info");
	}

?>
