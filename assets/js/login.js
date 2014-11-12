$(document).ready(function () {
    $(document).on("click", '#login', function () {
        var form_data = {
            username: $('#username').val(),
            password: $('#password').val()
        };
        $.ajax({
            url: document.location.protocol + "//" + document.location.hostname + "/user/login",
            type: 'POST',
            data: form_data,
            success: function(user_block_content) {
                $('.content').prepend("<div id=\"add-blog-post-wrapper\"><a id=\"add-blog-post\" href=\"http://ci.dev/blog/add_post_form\">Add new blog post</a></div>");
                $('#user-block').html(user_block_content);
            }
        });

        return false;
    });
});
