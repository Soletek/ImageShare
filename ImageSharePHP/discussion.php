
<?php

//require 'database.php';
//$mysql = connectToMYSQL();

//$uploaderIP = getClientIPAddress();
//$profile = "";

////$mysql = connectToMYSQL();
//$stmt = $mysql->prepare("INSERT INTO UploadedImages (imagecode, filename, upload_ip, upload_profile) VALUES (?, ?, ?, ?)");
//$stmt->bind_param("ssss", $imagecode, $filename, $uploaderIP, $profile);
//$stmt->execute();

//$stmt->close();
//$mysql->close();
//echo $imagecode;


?>

<script>
    function clearHint() {
        var inputArea = document.getElementById("comment-box");

        if (inputArea.value === inputArea.defaultValue) {
            inputArea.classList.remove("hint-text");
            inputArea.value = "";
        }
    }

    function submitMessage() {


    }
</script>

<form id="comment-input" style="width:350px; margin:30px;">
    <input type="text" name="name" class="input-field" size="30" maxlength="30" />
    <br />
    <br />
    <div class="text-wrapper">
        <textarea id="comment-box" type="text" name="comment" class="input-field hint-text"
            rows="7" cols="40" maxlength="3000" onmousedown="clearHint()">Enter a comment here</textarea>
    </div>
    <button type="button" onclick="asd()" style="float: right">submit</button>
</form>

