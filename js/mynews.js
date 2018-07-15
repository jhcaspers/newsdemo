/*
* This is a "document ready" function in jQuery writing
* */
/* Global timer variable*/
var jsTimer;
/* Global variable for last news id */
var lastId = 0;

function doAjaxCall()
{
    /* check timer, just in case it's still active (not doing this can cause strange behaviors)*/
    if (jsTimer) clearTimeout(jsTimer);
    /* create an ajax call
    * i will skip all timeout and error handling in this example
    * */
    $.ajax({
        method: "POST",
        url: "index.php",
        /* pass the last id as data with the call */
        data: { getnews: lastId },
        dataType: 'json'
    })
        .done(function( data ) {
            /* update the cloxk*/
            $("#clockoutput").html(data.time);
            /* update the lastId*/
            lastId=data.lastid;
            /* check if there is new news*/
            if (data.newnews) {
                /* update the news display*/
                $("#lastmessagedate").html(data.lastdate);
                $("#newsticker").prepend(data.newstext);
            }
            /* start a new timer */
            jsTimer = setTimeout(doAjaxCall, 30000);
        });
}

$(function() {
    jsTimer = setTimeout(doAjaxCall, 30000);
});