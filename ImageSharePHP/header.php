<div class="menu-button">
    <h6>Main</h6>
</div>
<div class="menu-button">
    <button id="hehe" type="button" onclick="contentMain()">database</button>
</div>
<div class="menu-button">
    <button id="hehe" type="button" onclick="contentUpload()">upload</button>
</div>
<div class="menu-button">
    <button id="hehe" type="button" onclick="contentImage('pixel.png')">image</button>
</div>
<div class="menu-button-right" style="padding-top: 12px;">
    <div id="my-signin2"></div>
    <script>
        function onSuccess(googleUser) {
            login(googleUser);
        }

        function onFailure(error) {
            console.log(error);
        }

        function renderButton() {
            gapi.signin2.render('my-signin2', {
                'scope': 'https://www.googleapis.com/auth/plus.login',
                'width': 250,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
            });
        }
    </script>

    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
</div>

