/**
 * Created by Evstati on 14-8-26.
 */
$(document).ready(function () {

    $(".category").click(function () {
        $.post('showCategory.php', {id: this.id}, function (response) {
            // log the response to the console
            console.log("Response: " + response);
            $("#forum").html(response);
        });
    });
    $(".topic").click(function () {
        $.post('showTopic.php', {id: this.id}, function (response) {
            // log the response to the console
            console.log("Response: " + response);
            $("#forum").html(response);
        });
    });
});