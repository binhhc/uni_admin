function deleteAll(page){
    var count = 0;
    $.each($("input[name='cbID']:checked"), function() {
        count++;
    });
    if (count == 0)
    {
        alert('Please choosen item');
        return;
    }

    var r = confirm("削除してもよろしいですか？");
    if (r == true)
    {
        $.each($("input[name='cbID']:checked"), function() {
            // deletecontact($(this).attr('value'));
            id = $(this).attr('value');

            var data = "id=" + id;

            $.ajax({
               // async: false,
                data: data, // Form variables
                dataType: "json", // Expected response type
                url: page +"/delete/" + id, // URL to request
                success: function(response) {
                    window.location.reload(true);
                },
                error: function() {
                }
            });
        });
    }
}