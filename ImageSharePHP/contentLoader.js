
var hostname = "http://localhost:63834/";

/*  Controls the browser back button
 *  This is necessary, because the page is not refreshed when content is changed.
 */
$(window).on("popstate", function (event) {
    event.preventDefault();
    var state = event.originalEvent.state;

    if (state.content == "upload") contentUpload(1);
    if (state.content == "image") contentImage(state.par1, 0, 1);
});

function loadHeader() {
    $("#header").load("header.php");
}

function contentUpload(reload) {
    if (!reload) window.history.pushState({ content: "upload" }, "", hostname);
    contentClear();
    $("#contents").load("uploadpage.php");
}

function contentMain() {
    $("#contents").load("database.php");
}

function contentImage(imageID, uploaded, reload) {
    if (!reload) window.history.pushState({ content: "image", par1: imageID }, "", hostname + '?img=' + imageID);
    contentClear();
    $("#contents").load("showImage.php?img=" + imageID + "&uploadstatus=" + uploaded);
}

function openDiscussionBox(topicID) {
    contentClear();
    $("#contents").load("discussion.php");
    //$("#chat").load("discussion.php");
}

/* 
 *  Clears a content area and shows a loading gif until a new content page is loaded.
 */
function contentClear() {
    $("#contents").empty();

    var loaderGif = $('<img>');
    loaderGif.attr("src", "ajax-loader.gif");
    loaderGif.attr("class", "middle");
    loaderGif.appendTo("#contents");
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

    if (files.length == 1 && files[0]) {

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
                enableUploadUI();
                console.log(data);
                contentImage(data, 1)  
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
