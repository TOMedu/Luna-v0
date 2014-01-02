<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>LunaMobile</title>
        <link rel="shortcut icon" type="image/x-icon" href="jarvis.ico"> 
        <link rel="stylesheet" href="themes/css/apple.css" title="jQTouch">
        <script type="text/javascript" charset="utf-8">
            var jQT = new $.jQTouch({
                icon: 'jqtouch.png',
                icon4: 'jqtouch4.png',
                addGlossToIcon: false,
                startupScreen: 'jqt_startup.png',
                statusBar: 'black-translucent',
                themeSelectionSelector: '#jqt #themes ul',
                preloadImages: []
            });
            $(function(){
                $('#swipeme').swipe(function(evt, data) {
                    var details = !data ? '': '<strong>' + data.direction + '/' + data.deltaX +':' + data.deltaY + '</strong>!';
                    $(this).html('You swiped ' + details );
                    $(this).parent().after('<li>swiped!</li>')
                });
                $('#tapme').tap(function(){
                    $(this).parent().after('<li>tapped!</li>')
                });
                $('a[target="_blank"]').bind('click', function() {
                    if (confirm('This link opens in a new window.')) {
                        return true;
                    } else {
                        return false;
                    }
                });
                $('#pageevents').
                    bind('pageAnimationStart', function(e, info){ 
                        $(this).find('.info').append('Started animating ' + info.direction + '&hellip;  And the link ' +
                            'had this custom data: ' + $(this).data('referrer').data('custom') + '<br>');
                    }).
                    bind('pageAnimationEnd', function(e, info){
                        $(this).find('.info').append('Finished animating ' + info.direction + '.<br><br>');

                    });
                $('#callback').bind('pageAnimationEnd', function(e, info){
                    if (!$(this).data('loaded')) {
                        $(this).append($('<div>Loading</div>').load('ajax.html .info', function() {    
                            $(this).parent().data('loaded', true);  
                        }));
                    }
                });
                $('#jqt').bind('turn', function(e, data){
                    $('#orient').html('Orientation: ' + data.orientation);
                });
                
            });
        </script>
        <style type="text/css" media="screen">
            #jqt.fullscreen #home .info {
                display: none;
            }
        </style>
    </head>
    <body>
        <div id="jqt">
    
            <div id="home" class="current">
                <div class="toolbar">
                    <h1>Login</h1>
                </div>
                <div class="scroll">
 <form class="scroll" action="../login/auth.php?remote=1" method="post">
                    <ul class="edit rounded">
                        <li><input type="text" name="username" placeholder="Username" id="some_name" /></li>
                        <li><input type="password" name="password" placeholder="Password" id="some_name" /></li>
                        <center><input type="submit" class="grayButton" style="width:80%" value="Login"></center>
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>