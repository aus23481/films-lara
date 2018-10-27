//Adding Film
function addFilm() {

    var data = $("#form_add_film").serialize();

    if (isNaN($("#ticket_price").val())) {
        alert("please enter valid price");
    }
    if ($("#name").val() != "" && $("#description").val() != "" && $("#release_date").val() != "" && $("#rating").val() != "" && $("#ticket_price").val() != "") {

        $.ajax({
            type: "post",
            url: baseurl + '/create-film',
            data: data + "&_token=" + _token,
            success: function(data) {
                if (data.success) {
                    alert("Film Created");
                    window.location.reload(true);
                }
                alert("Film Not Created");
            }
        });
    } else alert("Please Enter All fields values");
}

//Get Comments

function getComments() {
    $.ajax({
        type: "get",
        url: baseurl + '/get-comments',
        data: "film_id=" + $("#film_id").val() + "&_token=" + _token,
        success: function(data) {
            if (data.success) {

                var comment_str = "<hr>";
                $.each(data.comments, function(i, comment) {
                    // alert(i + comment.id);
                    console.log(comment.comment);
                    comment_str += '<div><small>By ' + comment.user.name + '  Created at ' + comment.created_at + '</small></div>';
                    comment_str += '<div>' + comment.comment + '</div><hr>';

                });

                $("#div_comments").html(comment_str);

            }

        }
    });
}

//add comment


function addComment() {

    var data = $("#comment").val();

    if ($("#comment").val() != "") {

        $.ajax({
            type: "post",
            url: baseurl + '/add-comment',
            data: "comment=" + encodeURIComponent($("#comment").val()) + "&film_id=" + $("#film_id").val() + "&_token=" + _token,
            success: function(data) {
                if (data.success) {
                    alert("Comment Created");
                    getComments();

                } else alert("Comment Not Created");
            }
        });
    } else alert("Please Enter valid comment");
}


getComments();