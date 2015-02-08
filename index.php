

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title> Infos </title>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link id="style" type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
<div id="top"></div>
<div id="wrapper">
<div id="canvas">

	<div id="profiles">
		<h2>

			<span> Profiles </span>

			<button id="button-close-profiles" type="button" class="toggle-profiles btn btn-default visible-xs-block pull-right" aria-label="Return to Infos">
				<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
			</button>

			<button id="button-add-profile" type="button" class="btn btn-default pull-right" aria-label="Add Profile">
				<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
			</button>

		</h2>

		<form id="new-profile">

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

		<div id="profile-container">


		</div> <!-- Profile Container -->

	</div> <!-- Profiles -->
	<div id="infos">

		<h2>
			<button id="button-show-profiles" type="button" class="toggle-profiles btn btn-default pull-left" aria-label="Go To Profiles">
				<span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span>
			</button>

			Infos

			<button id="button-logout" type="button" class="btn btn-default pull-right" aria-label="Logout">
				<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
			</button>


		</h2>

		<form id="search">
			<div class="input-group">
      			<input id="searchField" type="text" class="form-control" placeholder="Search...">
      			<span class="input-group-btn">
        			<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      			</span>
    		</div><!-- /input-group -->
		</form>

		<form id="add-info">
			<div class="input-group">
      			<input name="name" type="text" class="form-control" placeholder="New...">
      			<span class="input-group-btn">
        			<button class="btn btn-default" type="submit">
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
					</button>
      			</span>
    		</div><!-- /input-group -->
		</form>

		<div id="errors">
			<div class="alert alert-success" role="alert"><span class="message"></span><div class="close-alert pull-right">X</div></div>
			<div class="alert alert-danger" role="alert"><span class="message"></span><div class="close-alert pull-right">X</div></div>
		</div>

		<hr />

		<form id="new-info">
			<div class="info-topbar">
				<div class="info-buttons">
					<button tabindex=4 type="button" class="button-cancel-info btn btn-default pull-right" aria-label="Cancel Change Info">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
					<button tabindex=3 type="submit" class="button-save-info btn btn-default pull-right" aria-label="Save Info">
						<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
					</button>
				</div>
				<div class="info-header">
					<input tabindex=1 class="form-control" name="name" placeholder="Name..." type="text" />
				</div>
			</div>

			<div class="clearfix"></div>
			<div class="info-content">
				<textarea tabindex=2 rows=5 class="form-control note-input" name="note"><?php echo $info['note']; ?></textarea>
			</div>
		</form>


		<ul id="info-container">



		</ul> <!-- Info Container -->

		<div id="scroll-to-top"><span class="glyphicon glyphicon-circle-arrow-up"></span></div>
	</div>	<!-- Infos -->

</div>	<!-- Canvas -->
</div> <!-- Wrapper -->

	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/jquery.autogrowtextarea.min.js"></script>
	<script src="js/jquery.fastLiveFilter.js"></script>
	<script src="js/controller.js"></script>

</body>
</html>
