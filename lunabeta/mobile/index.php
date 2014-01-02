<?php
include($_SERVER['DOCUMENT_ROOT']."/lunabeta/api/user.php");
include($_SERVER['DOCUMENT_ROOT']."/lunabeta/api/connect.php");
if($user==""){
  echo '<script type="text/javascript">
window.location = "http://tomedu.org/lunabeta/mobile/login.php"
</script>';
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>LunaMobile</title>
        <link rel="shortcut icon" type="image/x-icon" href="jarvis.ico"> 
        <link rel="stylesheet" href="themes/css/apple.css" title="jQTouch">
        <script src="src/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="src/jqtouch.min.js" type="text/javascript" charset="utf-8"></script>
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
            <div id="lunaspeak">
                <div class="toolbar">
                    <h1>Luna Speak</h1>
                    <a href="#" class="back">Back</a>
                </div>
                <form class="scroll">
                    <ul class="edit rounded">
                        <li><textarea placeholder="I am awesome" id="lunaspeakstring"></textarea></li>
						<a href="#" class="whiteButton" id="lunaspeakbtn">Luna Speak</a>
                    </ul>
                </form>
            </div>
			<div id="lunaspeak2">
                <div class="toolbar">
                    <h1>Multitask: Luna Speak</h1>
                    <a href="#" class="back">Back</a>
                </div>
                <form class="scroll">
                    <ul class="edit rounded">
                        <li><textarea placeholder="I am awesome" id="lunaspeak2string"></textarea></li>
						<a href="#" class="whiteButton" id="lunaspeak2btn">Luna Speak</a>
                    </ul>
                </form>
            </div>
			<div id="irc">
                <div class="toolbar">
                    <h1>Luna Speak</h1>
                    <a href="#" class="back">Back</a>
                </div>
                <form class="scroll">
                    <ul class="edit rounded">
                        <li><textarea placeholder="Yes sir?" id="command" name="command"></textarea></li>
						<a class="whiteButton" id="commandissuebtn">Issue Remote Luna Command</a>
                    </ul>
                </form>
            </div>
            <div id="mymusic">
                <div class="toolbar">
                    <h1>My music</h1>
                    <a href="#" class="back">Back</a>
                </div>
                <form class="scroll">
                      <?php 
                      $q = mysql_query("SELECT * FROM music WHERE owner='$user'");
                      if(mysql_num_rows($q)===0){
                      echo '<h2>No music here :(</h2><br>Why not add some through the Luna Desktop menu!';
                      } else {
                      echo '<h2>Click to play</h2><ul class="rounded">';
                      while($result=mysql_fetch_array($q)){
                      echo '<li class="arrow"><a class="mymusicbtn" id="'.$result['name'].'">'.ucwords($result['name'])."</a></li>";
                      }
                      }
                      ?>
                    </ul>
                    <ul class="rounded">
                                            <li class="arrow"><a id="hotmusicbtn">Play Hot Music</a> </li>
                                           </ul>
                </form>
            </div>
            <div id="home" class="current">
                <div class="toolbar">
                    <h1>LunaMobile</h1>
                </div>
                <div class="scroll">
				<h2>Command Center</h2>
                    <ul class="rounded">
                        <li class="arrow"><a href="#lunaspeak">Luna Speak</a> </li>
                        <li class="arrow"><a href="#irc">Issue Remote Command <small class="counter">BETA</small></a></li>
                    </ul>
                    		<h2>Multitask</h2>
					<ul class="rounded">
                        <li class="arrow"><a href="#lunaspeak2">Luna Speak</a> </li>
                    </ul>
					<h2>Music</h2>
					<ul class="rounded">
                        <li class="arrow"><a id="hotmusicbtn">Play Hot Music</a> </li>
                        <li class="arrow"><a href="#animations">Play Random Music</a></li>
						<li class="arrow"><a href="#mymusic">My Music</a></li>
                    </ul>
                    <ul class="individual">
                        <li><a target="_blank" href="#">Post a Tweet</a></li>
                        <li><a target="_blank" href="#">Follow @LunaBot</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
    <script>
    		    $(function() {
$("#lunaspeakbtn").tap(function() {
var lunaspeakstring = $("#lunaspeakstring").val();
var dataString = 'lunaspeakstring='+ lunaspeakstring;
$.ajax({
type: "POST",
url: "http://tomedu.org/lunabeta/sockets/speakserver.php",
data: dataString,
success: function(){
$('#lunaspeakbtn').text("Success! Luna Speak");
}
});
return false;
});
});
  $(function() {
$("#lunaspeak2btn").tap(function() {
var lunaspeak2string = $("#lunaspeak2string").val();
var dataString = 'lunaspeakstring='+ lunaspeak2string + "&multi=1";
$.ajax({
type: "POST",
url: "http://tomedu.org/lunabeta/sockets/speakserver.php",
data: dataString,
success: function(){
$('#lunaspeak2btn').text("Success! Luna Speak");
}
});
return false;
});
});

    		    $(function() {
$("#hotmusicbtn").tap(function() {
var dataString = 'getmode=hot';
$.ajax({
type: "POST",
url: "http://tomedu.org/lunabeta/sockets/musicserver.php",
data: dataString,
success: function(){
$('#hotmusicbtn').text("Play Hot Music (Playing...)");
}
});
return false;
});
});

    		    $(function() {
$("#commandissuebtn").tap(function() {
var command = $("#command").val();
var dataString = 'command='+command;
$.ajax({
type: "POST",
url: "http://tomedu.org/lunabeta/sockets/commandserver.php",
data: dataString,
success: function(){
$('#commandissuebtn').text("Success! Issue Remote Command");
}
});
return false;
});
});
    $(function() {
$(".mymusicbtn").tap(function() {
var id = this.id;
var command = "play my "+id+" music"
var dataString = 'command='+command;
$.ajax({
type: "POST",
url: "http://tomedu.org/lunabeta/sockets/commandserver.php",
data: dataString,
});
return false;
});
});
</script>
</html>