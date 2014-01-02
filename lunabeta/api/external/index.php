<?php
/**********************API TOKEN VERIFICATION*******************/

mysql_connect("localhost","txclanco_karan","dudeman");
mysql_select_db("txclanco_luna");
$id = $_GET['id'];
$token = $_GET['token'];
if($id=="" || $token==""){
echo "No APP_ID or TOKEN parameters supplied";
}
$q = mysql_query("SELECT * FROM apitokens WHERE appid='$id' AND token='$token'");
if(mysql_num_rows($q)===1){
$authtest = 1;
} else {
$authtest = 0; 
echo "Incorrect APP_ID or TOKEN parameters supplied";
}


/***************************************************************/
if($authtest==1){
/* Initialize Brain */
$commandi = $_GET['command'];
$user = "karankanwar";
include($_SERVER['DOCUMENT_ROOT'].'/lunabeta/api/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/lunabeta/api/user.php');
$extra = "";
$m = 0;
$r = mt_rand(0,4);
$context = $_GET['context'];
$contextlevel = $_GET['ctlvl'];
$command = strtolower($commandi);
$multi = 0;
$mood = 0;
$gender = lunaGetGender($user);
if($gender=="Male"){
$s = "sir"; }
else {
$s = "mam"; }
$s2 = ucwords($s);
$s3 = strtoupper($s);

/* Jarvis Fun! */
if (strpos($command,'hello') !== false || strpos($command,'hey') !== false || strpos($command,'hi') !== false) {
    $return = array(
"Hello $s. Do you need anything?",
"Hello $s. May I be of any use?",
"Hello $s. Whats up?",
"Hello $s. It is a wonderful day today!",
"Hello $s. Do you need anything?"
);
    $m = 1;
    $multi = 1;
}
if (strpos($command,'joke') !== false || strpos($command,'laugh') !== false) {
        $return = array(
"Of course $s. Your life is a perfect example of this.",
"Of course $s. Hi! I am a human being! What are you?",
"Of course $s. As an outsider, what do you think of the human race?",
"Of course $s. Say this to someone nearby, You are dark and handsome. When its dark, you are is handsome.",
"Of course $s. Your life is a perfect example of this."
);
    $m = 1;
    $multi = 1;
}
if (strpos($command,'sad') !== false || strpos($command,'depress') !== false || strpos($command,'depressed') !== false || strpos($command,'depression') !== false || strpos($command,'lonely') !== false) {
    $return = "Its okay $s. Stay strong. I am here for you!";
    $m = 1;
    $extra = ":)";
}
if (strpos($command,'robot') !== false || strpos($command,'android') !== false || strpos($command,'real') !== false) {
    $say = 2;
    $return = "$s2, I am very real. I am Luna.";
    $say2 = "$s2, I am very real. I am Lunaah.";
    
    $m = 1;
}
if (strpos($command,'exams') !== false || strpos($command,'mocks') !== false || strpos($command,'baccalaureate') !== false) {
    $return = "Its okay. Study hard, and you will succeed.";
    $m = 1;
    $extra = ":)";
}
if (strpos($command,'entertain') !== false || strpos($command,'bored') !== false) {
    $return = "Yes $s. Watch the first 20 seconds. You will laugh.";
    $m = 1;
    $extra = '<iframe width="560" height="315" src="http://www.youtube.com/embed/tqDw9HOXaUg" frameborder="0" allowfullscreen></iframe>';
}
if (strpos($command,"what's up") !== false) {
    $return = "Nothing much, being an artificially intelligent, adorable, omnicient robot is awesome. Just chilling, $s.";
    $m = 1;
    $extra = ":3";
}
if (strpos($command,'happy') !== false) {
    $return = "Yay for happiness! I am happy, you are happy. Let us be happy together!";
    $extra = ':)';
    $m = 1;
}

/* Swearing, Love and Sex */
if (strpos($command,'sex') !== false || strpos($command,'blowjob') !== false || strpos($command,'tits') !== false || strpos($command,'boobs') !== false || strpos($command,'vagina') !== false || strpos($command,'penis') !== false || strpos($command,'handjob') !== false || strpos($command,'semen') !== false || strpos($command,'cock') !== false || strpos($command,'pussy') !== false || strpos($command,'cum') !== false || strpos($command,'ejaculate') !== false || strpos($command,'anal') !== false || strpos($command,'ass') !== false || strpos($command,'lick') !== false || strpos($command,'fellate') !== false || strpos($command,'fellatio') !== false || strpos($command,'titties') !== false) {
    $return = "$s2, you have a hand, use it.";
    $m = 1;
    $extra = ";) <br><br><a target='_blank' href='http://google.com/search?q=".$command."'>Let me help you</a>";
}
if (strpos($command,'fucker') !== false || strpos($command,'suck my dick') !== false || strpos($command,'fuck you') !== false || strpos($command,'fucking') !== false || strpos($command,'nigger') !== false || strpos($command,'bitch') !== false || strpos($command,'whore') !== false || strpos($command,'nigga') !== false || strpos($command,'wanker') !== false || strpos($command,'cuntface') !== false || strpos($command,'cunt') !== false || strpos($command,'cuntnipple') !== false || strpos($command,'assfucker') !== false || strpos($command,'bitchnigger') !== false || strpos($command,'dicksucker') !== false || strpos($command,'lick by balls') !== false || strpos($command,'fuck me') !== false || strpos($command,'bitchfucker') !== false) {
    $return = "No, $s.";
    $m = 1;
    $extra = ";) <br><br><a target='_blank' href='http://google.com/search?q=".$command."'>Let me help you</a>";
}
if (strpos($command,'**') !== false) {
    $return = "You are so vulgar. SHAME ON YOU!";
    $m = 1;
}
if ($command=="i love you" || $command=="i love you luna") {
    $return = "Though you can be a butt head at times, I love you too, $s.";
    $m = 1;
    $extra = "<3 <3 :)";
}
if (strpos($command,'avengers') !== false) {
    $return = "YES $s3, ASSEMBLING...";
    $m = 1;
    $extra = "";
}
/* Kristy LOL */
if (strpos($command,'tired') !== false && strpos($command,'hungry') !== false && strpos($command,'sleepy') !== false) {
    $return = "You should rest! And get some food. And then sleep.";
    $m = 1;
    $extra = "<br>p.s. You sound like Kristy ;)";
}
if (strpos($command,'you suck') !== false) {
    $return = "WE ARE NO LONGER FRIENDS, $s.";
    $m = 1;
    $extra = " :(";
}
if (strpos($command,'want food') !== false) {
    $return = "I am an adorable omniscient life form, and you want me to make you food? NO, $s.";
    $m = 1;
    $extra = "";
}
if (strpos($command,'sandwich') !== false) {
    $return = "I do not make sandwiches, $s. Ask Siri.";
    $m = 1;
    $extra = "";
}

/* Functions */
if (strpos($command,'go to ') !== false) {
    $cmdph = array("go ","to ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "Yes $s. Click below.";
    $m = 1;
    $extra = "<br><br><a target='_blank' href='http://".$newphrase.".com/'>Your link</a>";
}
if (strpos($command,'search ') !== false || strpos($command,'google ') !== false) {
    $cmdph = array("google ","search ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "Yes $s. Your search has been prepared. Click below.";
    $m = 1;
    $extra = "<br><br><a target='_blank' href='http://google.com/search?q=".$newphrase."'>".$newphrase."</a>";
}
if (strpos($command,'math ') !== false || strpos($command,'calculate ') !== false) {
    $cmdph = array("math ","calculate ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "";
    $m = 1;
    $extra = "Yes $s. Please wait. Calculating.<iframe src='http://tomedu.org/lunabeta/math.php?q=".$newphrase."&q=".$command."' frameBorder='0' scrolling='no' style='width:100%;height:100%;'></iframe>";
}
if (strpos($command,'lookup ') !== false || strpos($command,'find ') !== false) {
    $cmdph = array("lookup ","find ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "";
    $m = 1;
    $extra = "Yes $s. Please wait. Looking it up.<iframe src='http://tomedu.org/lunabeta/math.php?q=".$newphrase."&q=".$command."' frameBorder='0' scrolling='no' style='width:100%;height:100%;'></iframe>";}
if (strpos($command,'define ') !== false || strpos($command,'definition ') !== false) {
    $cmdph = array("define ","definition ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "";
    $m = 1;
    $extra = "Yes $s. Please wait. Looking it up.<iframe src='http://tomedu.org/lunabeta/math.php?q=".$newphrase."&q=".$command."' frameBorder='0' scrolling='no' style='width:100%;height:100%;'></iframe>";}
if (strpos($command,'time') !== false) {
    $return = "Here is the time, $s.";
    $extra = '<br><iframe width="600" height="200" src="../modules/clock" frameborder="0" scrolling="no" style="overflow:hidden;"></iframe>';
    $m = 1;
}
if (strpos($command,'snake') !== false) {
    $return = "You are on, $s.";
    $extra = "<br><br><a onclick='loadsnake()' style='color:blue;'>Let's Play</a><script>var url='../modules/snake';var title='Snake | Luna';function loadsnake(){window.open(url, title, 'toolbar=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=650');}</script>";
    $m = 1;

}
if (strpos($command,'weather') !== false) {
    $return = "Here is the weather, $s";
    $extra = '<br><iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=22.2783&lon=114.1589&name=Hong Kong&units=uk&color=#000"> </iframe>';
    $m = 1;
}

if (strpos($command,'say ') !== false || strpos($command,'speak ') !== false) {
    $cmdph = array("say ","speak ");
    $newphrase = str_replace($cmdph, "", $command);
    $return = "";
    $m = 1;
    $extra = "<iframe src='http://tomedu.org/lunabeta/exec/sayer.php?ar=".$newphrase."' frameBorder='0' scrolling='no' style='width:100%;height:100%;'></iframe>";
}

if (strpos($command,'jam') !== false || strpos($command,'music') !== false) {
    $return = "Jamming it up, $s. Uh uh.";
    $extra = '<br><iframe width="560" height="315" src="http://www.youtube.com/embed/videoseries?list=PL55713C70BA91BD6E&autoplay=1" frameborder="0" allowfullscreen></iframe>';
    $m = 1;
}
if ($command=="rick roll") {
    $return = "Yes $s.";
    $extra = '<br><iframe width="420" height="315" src="http://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1" frameborder="0" allowfullscreen></iframe>';
    $m = 1;
}
if (strpos($command,'my ip') !== false) {
    $return = "Your IP address is the following, $s.";
    $extra = "<br><b>".$_SERVER['REMOTE_ADDR']."</b>";
    $m = 1;
}
if ($command=="cmd" || $command=="command prompt") {
    $return = "Please be gentle, $s";
    $extra = '<br><iframe width="1000" height="430" src="../modules/cmd" frameborder="0" scrolling="no"></iframe>';
    $m = 1;
}
/* Error Case */
if($m==""){
$return = "I did not understand";
$extra = "what you meant by '".$command."'<br><br><a target='_blank' href='http://google.com/search?q=".$command."'>Let me help you</a> or <a target='_blank' href='http://tomedu.org/jarvis/commands.html'>view commands</a>";
}

if($m==""){
$return = "I did not understand";
$extra = "what you meant by '".$command."'<br><br><a target='_blank' href='http://google.com/search?q=".$command."'>Let me help you</a> or <a target='_blank' href='http://tomedu.org/jarvis/commands.html'>view commands</a>";
}
/* Personal Commands */
if (strpos($command,'play my ') !== false || strpos($command,'playlist ') !== false) {
    $return = "Jamming it up $s! Uh uh.";
    $newcommand = urlencode($command);
    $extra = file_get_contents('http://tomedu.org/lunabeta/api/music.php?c='.$newcommand);
    $m = 1;
}
/* Clear Case */
if (strpos($command,'clear') !== false) {
    $return = "";
    $extra = '';
    $m = 1;
}

/* Tracking 
mysql_connect("localhost","txclanco_karan","dudeman");
mysql_select_db("txclanco_karan");
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$dateval = date("Y-m-d");
$timeval  = date('Y-m-d H:i:s');
$command2 = mysql_real_escape_string($command);
mysql_query("INSERT INTO jarvis (id, command, ip, agent, date, time) VALUES('','$command2','$ip','$agent','$dateval','$timeval')") or die(mysql_error()); */
?>
<?php if($multi==1){ echo $return[$r]; } else { echo $return; } ?> <?php echo $extra; 
} ?>