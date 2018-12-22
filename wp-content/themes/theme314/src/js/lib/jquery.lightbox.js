(function($) {

	$.fn.lightbox = function( options ) {

        //metoda prywatna
        var exit;
        var prev, next;
        var thumbnail;
        var thumb;

        function exitClick(){
            $('#ajax').removeClass('lightbox').html('');
            $('body').css('overflow-y', 'auto');

            return false;
        }

        function onClick(){
            return false;
        }

        //metody publiczne
        var methods = {
            createLightbox: function(param){
                //alert();
                $this = param;

                $("#ajax").empty();

                $('#ajax').append('<a id="exit" href="#">x</a>');
                $('#ajax').append('<div class="thumb"><div class="pic"></div></div>');

                $("#ajax").addClass('lightbox');
                $('body').css('overflow', 'hidden');

                $this.clone().appendTo("#ajax .thumb .pic");

                thumb = $("#ajax .thumb .pic a");
                thumb.click(onClick);

                exit = $('#ajax #exit');
            },
            addArrows: function(){
                $("#ajax .thumb").append('<a href="#" class="glyphicon glyphicon-arrow-left"></a><a href="#" class="glyphicon glyphicon-arrow-right"></a>');

                prev = $('.glyphicon-arrow-left');
                next = $('.glyphicon-arrow-right');
            },
            leftCLick: function(){
                var dataId = $('#ajax .thumb .pic a').attr('data-id');
                var list = document.querySelectorAll(".jwba_gallery a:not(.btn)");

                dataId = parseInt(dataId);

                if(dataId > 0){
                    var newId = dataId - 1;
                } else {
                    //var newId = dataId;
                    var newId = list.length - 1;
                }

                var newImg = $( ".jwba_gallery" ).find('a[data-id=' + newId + ']');
            //    console.log(newImg);

                $("#ajax .thumb .pic").empty();
                newImg.clone().appendTo("#ajax .thumb .pic");

                thumb = $("#ajax .thumb .pic a");
                thumb.click(onClick);

                return false;
            },
            rightClick: function(){
                var dataId = $('#ajax .thumb .pic a').attr('data-id');
                var list = document.querySelectorAll(".jwba_gallery a:not(.btn)");
                dataId = parseInt(dataId);

                if(dataId < list.length-1){
                    var newId = dataId + 1;
                } else {
                    //var newId = dataId;
                    var newId = 0;
                }

                var newImg = $( ".jwba_gallery" ).find('a[data-id=' + newId + ']');
            //    console.log(newImg);

                $("#ajax .thumb .pic").empty();
                newImg.clone().appendTo("#ajax .thumb .pic");

                thumb = $("#ajax .thumb .pic a");
                thumb.click(onClick);

                return false;
            },
            destroy: function() {
                //destruktor
                $this = $(this);
                $this.unbind("click");
                $this.css("background-color","");
                $this.removeData("lightbox");
            }
        };

        this.each( function() {

            if(methods[options]){
                //wywołana metoda publiczna
                return methods[options].apply( this, arguments );
            }
            else if (typeof options === 'object' || ! options ){
                //wywołany konstruktor
                var settings = $.extend( {
                  colorFirst : 'Red',
                  colorSecond: 'Green'
                }, options);


                //$(this).find('a').click(function(){
                $('.jwba_gallery').on("click","a:not(.btn)", function(){
                    $this = $(this);

                    $('.jwba_gallery a:not(.btn)').each(function( i, el ) {
                      //console.log( i + ": " + $( this ) );
                      $( el ).attr('data-id', i);
                    });

                    methods.createLightbox($this);
                    methods.addArrows();

                    $(exit).click(function(){
                        exitClick();

                        return false;
                    });

                    $(document).keyup(function(e) {
                        if (e.keyCode === 27) $(exit).click();   // esc
                    });

                    $(prev).click(function(){
                        methods.leftCLick();

                        return false;
                    });

                    $(next).click(function(){
                        methods.rightClick();

                        return false;
                    });

                    return false;
                });

                return;
            }
            else{
                //bład
                $.error('lightbox: no method: '+ options);
            }


        });
    }

	$('.jwba_gallery').lightbox();;
}(jQuery));