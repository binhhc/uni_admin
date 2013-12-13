function deleteAll(page){
    var count = 0;
    $.each($("input[name='cbID']:checked"), function() {
        count++;
    });
    if (count == 0)
    {
        alert('Bạn chưa chọn tin để xóa');
        return;
    }

    var r = confirm(" Bạn có chắc chắn xóa không ? ");
    if (r == true)
    {
        $.each($("input[name='cbID']:checked"), function() {

            // deletecontact($(this).attr('value'));
            id = $(this).attr('value');

            var data = "id=" + id;
            $.ajax({
                type: "News",
                async: false,
                data: data, // Form variables
                dataType: "json", // Expected response type
                url: "news/delete/" + id, // URL to request
                success: function(response) {
                },
                error: function() {
                }
            });
        });
        //window.location ="candidates/index/page:" + page;
    }
}