document.getElementById('voiceSearchBtn').addEventListener('click', function() {
    var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
    recognition.lang = 'en-US';
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;
    recognition.start();

    recognition.onresult = function(event) {
        var voiceSearchResult = event.results[0][0].transcript;
        document.getElementById('searchInput').value = voiceSearchResult;
    };
});


function showCategory(category) {
    // Hide all submenus
    var submenus = document.querySelectorAll('.toolbar-submenu');
    submenus.forEach(function(submenu) {
        submenu.style.display = 'none';
    });

    // Show submenu for the selected category
    var submenu = document.getElementById(category + '-submenu');
    if (submenu) {
        submenu.style.display = 'block';
    }
}

function validateForm() {
    
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var passwordError = document.getElementById("passwordError");

    if (password !== confirmPassword) {
        passwordError.innerHTML = "Passwords do not match";
        return false;
    } else {
        passwordError.innerHTML = "";
        return true;
    }

    
}
