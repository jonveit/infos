
<?php
/* @param id */
/* return a array of infos */

	include "../config.php";
	include "../dbaccess.php";

	$id = $_POST['id'];

	if(isset($id)) {

		$SQL = "DELETE FROM infos WHERE id =  :id";
		$statement = $db->prepare($SQL);
		$statement->bindParam(':id', $id, PDO::PARAM_INT);
		$num_rows = $statement->execute();

		echo "Info deleted successfully!";

	} else {
		die("Error: Info requires at an id");
	}

?>
