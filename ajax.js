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
});
