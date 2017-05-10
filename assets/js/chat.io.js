$(document).ready(function(){
    // simple ajax calls function
    function myAjax(t, n, o, type = 'post') {
        if (type == 'post') {
            var id = $(t).attr("id");
            var query = $(t).attr("query");
            var value = $(t).attr("value");
            var e = 'id='+ encodeURIComponent(id) + '&query='+ encodeURIComponent(query) + '&value='+ encodeURIComponent(value);
        }else if(type == 'form'){
            var e = new FormData(t);

        }

        if (type == 'post') {
            $.ajax({
                type: "POST",
                url: n,
                data: e,
                dataType: "html",
                beforeSend: function() {
                    NProgress.start();
                },
                success: function(t) {
                    $(o).html(t).show(); 
                    NProgress.done();
                }
            });
        }else if (type == 'form'){
            $.ajax({
                type: "POST",
                url: n,
                data: e,
                cache: !1,
                contentType: !1,
                processData: !1,
                beforeSend: function() {
                    NProgress.start();
                },
                success: function(t) {
                    $(o).html(t).show(); 
                    NProgress.done();
                },
                error: function(t) {
                    console.log("something's wrong");
                }
            });
        }
    }


 /* chat js */
    function scrollDown(div){
        // scroll in zero seconds
        $(div).animate({ scrollTop: $(div)[0].scrollHeight}, 0);
    }
    function spawnNotification(theTitle,theIcon,theBody,vibration) {
        var options = {
            body: theBody,
            icon: theIcon,
            vibrate: vibration
        }
        var n = new Notification(theTitle,options);
        n.vibrate;
    }
    function chat(t, n, o){
        var e = new FormData(t);
        $.ajax({
            type: "POST",
            url: n,
            data: e,
            cache: !1,
            contentType: !1,
            processData: !1,
            beforeSend: function() {
            },
            success: function(t) {
                $(o).append(t).fadeIn("show"); 
            },
            error: function(t) {
                console.log("something's wrong");
            }
        });
    }

    $(document).on("submit",  "#chatForm", function(e){
        e.preventDefault();
        $dest = $(this).attr("dest");
        chat(this, $dest, ".chat-body");
        $(this).find("textarea").val("");
        
        // scroll down to bottom of chat chat body
        $(".chat-body").animate({ scrollTop: $(".chat-body")[0].scrollHeight}, 1000);
        $counter = 0;

        // restart updater function
        $updaterFunction = setInterval(updater, 1000);
    });

    function updater(){
        $(".message-updater").trigger("click");
    }

    function scroll(element, counter){
        if (element != $(".chat-body")[0].scrollHeight)
            $(".chat-body").animate({ scrollTop: $(".chat-body")[0].scrollHeight}, 1000); 
    }

    $counter = 0;
    $(document).on("click", ".message-updater", function(e){
        e.preventDefault();
        $height = $(".chat-body")[0].scrollHeight;

        console.log("active");

        $dest = $(this).attr("dest");
        $.ajax({
            type: "POST",
            url: $dest,
            data: 'id=' + $(this).attr("id"),
            dataType: "html",
            success: function(t) {
                $(".chat-body").html(t).show(); 
            }
        });

        setTimeout(function() {scroll($height, $counter)}, 1000);
        $counter++;
    });

    var updaterFunction = setInterval(updater, 1000);
});