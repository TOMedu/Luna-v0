<?php
include("api/user.php");
if($user==""){
  echo '<script type="text/javascript">
window.location = "http://tomedu.org/lunabeta/login/"
</script>';
}
?>
<!DOCTYPE html>
<meta charset="utf-8">
<head>
<link rel="shortcut icon" type="image/x-icon" href="jarvis.ico"> 
<link rel="icon" href="http://tutor.tomedu.org/wp-content/uploads/2013/04/jarvis.png" type="image/png">
<link rel="icon" href="assets/48.png" sizes="48x48" />
<link rel="icon" href="assets/64.png" sizes="64x64" />
<meta property="og:image" content="http://tomedu.org/lunabeta/listening.png" />
<meta property="og:title" content="Luna" />
<meta property="og:site_name" content="Luna" />
<meta property="og:description" content="Hello sir, I am  Luna." />
<link rel="stylesheet" href="assets/modalstyles.css">
		<link rel="stylesheet" href="assets/avgrund.css">
<link href='//fonts.googleapis.com/css?family=Roboto:400,100' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="jkey.js">
<?php if($_GET['remote']==""){include('remote.php');} ?>
<title>Luna</title>
<style>
  * {
    font-family: Verdana, Arial, sans-serif;
    overflow:hidden;
  }
  body{
  background:url('bg3.png?refresh=2');
  background-color:#00a7cc;
  }
  a:link {
    color:#000;
    text-decoration: none;
  }
  a:visited {
    color:#000;
  }
  a:hover {
    color:#33F;
  }
  .button {
    background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
    border: 1px solid #076bd2;
    border-radius: 3px;
    color: #fff;
    display: none;
    font-size: 13px;
    font-weight: bold;
    line-height: 1.3;
    padding: 8px 25px;
    text-align: center;
    text-shadow: 1px 1px 1px #076bd2;
    letter-spacing: normal;
  }
  .center {
    padding: 10px;
    text-align: center;
    text-shadow: 0 0 1px #000;
  }
  .final {
    color: black;
    padding-right: 3px; 
  }
  .interim {
    color: gray;
  }
  .info {
    font-size: 14px;
    text-align: center;
    color: #777;
    display: none;
  font-family:'Roboto','Arial';
  }

  .sidebyside {
    display: inline-block;
    width: 45%;
    min-height: 40px;
    text-align: left;
    vertical-align: top;
  }
  #headline {
    font-size: 40px;
    font-weight: 300;
  }
  #info {
    font-size: 20px;
    text-align: center;
    color: #777;
    visibility: hidden;
  font-family:'Roboto','Arial';
  }
  #results {
    font-size: 14px;
    font-weight: bold;
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
    min-height: 150px;
    display:none;
  }
  #start_button {
    border: 0;
    width:100%;
    margin-top:20px;
    background-color:transparent;
    padding: 0;
    outline:none;
  }
  h1{
  font-family:'Roboto','Arial';
  font-size:54px;
  }
  
  /* Search bar style, credits to Google Maps team! */
 .searchbox{background-color:#fff;border:1px solid transparent;border-right:0;border-radius:2px 0 0 2px;box-sizing:border-box;-moz-box-sizing:border-box;height:32px;outline:none;padding:0 11px 0 13px;width:300px;vertical-align:top;-webkit-transition:all 200ms cubic-bezier(0.52,0,0.48,1);-moz-transition:all 200ms cubic-bezier(0.52,0,0.48,1);-ms-transition:all 200ms cubic-bezier(0.52,0,0.48,1);-o-transition:all 200ms cubic-bezier(0.52,0,0.48,1);transition:all 200ms cubic-bezier(0.52,0,0.48,1)}.app-imagery-mode .cards-minimized .searchbox{background-color:#f6f6f6}.searchbox-shadow{box-shadow:0 2px 6px rgba(0,0,0,0.3),0 4px 15px -5px rgba(0,0,0,0.0);-webkit-transition:all 200ms cubic-bezier(0.52,0,0.48,1);-moz-transition:all 200ms cubic-bezier(0.52,0,0.48,1);-ms-transition:all 200ms cubic-bezier(0.52,0,0.48,1);-o-transition:all 200ms cubic-bezier(0.52,0,0.48,1);transition:all 200ms cubic-bezier(0.52,0,0.48,1)}.cards-minimized .searchbox-shadow{box-shadow:0 2px 6px rgba(0,0,0,0.3),0 4px 15px -5px rgba(0,0,0,0.3)}.searchboxinput{line-height:30px;width:100%}.searchbutton{margin-top:8px;margin-left:7px;margin-left:-53px;background-color:#4d90fe;background-image:-webkit-linear-gradient(top,#4d90fe,#4787ed);border:0;border-radius:0 2px 2px 0;box-shadow:0 2px 6px rgba(0,0,0,0.3);height:32px;left:400px;position:absolute;text-align:center;top:0;vertical-align:top;width:72px;z-index:-1}.searchbutton:hover{background-color:#357ae8;background-image:-webkit-linear-gradient(top,#4d90fe,#357ae8)}.searchbutton:focus{border:1px solid transparent;box-shadow:0 2px 6px rgba(0,0,0,0.3),inset 0 0 0 1px rgba(255,255,255,0.5);outline:none}.searchbutton:active{box-shadow:0 2px 6px rgba(0,0,0,0.3),inset 2px 0 6px -1px rgba(0,0,0,0.3)}.searchbutton::before{background:url(assets/search-button.png);content:"";display:block;height:17px;margin:0 auto;width:17px}.highres .searchbutton::before{background:url(assets/search-button-2x.png);background-size:17px}.sbox-focus{margin-left:-1px;padding-left:14px;width:401px;border-color:#4d90fe !important}.searchbox input{background-color:transparent;border:0;font-size:15px;font-weight:300;margin:0;outline:0;padding:0;width:100%;box-shadow:none;height:auto !important}
#search{opacity:0.8;margin-top:-32px;margin-left:40px;}
#search:hover,#search:active,#search:focus{opacity:1;z-index:50;}

#menu,#menu2{background:url('menu.png');background-repeat:no-repeat;height:32px;width:32px;z-index:50;cursor:pointer;}
#menu2{margin-left:470px;margin-top:-32px;display:none;}
/*User Area */
#dp {
  position:absolute;
  right:10px;
  top:10px;
  height:50px;
  width:50px;
  border-radius:3px;
  background:url('<?php echo lunaGetDP($user); ?>');
  background-size:50px 50px;
}
#hidebutton{
  position:absolute;
z-index:50;
right:0;
bottom:10px;
}
 </style>
</head>
<body>
<?php include('menu.php'); ?>
		<div class="contents">
		
<div id="menu" style="z-index:3 !important;"></div>
<div id="menu2" style="z-index:3 !important;"></div>

<div id="search" style="z-index:3 !important;">
<div class="searchbox searchbox-shadow" id="searchbox"><form id="textJarvis" target="response" action="http://tomedu.org/lunabeta/exec/run.php"> <input class="searchboxinput" id="searchboxinput" name="command" tabindex="1" autocomplete="off" style="font-family:'Roboto';font-weight:400;" placeholder="Yes, sir?"> </form> <button class="searchbutton" aria-label="Search" jsaction="omnibox.search" tabindex="3"></button></div> 
</div>
<div id="dp" onclick="javascript:openDialog()"></div>
<div id="container">
<h1 class="center" id="headline">
Hello Sir, I am <span id="jarvis">Luna</span></h1>
<div id="info">
  <p id="info_start">Click Luna, allow Luna, then begin speaking. Click again to stop.</p>
  <p id="info_speak_now">Speak now. Click the mic to stop!</p>
  <p id="info_no_speech">No speech was detected. You may need to adjust your
    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
      microphone settings</a>.</p>
  <p id="info_no_microphone" style="display:none">
    No microphone was found. Ensure that a microphone is installed and that
    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
    microphone settings</a> are configured correctly.</p>
  <p id="info_allow">Click the "Allow" button above to enable Luna</p>
  <p id="info_denied">Permission to use microphone was denied.</p>
  <p id="info_blocked">Permission to use microphone is blocked. To change,
    go to chrome://settings/contentExceptions#media-stream</p>
  <p id="info_upgrade">Web Speech API is not supported by this browser.
     Upgrade to <a href="//www.google.com/chrome">Chrome</a>
     version 25 or later.</p>
</div>
<div class="right">
  <button id="start_button" onclick="startButton(event)">
    <img id="start_img" src="start.png" alt="Start"></button>
</div>
<div id="results">
  <span id="final_span" class="final"></span>
  <span id="interim_span" class="interim"></span>
  <p>
</div>
<div class="center">
  <div class="sidebyside" style="text-align:right">
    <button id="copy_button" class="button" onclick="copyButton()">
      Copy</button>
    <div id="copy_info" class="info">
      Press Control-C to copy text.<br>(Command-C on Mac.)
    </div>
  </div>
  <div class="sidebyside">
    <button id="email_button" class="button" onclick="emailButton()">
      Execute</button>
    <div id="email_info" class="info">
      Executing...
    </div>
  </div>
  <p>
  <div id="div_language" style="display:none;">
    <select id="select_language" onchange="updateCountry()"></select>
    &nbsp;&nbsp;
    <select id="select_dialect"></select>
  </div>
</div>
<iframe id="response" name="response" src="http://google.com" style="width:100%; height:500px;" frameBorder="0"></iframe><br>
<iframe id="parallelresponse" name="response" src="http://google.com" style="width:100%; height:500px;" frameBorder="0"></iframe>
<img src="hidebtn.png" id="hidebutton" />
</div>
<!-- for upcoming internationalization -->
<script>
$(document).jkey('spacebar',function(){
startButton(event);
});
</script>
<script>
var langs =
[['Afrikaans',       ['af-ZA']],
 ['Bahasa Indonesia',['id-ID']],
 ['Bahasa Melayu',   ['ms-MY']],
 ['Català',          ['ca-ES']],
 ['Čeština',         ['cs-CZ']],
 ['Deutsch',         ['de-DE']],
 ['English',         ['en-AU', 'Australia'],
                     ['en-CA', 'Canada'],
                     ['en-IN', 'India'],
                     ['en-NZ', 'New Zealand'],
                     ['en-ZA', 'South Africa'],
                     ['en-GB', 'United Kingdom'],
                     ['en-US', 'United States']],
 ['Español',         ['es-AR', 'Argentina'],
                     ['es-BO', 'Bolivia'],
                     ['es-CL', 'Chile'],
                     ['es-CO', 'Colombia'],
                     ['es-CR', 'Costa Rica'],
                     ['es-EC', 'Ecuador'],
                     ['es-SV', 'El Salvador'],
                     ['es-ES', 'España'],
                     ['es-US', 'Estados Unidos'],
                     ['es-GT', 'Guatemala'],
                     ['es-HN', 'Honduras'],
                     ['es-MX', 'México'],
                     ['es-NI', 'Nicaragua'],
                     ['es-PA', 'Panamá'],
                     ['es-PY', 'Paraguay'],
                     ['es-PE', 'Perú'],
                     ['es-PR', 'Puerto Rico'],
                     ['es-DO', 'República Dominicana'],
                     ['es-UY', 'Uruguay'],
                     ['es-VE', 'Venezuela']],
 ['Euskara',         ['eu-ES']],
 ['Français',        ['fr-FR']],
 ['Galego',          ['gl-ES']],
 ['Hrvatski',        ['hr_HR']],
 ['IsiZulu',         ['zu-ZA']],
 ['Íslenska',        ['is-IS']],
 ['Italiano',        ['it-IT', 'Italia'],
                     ['it-CH', 'Svizzera']],
 ['Magyar',          ['hu-HU']],
 ['Nederlands',      ['nl-NL']],
 ['Norsk bokmål',    ['nb-NO']],
 ['Polski',          ['pl-PL']],
 ['Português',       ['pt-BR', 'Brasil'],
                     ['pt-PT', 'Portugal']],
 ['Română',          ['ro-RO']],
 ['Slovenčina',      ['sk-SK']],
 ['Suomi',           ['fi-FI']],
 ['Svenska',         ['sv-SE']],
 ['Türkçe',          ['tr-TR']],
 ['български',       ['bg-BG']],
 ['Pусский',         ['ru-RU']],
 ['Српски',          ['sr-RS']],
 ['한국어',            ['ko-KR']],
 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                     ['cmn-Hans-HK', '普通话 (香港)'],
                     ['cmn-Hant-TW', '中文 (台灣)'],
                     ['yue-Hant-HK', '粵語 (香港)']],
 ['日本語',           ['ja-JP']],
 ['Lingua latīna',   ['la']]];

for (var i = 0; i < langs.length; i++) {
  select_language.options[i] = new Option(langs[i][0], i);
}
select_language.selectedIndex = 6;
updateCountry();
select_dialect.selectedIndex = 6;
showInfo('info_start');

function updateCountry() {
  for (var i = select_dialect.options.length - 1; i >= 0; i--) {
    select_dialect.remove(i);
  }
  var list = langs[select_language.selectedIndex];
  for (var i = 1; i < list.length; i++) {
    select_dialect.options.add(new Option(list[i][1], list[i][0]));
  }
  select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
}
//google web speech api snippet
var create_email = false;
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
if (!('webkitSpeechRecognition' in window)) {
  upgrade();
} else {
  start_button.style.display = 'inline-block';
  var recognition = new webkitSpeechRecognition();
  recognition.continuous = true;
  recognition.interimResults = true;

  recognition.onstart = function() {
    recognizing = true;
    showInfo('info_speak_now');
    start_img.src = 'listening.png';
  };

  recognition.onerror = function(event) {
    if (event.error == 'no-speech') {
      start_img.src = 'start.png';
      showInfo('info_no_speech');
      ignore_onend = true;
    }
    if (event.error == 'audio-capture') {
      start_img.src = 'start.png';
      showInfo('info_no_microphone');
      ignore_onend = true;
    }
    if (event.error == 'not-allowed') {
      if (event.timeStamp - start_timestamp < 100) {
        showInfo('info_blocked');
      } else {
        showInfo('info_denied');
      }
      ignore_onend = true;
    }
  };

  recognition.onend = function() {
    recognizing = false;
    if (ignore_onend) {
      return;
    }
    start_img.src = 'start.png';
    if (!final_transcript) {
      showInfo('info_start');
      return;
    }
    showInfo('');
    if (window.getSelection) {
      window.getSelection().removeAllRanges();
      var range = document.createRange();
      range.selectNode(document.getElementById('final_span'));
      window.getSelection().addRange(range);
    }
    if (create_email) {
      create_email = false;
      createEmail();
    }
  };

  recognition.onresult = function(event) {
    var interim_transcript = '';
    for (var i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }
    final_transcript = capitalize(final_transcript);
    final_span.innerHTML = linebreak(final_transcript);
    interim_span.innerHTML = linebreak(interim_transcript);
    if (final_transcript) {
        var subject = encodeURI(final_transcript);
      //  window.location.href = 'http://tomedu.org/lunabeta/exec/run.php?command=' + subject;
        var loc = 'http://tomedu.org/lunabeta/exec/run.php?command=' + subject;
        document.getElementById('response').src = loc;
    }
  };
}

function upgrade() {
  start_button.style.visibility = 'hidden';
  showInfo('info_upgrade');
}

var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

var first_char = /\S/;
function capitalize(s) {
  return s.replace(first_char, function(m) { return m.toUpperCase(); });
}

function createEmail() {
  var n = final_transcript.indexOf('\n');
  if (n < 0 || n >= 80) {
    n = 40 + final_transcript.substring(40).indexOf(' ');
  }
  var subject = encodeURI(final_transcript.substring(0, n));
  var body = encodeURI(final_transcript.substring(n + 1));
  window.location.href = 'http://tomedu.org/lunabeta/exec/run.php?command=' + subject;
}

function copyButton() {
  if (recognizing) {
    recognizing = false;
    recognition.stop();
  }
  copy_button.style.display = 'none';
  copy_info.style.display = 'inline-block';
  showInfo('');
}

function emailButton() {
  if (recognizing) {
    create_email = true;
    recognizing = false;
    recognition.stop();
  } else {
    createEmail();
  }
  email_button.style.display = 'none';
  email_info.style.display = 'inline-block';
  showInfo('');
}

function startButton(event) {
  if (recognizing) {
    recognition.stop();
    return;
  }
  final_transcript = '';
  recognition.lang = select_dialect.value;
  recognition.start();
  ignore_onend = false;
  final_span.innerHTML = '';
  interim_span.innerHTML = '';
  start_img.src = 'activate.png';
  showInfo('info_allow');
  showButtons('none');
  start_timestamp = event.timeStamp;
}

function showInfo(s) {
  if (s) {
    for (var child = info.firstChild; child; child = child.nextSibling) {
      if (child.style) {
        child.style.display = child.id == s ? 'inline' : 'none';
      }
    }
    info.style.visibility = 'visible';
  } else {
    info.style.visibility = 'hidden';
  }
}

var current_style;
function showButtons(style) {
  if (style == current_style) {
    return;
  }
  current_style = style;
  copy_button.style.display = style;
  email_button.style.display = style;
  copy_info.style.display = 'none';
  email_info.style.display = 'none';
}
//test
if(final_transcript=="hello"){
alert("hello");
}
</script>
<script> 
//presentation styling
$('#menu').click(function(){
  $('#hiddenpane,#shadow').animate({
    left: '+=470'
  }, 600, function() {
  });
      $('#container').animate({
    marginLeft: '470'
  }, 100, function() {
  });
        $('#search').animate({
    marginLeft: '510',
    //marginTop: '-64'
  }, 100, function() {
  });
          $('.searchbutton').animate({
    marginLeft: '+=470'
  }, 100, function() {
  });
  $('#menu2').slideDown('fast');
            $('#menu2').animate({
    //marginTop: '-64'
  }, 100, function() {
  });
});
$('#menu2').click(function(){
    $('#hiddenpane,#shadow').animate({
    left: '-=470'
  }, 600, function() {
  });
      $('#container').animate({
    marginLeft: '-=470'
  }, 100, function() {
  });
        $('#search').animate({
    marginLeft: '-=470',
  }, 100, function() {
  });
          $('.searchbutton').animate({
    marginLeft: '-=470'
  }, 100, function() {
  });
  $('#menu2').slideUp('fast');
});
</script>
<script>
(function(d){d.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","color","outlineColor"],function(f,e){d.fx.step[e]=function(g){if(!g.colorInit){g.start=c(g.elem,e);g.end=b(g.end);g.colorInit=true}g.elem.style[e]="rgb("+[Math.max(Math.min(parseInt((g.pos*(g.end[0]-g.start[0]))+g.start[0]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[1]-g.start[1]))+g.start[1]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[2]-g.start[2]))+g.start[2]),255),0)].join(",")+")"}});function b(f){var e;if(f&&f.constructor==Array&&f.length==3){return f}if(e=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(f)){return[parseInt(e[1]),parseInt(e[2]),parseInt(e[3])]}if(e=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(f)){return[parseFloat(e[1])*2.55,parseFloat(e[2])*2.55,parseFloat(e[3])*2.55]}if(e=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(f)){return[parseInt(e[1],16),parseInt(e[2],16),parseInt(e[3],16)]}if(e=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(f)){return[parseInt(e[1]+e[1],16),parseInt(e[2]+e[2],16),parseInt(e[3]+e[3],16)]}if(e=/rgba\(0, 0, 0, 0\)/.exec(f)){return a.transparent}return a[d.trim(f).toLowerCase()]}function c(g,e){var f;do{f=d.css(g,e);if(f!=""&&f!="transparent"||d.nodeName(g,"body")){break}e="backgroundColor"}while(g=g.parentNode);return b(f)}var a={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]}})(jQuery);
</script>
<script>
$(document).ready(function(){
$('#login-form').delay(20).fadeIn('slow');
});

function rainbow(){
$("body").delay(7000).animate({ backgroundColor: "#005aff" }, 7000);
$("body").delay(7000).animate({ backgroundColor: "#00a7cc" }, 7000);
}
$(document).ready(function(){
rainbow();
setInterval(rainbow(),28020);
});
$('#hidebutton').click(function(){
$('.seaarchbox,#dp,#menu,.searchbutton').fadeToggle();
});
</script>
</div>

		<script src="assets/menu.js"></script>
		<script>
			// Create an instance of Meny
			var meny = Meny.create({
				// The element that will be animated in from off screen
				menuElement: document.querySelector( '.meny' ),

				// The contents that gets pushed aside while Meny is active
				contentsElement: document.querySelector( '.contents' ),

				// [optional] The alignment of the menu (top/right/bottom/left)
				position: Meny.getQuery().p || 'left',

				// [optional] The height of the menu (when using top/bottom position)
				height: 200,

				// [optional] The width of the menu (when using left/right position)
				width: 260,

				// [optional] Distance from mouse (in pixels) when menu should open
				threshold: 40,

				// [optional] Use mouse movement to automatically open/close
				mouse: true,

				// [optional] Use touch swipe events to open/close
				touch: true
			});

			// API Methods:
			// meny.open();
			// meny.close();
			// meny.isOpen();

			// Events:
			// meny.addEventListener( 'open', function(){ console.log( 'open' ); } );
			// meny.addEventListener( 'close', function(){ console.log( 'close' ); } );

			// Embed an iframe if a URL is passed in
			if( Meny.getQuery().u && Meny.getQuery().u.match( /^http/gi ) ) {
				var contents = document.querySelector( '.contents' );
				contents.style.padding = '0px';
				contents.innerHTML = '<div class="cover"></div><iframe src="'+ Meny.getQuery().u +'" style="width: 100%; height: 100%; border: 0; position: absolute;"></iframe>';
			}
		</script>

		<style>
		.searchbuton{
	margin-top:0px;
margin-left:-61px;
}
</style>
		</body>
		</html>
		

		<script>
			function openDialog() {
				Avgrund.show( "#default-popup" );
			}
			function closeDialog() {
				Avgrund.hide();
			}
		<aside id="default-popup" class="avgrund-popup">
			<h2>Hello!</h2>
			<p>
				<a href="logout.php">Logout</a><br>
				<a href="settings.php">Settings</a><br>
			</p>
			<button onclick="javascript:closeDialog();">Close</button>
		</aside>
		</article>
		<div class="avgrund-cover"></div>
		<script type="text/javascript" src="assets/modal.js"></script>
				<script>
$(window).load(function(){
   function position(){
    $('.searchbutton').css("margin-left", "-61px");
    $('.searchbutton').css("margin-top", "0px");
    $('#dp').css("right", "5px");
    $('#dp').css("top", "5px");
    $('#hidebutton').css("bottom", "10px");
    $('#hidebutton').css("right", "2px");
   };
   window.setTimeout( position, 1000 );
   });
		</script>