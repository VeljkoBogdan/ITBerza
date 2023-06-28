$(document).ready(function() {
    var isCardBoxVisible = false;

    function loadCardBoxes() {
        $.ajax({
            url: 'load-card-boxes.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response && response.length > 0) {
                    if (isCardBoxVisible) {
                        $('.card-container').empty();
                        isCardBoxVisible = false;
                    } else {
                        $.each(response, function(index, item) {
                            var positionName = item.position_name;
                            var companyName = item.company_name;
                            var idJob = item.id_job;
                            var cardBox = '<a class="link-disabled" href="job-details.php?id=' + idJob + '" class="card-link">' +
                                '<div class="card card-side card-rounded">' +
                                '<div class="card-body card-side-body">' +
                                '<h4 class="card-title">' + positionName + '</h4>' +
                                '<h5 class="card-subtitle mb-2 text-muted">' + companyName + '</h5>' +
                                '</div>' +
                                '</div>' +
                                '</a>';

                            $('.card-container').append(cardBox);
                        });

                        isCardBoxVisible = true;
                    }
                }
            },
            error: function() {
                console.log('Error occurred during AJAX request.');
            }
        });
    }

    $('.load-card-boxes-link').on('click', function(e) {
        e.preventDefault();
        loadCardBoxes();
    });

    $('#toggleFormBtn').click(function() {
        $('#searchForm').slideToggle();
    });

// -----------------------------------------CHAT---------------------------------------------- //
    var url = window.location.href;
    var urlWithoutParams = url.split('?')[0];

    if (urlWithoutParams.endsWith('chat.php')) {   // ajax error corrected
        var urlParams = new URLSearchParams(window.location.search);
        var currentUser = urlParams.get('currentUser');
        var otherUser = urlParams.get('otherUser');

        // Load the initial messages
        loadMessages();

        // Load messages when the page is loaded and every 3 seconds
        setInterval(function() {
            loadMessages();
        }, 3000);

        // Handle sending a new message
        $('#send-btn').click(function() {
            var message = $('#message-input').val();
            if (message.trim() !== '') {
                var currentTime = new Date().toLocaleTimeString();
                message = "<small>(" + currentTime + ") " + currentUserEmail + "</small>: " + message;
                sendMessage(message);
                $('#message-input').val('');
            }
        });

        // Handle pressing Enter key to send a message
        $('#message-input').keypress(function(event) {
            if (event.which === 13) {
                var message = $('#message-input').val();
                if (message.trim() !== '') {
                    var currentTime = new Date().toLocaleTimeString();
                    message = "<small>(" + currentTime + ") " + currentUserEmail + "</small>: " + message;
                    sendMessage(message);
                    $('#message-input').val('');
                }
                return false;
            }
        });

        // Load messages from the server
        function loadMessages() {
            $.ajax({
                url: 'load_messages.php',
                type: 'POST',
                data: {
                    currentUser: currentUser,
                    otherUser: otherUser
                },
                success: function(response) {
                    $('#message-container').html(response);
                    scrollChatToBottom();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Send a new message to the server
        function sendMessage(message) {
            $.ajax({
                url: 'send_message.php',
                type: 'POST',
                data: {
                    currentUser: currentUser,
                    otherUser: otherUser,
                    message: message
                },
                success: function(response) {
                    loadMessages(); // Reload messages after sending
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Scroll the chat container to the bottom
        function scrollChatToBottom() {
            var container = document.getElementById('message-container');
            container.scrollTop = container.scrollHeight;
        }
    }


});
