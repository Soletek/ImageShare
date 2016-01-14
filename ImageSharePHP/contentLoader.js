


function contentUpload() {
    $("#contents").load("uploadpage.php");
}

function contentMain() {
    $("#contents").load("database.php");
}

function contentImage(imagefile) {
    var image = new Image();
    image.src = "/img/" + imagefile;
    var imageHeight = image.height;

    document.getElementById("contents").style.minHeight = (imageHeight + 80).toString() + "px";
    $("#contents").load("showImage.php?img=" + imagefile + "&height=" + imageHeight);
}

function loadHeader() {
    $("#header").load("header.php");
}

// Drag and Drop for the uploaded image

function allowDrop(event) {
    event.preventDefault();
}

//function drag(event) {
//    event.dataTransfer.setData("text", event.target.id);
//}

function drop(event) {
    event.preventDefault();

    var files = event.dataTransfer.files;

    if (files.length == 1 && files[0]){
        var file = files[0];

        document.getElementById("debug").innerHTML = file.name;

        if (allowedFormat(file)) {

            var reader = new FileReader();

            document.getElementById("debug").innerHTML = file.name + " OK!";

            reader.onload = function (e) {
                var dataBlob = reader.result;

                document.getElementById("debug").innerHTML = file.name + " UPLOADED!";
                
                var fd = new FormData();
                //fd.append('fname', 'test.bmp');
                fd.append('data', dataBlob);

                $.ajax({
                    type: 'POST',
                    url: '/upload.php',
                    data: fd,
                    processData: false,
                    contentType: false
                }).done(function (data) {
                    console.log(data);
                });
            }

            reader.readAsDataURL(file);
        } else {
            // Unsupported file format
        }  
    } else {
        // Too may files
    }  
}

function allowedFormat(file) {
    var splits = file.name.split('.');
    var extension = splits[splits.length - 1];

    if (extension == "bmp") return true;
    if (extension == "png") return true;
    if (extension == "jpeg" || extension == "jpg") return true;

    return false;
}
