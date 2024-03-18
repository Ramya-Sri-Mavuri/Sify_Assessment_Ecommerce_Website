$(document).ready(function() {
    // Event listener for My Profile button
    $('#myProfileBtn').click(function() {
        // Fetch and display profile details in a modal dialog
        $.ajax({
            url: '../profile.php',
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