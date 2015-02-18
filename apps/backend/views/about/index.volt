{{ javascript_include('js/ckeditor/ckeditor.js') }}
<script>

    var editor, html = '';

    function createEditor() {
        if ( editor )
            return;

        // Create a new editor inside the <div id="editor">, setting its value to html
        var config = {};
        editor = CKEDITOR.appendTo( 'editor', config, html );
    }

    function removeEditor() {
        if ( !editor )
            return;

        $.ajax({
            type: "POST",
            url: 'editPost',
            data: { text: editor.getData() },
            dataType: 'json'
        });

        // Retrieve the editor contents. In an Ajax application, this data would be
        // sent to the server or used in any other way.
        document.getElementById( 'editorcontents' ).innerHTML = html = editor.getData();
        document.getElementById( 'contents' ).style.display = '';

        // Destroy the editor.
        editor.destroy();
        editor = null;


    }

</script>
<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <dl class="sub-nav">
            <dd class="active"><a onclick="createEditor();" href="#">Rediger indhold</a></dd>
            <dd class="active"><a onclick="removeEditor();" href="#">Send indhold til server</a></dd>
        </dl>
        <div id="editor">
        </div>
        <div id="contents" style="display: none">
            <!-- This div will be used to display the editor contents. -->
            <div id="editorcontents">
            </div>
        </div>
    </div>
</div>