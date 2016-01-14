<div id="dropzone" ondrop="drop(event)" ondragover="allowDrop(event)">
    <p class="middle-text noselect"><i>Drag and drop an image here</i></p>
</div>
<div id="upload">
    <p class="centered-text noselect">Or browse for one on your computer:</p>
    <form enctype="multipart/form-data" action="/upload.php" method="post">
        <input id="image-file" type="file" />
    </form>
</div>