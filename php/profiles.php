<?php

	require_once "../config.php";
	require_once "../dbaccess.php";

	// Fetch the Profiles and store in an array called profiles

	$SQL = "SELECT * from profiles";
    $statement = $db->query($SQL);
	$num_rows = $statement->rowCount();

	if($num_rows > 0) {

		while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$profiles[] = $row;
		}

		foreach($profiles as $profile) { ?>

			<li class="profile" data-id="<?php echo $profile['id']; ?>">

				<form class="edit">

					<input type="hidden" value="<?php echo $profile['id']; ?>" name="id" />

					<button type="button" class="button-cancel-profile btn btn-default pull-right" aria-label="Cancel Change Info">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>

					<button type="submit" class="button-update-profile btn btn-default pull-right" aria-label="Save Info">
						<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
					</button>

					<div class="profile-name">
						<input class="form-control" name="name" value="<?php echo $profile['name']; ?>" type="text" />
					</div>

				</form>

				<div class="view">

					<button type="button" class="button-delete-profile btn btn-default pull-right" aria-label="Remove Profile">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button>

					<button type="button" class="button-edit-profile btn btn-default pull-right" aria-label="Edit Profile">
						<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
					</button>
					<div class="profile-name">
						<?php echo $profile['name']; ?>
					</div>

				</div>
			</li>

<?php
		}
	}
?>
