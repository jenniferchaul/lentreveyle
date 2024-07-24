jQuery(document).ready(function($){
    var mediaUploader;

    $('#upload_image_button').click(function(e) {
        e.preventDefault();
        // Si l'objet uploader a déjà été créé, rouvrez le dialogue
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        // Étendre l'objet wp.media
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choisir une image',
            button: {
                text: 'Choisir une image'
            }, multiple: false });

        // Lorsque le fichier est sélectionné, capturez l'URL et définissez-le comme la valeur du champ texte
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#menu_image').val(attachment.id);
            $('#image_preview').html('<img src="' + attachment.url + '" style="max-width: 300px;" />');
        });

        // Ouvrir le dialogue de l'uploader
        mediaUploader.open();
    });
});
