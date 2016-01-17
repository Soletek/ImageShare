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
</div>