// 画像選択
function emanon_media_select(mediaid) {
	jQuery(function ($) {
		var custom_uploader;
		var previewid = "preview_" + mediaid;
		var srcformid = "src_" + mediaid;

		if (custom_uploader) {
				custom_uploader.open();
				return;
		}

		custom_uploader = wp.media({

			title: "画像を選択",
			library: {
				 type: "image"
			},
			button: {
				 text: "画像を選択"
			},
			multiple: false

		});

		custom_uploader.on("select", function () {
			var images = custom_uploader.state().get("selection");

			images.each(function (file) {
				if ( $("#" + previewid) ) {
						$("#" + previewid).empty();
				}

				$("#" + srcformid).val(file.attributes.url);
				$("#" + srcformid).change();
				$("#" + srcformid).focus();	

				if ($("#" + previewid)) {
						$("#" + previewid).html('<img class="uploded-thumbnail" width="400" src="' + file.attributes.url + '" />');
				}

			});

			$('.media-modal-close').click();

		});

		custom_uploader.open();

		return;

	});

};

// 画像削除
function emanon_media_clear(mediaid) {
	jQuery(function ($) {
			var previewid = "preview_" + mediaid;
			var srcformid = "src_" + mediaid;

			$("#" + srcformid).val('');
			$("#" + srcformid).change();
			$("#" + srcformid).focus();
			if ($("#" + previewid)) {
					$("#" + previewid).empty();
			}
	});

};

jQuery(function ($) {
	$(document).on('click', '[name=media-select]', function(e) {
			e.preventDefault();
			var mediaid = $(this).attr("data-id");
			emanon_media_select(mediaid);
	});

	$(document).on('click', '[name=media-clear]', function () {
			var mediaid = $(this).attr("data-id");
			emanon_media_clear(mediaid);
	});

});