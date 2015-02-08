
<?php
/* @param id */
/* return a array of infos */

	require_once "../config.php";
	require_once "../dbaccess.php";

	$idSelected = $_GET['id'];

	$SQL = "SELECT * from infos WHERE _f_profile = '$idSelected' ORDER BY dateCreated DESC";
    $statement = $db->query($SQL);
	$num_rows = $statement->rowCount();

	if($num_rows > 0) {
		while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$infos[] = $row;
		}
	}

	foreach($infos as $info) { ?>

	<li class="info" data-id="<?php echo $info['id']; ?>">
		<form class="edit">
			<input name="id" type="hidden" value="<?php echo $info['id']; ?>" />

			<div class="info-topbar">
				<div class="info-buttons">
					<button type="button" class="button-cancel-info btn btn-default pull-right" aria-label="Cancel Change Info">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
					<button type="submit" class="button-update-info btn btn-default pull-right" aria-label="Save Info">
						<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
					</button>
				</div>
				<div class="info-header">
					<input class="form-control" name="name" value="<?php echo $info['name']; ?>" type="text" />
				</div>

			</div>
			<div class="clearfix"></div>
			<div class="info-content">
				<textarea rows=8 class="form-control note-input" name="note"><?php echo strip_tags($info['note']); ?></textarea>
			</div>
			<div class="info-footer">
				<p class="info-dateCreated"><strong>Date Created: </strong><?php echo $info['dateCreated']; ?></p>
				<p class="info-lastModified"><strong>Last Modified: </strong><?php echo $info['lastModified']; ?></p>
			</div>
		</form>
		<div class="view">
			<div class="info-topbar">
				<div class="info-buttons">
					<button type="button" class="button-delete-info btn btn-default pull-right" aria-label="Delete Info">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button>

					<button type="button" class="button-edit-info btn btn-default pull-right" aria-label="Edit Info">
						<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
					</button>
				</div>
				<div class="info-header">
					<h4> <?php echo $info['name']; ?> </h4>
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="info-content">
				<p> <?php echo $info['note']; ?></p>
			</div>

			<div class="clearfix"></div>

			<div class="info-footer">
				<p class="info-dateCreated"><strong>Date Created: </strong><?php echo $info['dateCreated']; ?></p>
				<p class="info-lastModified"><strong>Last Modified: </strong><?php echo $info['lastModified']; ?></p>
			</div>
		</div>
	</li>

<?php } ?>



