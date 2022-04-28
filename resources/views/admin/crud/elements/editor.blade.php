
{{--<script src="/backend/assets/libs/ckeditor/adapters/jquery.js"></script>--}}

<div class="form-group">
    <label>{{$column['title']}}</label>
    <textarea name="{{$column['column']}}" style="width: 100%;" id="{{$column['column'].$entity->id}}">{!! trim($entity->{$column['column']}) !!}</textarea>
</div>

<script>
    tinymce.init({
        selector: "#{{$column['column'].$entity->id}}",
        plugins: 'image',
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
    });

    {{--$("#{{$entity->id.$column['column']}}").summernote();--}}

    {{--CKEDITOR.basePath = '/backend/assets/libs/ckeditor/';--}}
    {{--CKEDITOR.replace("{{$entity->id.$column['column']}}",{--}}
    {{--    filebrowserBrowseUrl: '/browser/browse.php',--}}
    {{--    filebrowserUploadUrl: '/uploader/upload.php'--}}
    {{--});--}}
    {{--ClassicEditor.create( document.querySelector("#"+"{{$entity->id.$column['column']}}") )--}}

</script>





