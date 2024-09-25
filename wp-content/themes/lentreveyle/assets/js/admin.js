jQuery(document).ready(function($){
    var mediaUploader;

    $('#upload_image_button').click(function(e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choisir une image',
            button: {
                text: 'Choisir une image'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#drink_category_image').val(attachment.id);
            $('#drink_image_preview').html('<img src="' + attachment.url + '" style="max-width: 300px;" />');
        });

        mediaUploader.open();
    });
});
