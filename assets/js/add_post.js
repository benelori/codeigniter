$(document).ready(function () {
    $(document).on("click", '#add-blog-post', function () {
        $.ajax({
            url: document.location.protocol + "//" + document.location.hostname + "/blog/add_post_form",
            type: 'GET',
            success: function(add_blog_post_form) {
                $('#add-blog-post-wrapper').html(add_blog_post_form);
            }
        });

        return false;
    });

    $(document).on("click", '#submit-blog-post', function () {
        var form_data = {
            title: $('#blog-post-title').val(),
            body: $('#blog-post-body').val(),
            featured: $('#blog-post-featured').is(":checked")
        };

        $.ajax({
            url: document.location.protocol + "//" + document.location.hostname + "/blog/add_post_form_submit",
            type: 'POST',
            data: form_data,
            success: function(add_blog_post_form) {
                console.log(add_blog_post_form + "LOL");
                $('#add-blog-post-wrapper').after("<div class=\"blog-post\">" + add_blog_post_form + "</div>");
                $('#add-blog-post-wrapper').html("<a id=\"add-blog-post\" href=\"http://ci.dev/blog/add_post_form\">Add new blog post</a>");
            }
        });

        return false;
    });
});
