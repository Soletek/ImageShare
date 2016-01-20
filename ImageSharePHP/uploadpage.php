<script>
    function disableUploadUI() {

    }

    function enableUploadUI() {

    }
</script>

<div id="dropzone" ondrop="drop(event)" ondragover="allowDrop(event)">
    <p class="middle noselect"><i>Drag and drop an image here</i></p>
</div>
<div id="upload">
    <p class="centered-text">Or browse for one on your computer:</p>
    <form enctype="multipart/form-data" action="/upload.php" method="post">
        <input id="image-file" type="file" />
    </form>

    <p class="centered-text" style="font-size:10px;">(Maximum file size 2MB)</p>
    <button type="button" onclick="asd()" style="float: right">save</button>
    <input type="text" name="name" class="input-field" size="30" maxlength="30" />
</div>