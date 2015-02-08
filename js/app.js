var selectedID = 1;

(function() {

	load_infos(selectedID);

}())

function load_infos(id) {

	$.get("php/infos.php", { id: id }, function(data) {
			$("#info-container").html(data);

			$(".note-input").autoGrow();

			$(".button-edit-info").click(function() {
				var info = $(this).parents('.info');
				info.children(".edit").toggle();
				info.children(".view").toggle();
			});

			$(".button-delete-info").click(function() {

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

			$(".button-cancel-info").click(function() {
				var info = $(this).parents('.info');
				info.children(".edit").toggle();
				info.children(".view").toggle();
			});

			$(".edit").submit( function (event) {

				var form = $(this);
				var info = $(this).parents('.info');
				var view = info.children(".view");

				var formData = form.serialize();
				var formArray = form.serializeArray();

				$.post('php/updateinfo.php', formData, function(data){

					$.get('info.php', { id: info.data('id') }, function(data) {
						load_infos(selectedID);
					});

					$(".alert-success span.message").html(data);
					$(".alert-success").toggle();

				}).fail( function(data) {
					$(".alert-danger span.message").html(data);
					$(".alert-danger").toggle();
				});
			});
        });
}
