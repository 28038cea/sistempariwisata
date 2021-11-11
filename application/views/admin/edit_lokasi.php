<section class="content">
    <h2>Edit Detail</h2>
    <form autocomplete="off" role="form" action="<?php echo base_url('admin/update_lokasi/' . $lokasi['id_lokasi']) ?>" method="post">
        <label for="judul">Title</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="title" class="form-control" placeholder="Insert title" value="<?php echo $lokasi['title'] ?>" required>
            </div>
        </div>
        <>
            <textarea class="tinymce" name="body">
        <?php echo $lokasi['body'] ?>
    </textarea>
            <textarea class="tinymce" name="deskripsi">
        <?php echo $lokasi['deskripsi'] ?>
    </textarea>
            <div class="mt-3">
                <a href="<?php echo base_url('admin/lokasi') ?>" class="btn btn-success">BACK</a>
                <button type="submit" class="btn btn-primary">EDIT</button>
            </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            //TinyMCE
            tinymce.init({
                selector: "textarea.tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true,
                images_upload_url: '<?php echo base_url('admin/tinymce_upload') ?>',
                file_picker_types: 'image',
                paste_data_images: true,
                relative_urls: false,
                remove_script_host: false,
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function() {
                            var id = 'post-image-' + (new Date()).getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var blobInfo = blobCache.create(id, file, reader.result);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        };
                    };
                    input.click();
                }
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '<?= base_url('adminbsb/tinymce'); ?>';
        });
    </script>
</section>