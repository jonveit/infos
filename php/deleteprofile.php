
<?php
/* @param id */
/* return a array of infos */

	include "../config.php";
	include "../dbaccess.php";

	$id = $_POST['id'];

	if(isset($id)) {

		$SQL = "DELETE FROM infos WHERE _f_profile =  :id";
		$statement = $db->prepare($SQL);
		$statement->bindParam(':id', $id, PDO::PARAM_INT);
		$num_rows = $statement->execute();

		$SQL = "DELETE FROM profiles WHERE id =  :id";
		$statement = $db->prepare($SQL);
		$statement->bindParam(':id', $id, PDO::PARAM_INT);
		$num_rows = $statement->execute();

		echo "Profile deleted successfully!";

	} else {
		die("Error: Profile was not deleted");
	}

?>
