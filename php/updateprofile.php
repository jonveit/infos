
<?php
/* @param id */
/* return a array of infos */

	include "../config.php";
	include "../dbaccess.php";

	$id = $_POST['id'];
	$name = $_POST['name'];;

	if(isset($id)) {

		$SQL = "UPDATE profiles SET name=? WHERE id=?";
		$statement = $db->prepare($SQL);
		$num_rows = $statement->execute(array($name,$id));

		echo "Updated Successfully!";

	} else {
		die("Error: Update was unsuccessful");
	}

?>
