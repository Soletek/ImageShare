


function contentUpload() {
    $("#contents").load("uploadpage.php");
}

function contentMain() {
    $("#contents").load("database.php");
}

function contentImage(imagefile, uploaded) {
    

    var image = new Image();
    image.src = "/img/" + imagefile;
    var imageHeight = image.height;

    console.log(imagefile + " " + imageHeight);

    $("#contents").load("showImage.php?img=" + imagefile + "&height=" + imageHeight + "&uploadstatus" + uploaded);

    document.getElementById("contents").style.minHeight = (imageHeight + 80).toString() + "px";
}

function loadHeader() {
    $("#header").load("header.php");
}

function login(googleUser) {
    console.log('Logged in as: ' + googleUser.getBasicProfile().getName());

    $.ajax({
        url: '/login.php',
    }).done(function (data) {
        console.log(data);
    });

}

// Drag and Drop 

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
        uploadImage(files[0]);
    } else {
        // Too may files
    }  
}

// Upload

function uploadImage(file) {
    disableUploadUI();

    if (allowedFormat(file)) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var dataBlob = reader.result;
            var fd = new FormData();
            fd.append('data', dataBlob);

            $.ajax({
                type: 'POST',
                url: '/upload.php',
                data: fd,
                processData: false,
                contentType: false
            }).done(function (data) {
                //enableUploadUI();
                console.log(data);
                window.location.href = 'http://localhost:63834/?img=' + data;
                //contentImage(data, 1)  
            });
        }

        reader.readAsDataURL(file);
    } else {
        // Unsupported file format
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
