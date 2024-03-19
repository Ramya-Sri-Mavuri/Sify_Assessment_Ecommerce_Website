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
        }else {
            passwordError.innerHTML = "";
            return true;
        }
}


// $(document).ready(function() {
//     // Event listener for My Profile button
//     $('#myProfileBtn').click(function() {
//         // Toggle visibility of profile details container
//         $('#profileDetails').toggle();

//         // If profile details are visible, fetch and display them
//         if ($('#profileDetails').is(':visible')) {
//             $.ajax({
//                 url: 'profile.php',
//                 type: 'GET',
//                 success: function(response) {
//                     // Insert fetched profile details into profile details container
//                     $('#profileDetails').html(response);
//                 },
//                 error: function(xhr, status, error) {
//                     console.error('Error fetching profile details:', error);
//                 }
//             });
//         }
//     });
// });
$(document).ready(function() {
    // Event listener for My Profile button
    $('#myProfileBtn').click(function() {
        // Fetch and display profile details in a modal dialog
        $.ajax({
            url: 'profile.php',
            type: 'GET',
            success: function(response) {
                // Create modal dialog
                $('body').append('<div id="profileModal" class="modal">' + 
                                    '<div class="modal-content">' + 
                                        '<span class="close">&times;</span>' + 
                                        '<div id="profileDetails">' + response + '</div>' +
                                    '</div>' +
                                '</div>');

                // Show modal dialog
                $('#profileModal').show();

                // Close modal dialog when close button is clicked
                $('.close').click(function() {
                    $('#profileModal').remove();
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching profile details:', error);
            }
        });
    });
});


