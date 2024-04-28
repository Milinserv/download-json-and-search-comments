$(document).ready(function() {
    $('#btn').click(function() {
        $.ajax({
            url: 'src/controllers/DataController.php',
            type: 'GET',
            success: function(data) {
                console.log('Загружено', data.postsCount,'записей и', data.commentsCount,'комментариев');
            },
            error: function(xhr) {
                alert('Произошла ошибка при загрузке данных');
            }
        });
    });

    const input = document.querySelector('input');

    $('#input1').click(function () {

        $("#error").css("visibility", "hidden");
        const tbody = $('<tbody></tbody>')

        if (input.value.length >= 3) {
            $('#myTable').remove();
            $.ajax({
                url: 'src/controllers/SearchController.php',
                type: 'POST',
                data: {
                    'search': input.value
                },
                success: function(data) {
                    $('#table').append(tbody);
                    tbody.attr('id', 'myTable');
                    data.found.map((item) => {
                        $('#myTable').append(
                            '<tr>' +

                            '<td>' + item.name + '</td>' +

                            '<td>' + item.body + '</td>' +

                            '</tr>',
                        );
                    })

                },
                error: function() {
                    alert('Произошла ошибка при загрузке данных');
                }
            });
        } else {
            $("#error").css("visibility", "visible");
            $('#myTable').remove();
        }
    });
});

