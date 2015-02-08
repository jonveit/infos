
<?php
/* @param id */
/* return a array of infos */

	include "../config.php";
	include "../dbaccess.php";

	$id = $_POST['id'];
	$name = $_POST['name'];
	$note = nl2br(strip_tags($_POST['note']));

	if(isset($id)) {

		$SQL = "UPDATE infos SET name=?, note=?, lastModified=NOW() WHERE id=?";
		$statement = $db->prepare($SQL);
		$num_rows = $statement->execute(array($name,$note,$id));

		echo "Updated Successfully!";

	} else {
		die("Error: Update was unsuccessful");
	}

?>
