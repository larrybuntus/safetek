$(document).ready(function(){

    // navigation function
    function nav(){
        var url = window.location;
        var element = $('.side-nav li a.link').filter(function() {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }).parent().addClass('active');
        $display = $(".side-nav li.active a").attr("data-display");
        $(".brand-logo.main").text($display);
        $("title").text($display);
    }
    // call navigation function
    nav();

     // simple ajax calls function
    function myAjax(t, n, o, type = 'post') {
        var e = '';
        if (type == 'post') {
            var id = $(t).attr("id");
            var query = $(t).attr("data-query");
            var value = $(t).attr("data-value");
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
                    $(o).html('Processing ...');
                },
                success: function(t) {
                    $(o).html(t).show();
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
                    $(o).html('Processing ...');
                },
                success: function(t) {
                    $(o).html(t).show();
                },
                error: function(t) {
                    console.log("something's wrong")
                }
            });
        }
    }

    /*realtime search function*/
    function getStates(thisInput){
        console.log($(thisInput).val());
        var query = $(thisInput).attr("data-query");
        var search = $(thisInput).val();
        var destination = $(thisInput).attr("data-dest");
        var output = $(thisInput).attr("data-output");
        var set = $(thisInput).attr("data-id");

        $.post(destination, {search:search, id:query, set:set},function(data){
            $(output).html(data);
        });
    }

    // image view before upload
    function readUrl(input,dest){
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            // read image and load into src attribute in img tag
            reader.onload = function (e) {
                $(dest).attr('src', e.target.result);
                console.log('onload');

                // get image size in megabyte
                var size = input.files[0].size;
                var size_mb = Math.ceil(size/1024);

                // check if greater than 3MB
                if (size_mb >= 3000) {
                    // material modal
                    $('.modal-content').html('<p class="flow-text red-text center-align">Image too big, compress and re-upload</p>');
                    $('#modal').modal('open');
                    // empty input
                    $(input).val('');

                    return true;
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // changing image
    $(document).on('change', '.image', function(e){
        readUrl(this,$(this).parent().find('img'));
    })

    // smooth scroll
    $(document).on("click", ".smooth[href^='#']", function(e) {
       e.preventDefault();
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000, function(){
            // window.location.hash = this.hash;
        });
    });

    /*specific calls and output*/
    $(document).on("click", ".spec-ajax", function(e){
        e.preventDefault();
        $output = $(this).attr("data-output");
        $dest = $(this).attr("data-dest");
        $trigger = $(this).attr("data-trigger");
        $fadeOut = $(this).attr("data-fadeOut");
        $extend = $(this).attr("data-extend-view");
        $parent = $(this).attr("data-parent");
        $checkout = $(this).attr("data-checkout");
        $back = $(this).attr("data-back");

        if (typeof($trigger) != 'undefined' || $trigger != null) {
            $($trigger).trigger("click");
            return;
        }

        if (typeof($extend) != 'undefined' || $extend != null) {
            $source = $(this).parents($parent).find($extend);
            $($output).html($($source).html());

            if ($(this).attr("data-toggle") == 'modal') {
                $("#modal").modal("open");
            } 
            return;
        }

        if (typeof($back) != 'undefined' || $back != null) {
            window.history.back();
            return;
        }
        
        myAjax(this, $dest, $output);

        if ($(this).attr("data-toggle") == 'modal') {
            $("#modal").modal("open");
        } 

        if(typeof($fadeOut) != 'undefined' || $fadeOut != null){
            $(this).parents($fadeOut).fadeOut("slow").html("");
        }

        if(typeof($checkout) != 'undefined' || $checkout != null){
            $('input[type=checkbox]').each(function () {
            if(this.checked)
                $(this).parents($checkout).fadeOut("slow").html("");
            });
        }

    });

    /*specific form ajax calls*/
    $(document).on("submit", ".form", function(e){
        e.preventDefault();
        $output = $(this).attr("data-output");
        $dest = $(this).attr("data-dest");
        $checkout = $(this).attr("data-checkout");

        myAjax(this, $dest, $output, 'form');


        if ($(this).attr("data-toggle") == 'modal') {
            $("#modal").modal("open");
        }

        if ($(this).attr("data-clear-input") == 'true') {
            $(this).find("input,textarea").val("");
        }

        if(typeof($checkout) != 'undefined' || $checkout != null){
            $('input[type=checkbox]').each(function () {
            if(this.checked)
                $(this).parents($checkout).fadeOut("slow").html("");
            });
        }
    });

    // dynamic search initialized
    $(document).on("keyup", ".dynamic-search", function(e){
        getStates(this);
    });

    // checkbox trigger
    $(document).on("change", ".check", function(e){
        if(this.checked) {
            $("#delete").removeClass("hide");
            $("#update").removeClass("hide");
        }else{
            if(!$("input.check").is(':checked')){
                $("#delete").addClass("hide");
                $("#update").addClass("hide");
            }
        }
        // define variables
        $counter = 0;
        $id = '0';
        $('input[type=checkbox]').each(function () {
            if(this.checked){
                $id += "," + $(this).val();
                $counter++;
            }
        });

        // assignment
        $("#delete").attr("data-query", $id);
        $("#update").attr("data-query", $id);

        if ($counter > 0)
            $(".selected").text($counter + " item selected");
        else if ($counter === 0)
            $(".selected").text("");
        
        if ($counter > 1 || $counter == 0)
            $("#update").addClass("hide");
        else
            $("#update").removeClass("hide");

    });
})