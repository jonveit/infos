var selectedID = 1;

(function() {

	$(document).ready( function() {

		loadProfiles();
		load_infos(selectedID);

		$(".profile:first").addClass("selected");

		$('.toggle-profiles').click(function() {
			if($('#wrapper').hasClass('show-profiles')) {
				$("#wrapper").removeClass('show-profiles');
				$("#wrapper").addClass('hide-profiles');
			} else {
				$("#wrapper").removeClass('hide-profiles');
				$("#wrapper").addClass('show-profiles');
			}
		});

		$("#button-add-profile").click( function() {
			$("#new-profile").toggle();
		});

		$("#new-profile .button-cancel-profile").click( function() {
			$("#new-profile").toggle();
		});

		$("#new-profile").submit( function(event) {
			event.preventDefault();

			var formData = $(this).serialize();

			$.post('php/createprofile.php', formData, function(data) {
				$("#new-profile").toggle();
				$("#new-profile")[0].reset();
				loadProfiles();
				$(".alert-success span.message").html(data);
				$(".alert-success").toggle();
			}).fail( function() {
				$(".alert-danger span.message").html(data);
				$(".alert-danger").toggle();
			});
		});

		$("#add-info").submit( function(event) {

			event.preventDefault();
			// Copy Form Value
			var name = $("#add-info input[name='name']").val();
			$("#new-info input[name='name']").attr("value", name);

			$("#add-info")[0].reset();

			$("#new-info").toggle();
			$("#new-info textarea").focus();
		});


		$("#new-info .button-cancel-info").click( function() {
			$("#new-info").toggle();
		});

		$("#new-info").submit( function(event) {

			event.preventDefault();

			var formData = $(this).serialize();

			formData = "id=" + selectedID + "&" + formData; // add the profile id

			$.post('php/createinfo.php', formData, function(data){
				$("#new-info").toggle();
				$("#new-info")[0].reset();
				load_infos(selectedID);
				$(".alert-success span.message").html(data);
				$(".alert-success").toggle();


			}).fail( function(data) {
				$(".alert-danger span.message").html(data);
				$(".alert-danger").toggle();
			});
		});

		$(".close-alert").click( function() {
			$(this).parent().toggle();
		});


		$("#button-logout").click( function() {
			window.location.replace('http://logout@www.jonveit.com/');
		});

		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				alert("pass a hundret");
				$('#scroll-to-top').fadeIn();
			} else {
				$('#scroll-to-top').fadeOut();
			}
		});

		//Click event to scroll to top
		$('#scroll-to-top').click(function(){
			$('html, body').animate({scrollTop : 0},800);
			return false;
		});



	});

}())


// Handlers Once The Infos Are Loaded

function loadProfiles() {

	$.get("php/profiles.php", function(data) {

		$("#profile-container").html(data);

		$(".button-edit-profile").click(function() {
			var profile = $(this).parents('.profile');
			profile.children(".edit").toggle();
			profile.children(".view").toggle();
		});

		$(".button-cancel-profile").click(function() {
			var profile = $(this).parents('.profile');
			profile.children(".edit").toggle();
			profile.children(".view").toggle();
		});

		$(".button-delete-profile").click(function() {

			event.preventDefault();

				var profile = $(this).parents('.profile');
				var result = confirm("Are You Sure Want to Delete This Profile And All Associated Infos?");
				if(result) {

					var id = profile.data('id');

					$.post('php/deleteprofile.php', { id: id }, function(data) {
						profile.remove();
						$(".alert-success span.message").html(data);
						$(".alert-success").toggle();

					}).fail( function(data) {
						$(".alert-danger span.message").html(data);
						$(".alert-danger").toggle();
					});
				}
		});

		$(".profile .edit").submit(function() {

			event.preventDefault();

			var form = $(this);
			var info = $(this).parents('.info');
			var view = info.children(".view");

			var formData = form.serialize();

			$.post('php/updateprofile.php', formData, function(data){

				loadProfiles();
				load_infos(selectedID);

				$(".alert-success span.message").html(data);
				$(".alert-success").toggle();

			}).fail( function(data) {
				$(".alert-danger span.message").html(data);
				$(".alert-danger").toggle();
			}).done( function() {
				form.toggle();
				view.toggle();
			});
		});

		$(".profile .view").click( function() {



			var profile = $(this).parents(".profile");
			var id = profile.data("id");

			selectedID = id;

			load_infos(id);

			$(".profile.selected").removeClass("selected");
			profile.addClass("selected");

		});

	});
}

function load_infos(id) {

	// Get The Infos
	selectedID = id;

	$.get("php/infos.php", "id=" + id, function(data) {

			// Place Into The DOM
			$("#info-container").html(data);

			// Implement Search
			$("#searchField").fastLiveFilter("#info-container");

			//The Text Areas Auto Grow
			$(".note-input").autoGrow();

			//Switch From View To Edit Mode on a Particular Note

			$(".button-edit-info").click(function() {
				var info = $(this).parents('.info');
				info.children(".edit").toggle();
				info.children(".view").toggle();
			});

			// Switch From Edit Back to View
			$(".button-cancel-info").click(function() {
				var info = $(this).parents('.info');
				info.children(".edit").toggle();
				info.children(".view").toggle();
			});

			// Delete a Note
			$(".button-delete-info").click(function(event) {

				event.preventDefault();

				var info = $(this).parents('.info');
				var result = confirm("Are You Sure Want to Delete This Information?");
				if(result) {

					var id = info.data('id');

					$.post('php/deleteinfo.php', { id: id }, function(data) {
						info.remove();
						$(".alert-success span.message").html(data);
						$(".alert-success").toggle();

					}).fail( function(data) {
						$(".alert-danger span.message").html(data);
						$(".alert-danger").toggle();
					});
				}
			});

			// Save the Edits of a Note
			$(".info .edit").submit( function (event) {

				event.preventDefault();

				var form = $(this);
				var info = $(this).parents('.info');
				var view = info.children(".view");

				var formData = form.serialize();
				var formArray = form.serializeArray();

				$.post('php/updateinfo.php', formData, function(data){

					load_infos(selectedID);

					$(".alert-success span.message").html(data);
					$(".alert-success").toggle();

				}).fail( function(data) {
					$(".alert-danger span.message").html(data);
					$(".alert-danger").toggle();
				}).done( function() {
					form.toggle();
					view.toggle();
				});
			});
        });
}
