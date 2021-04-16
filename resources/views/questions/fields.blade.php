<!-- Questions Field -->
@push('page_css')
    <link href="{{ asset('vendor/codemirror/lib/codemirror.css') }}" rel="stylesheet">
@endpush
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('questions', 'Questions:') !!}
    {!! Form::textarea('questions', null, ['class' => 'form-control']) !!}
</div>

<!-- Editor Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('editor', 'Editor:') !!}
    {!! Form::textarea('editor', null, ['class' => 'form-control']) !!}
</div>

<!-- Subject Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control']) !!}
</div>

@push('page_scripts')
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script src="{{asset('vendor/codemirror/lib/codemirror.js')}}"></script>
    <script src="{{asset('vendor/codemirror/addon/selection/selection-pointer.js')}}"></script>
    <script src="{{asset('vendor/codemirror/addon/edit/closetag.js')}}"></script>
    <script src="{{asset('vendor/codemirror/addon/fold/xml-fold.js')}}"></script>
    <script src="{{asset('vendor/codemirror/mode/xml/xml.js')}}"></script>
    <script src="{{asset('vendor/codemirror/mode/javascript/javascript.js')}}"></script>
    <script src="{{asset('vendor/codemirror/mode/css/css.js')}}"></script>
    <script src="{{asset('vendor/codemirror/mode/vbscript/vbscript.js')}}"></script>
    <script src="{{asset('vendor/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>

    <script>
        tinymce.init({
            path_absolute : "",
            selector:'#questions',
            height: 500,
            menubar: false,
            autosave_ask_before_unload: false,
            powerpaste_allow_local_images: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount code'
            ],
            relative_urls: false,
            toolbar: 'insertfile undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help | link image | code',

            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL =  '{{env('APP_URL')}}/admin/laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        });
    </script>

    <script>
        var mixedMode = {
            name: "htmlmixed",
            scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
                mode: null},
                {matches: /(text|application)\/(x-)?vb(a|script)/i,
                    mode: "vbscript"}]
        };
        var editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
            mode: mixedMode,
            selectionPointer: true,
            autoCloseTags: true
        });
        editor.getDoc().setValue(`<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

</body>
</html>
`);
    </script>
@endpush
