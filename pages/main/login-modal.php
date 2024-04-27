<head>
    <link rel="stylesheet" type="text/css" href="login-modal.css" />
</head>

<body>
    <div id="msgModal" class="msg-modal close-modal modal">
        <div class="msg-modal-content">
            <div class="msg-modal-body">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"></circle>
                    <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"></line>
                    <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"></line>
                </svg>
                <p>Bạn chưa đăng nhập!</p>
                <button class="bt-modals" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
    <script>
        var modal = document.getElementById("msgModal");
        var span = document.getElementsByClassName("close-modal")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>