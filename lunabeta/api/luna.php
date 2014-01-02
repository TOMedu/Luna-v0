<?php
function lunaGetVersion(){
$version = "v3.2.5 beta";
echo "<b>Luna ".$version."</b><br>";
$now = time();
$startdate = strtotime("2013-05-26");
$datediff = $now - $startdate;
echo floor($datediff/(60*60*24))." days since the Luna project began<br>
Luna is an artificially intelligent personal assistant designed to ease the lives of its users, assist human to computer interaction for the elderly and technically illiterate, and was ultimately built for local distribution on laptops for students in remote areas where formal education is scarce, in association with the <a href='http://tomedu.org'>TOMedu</a> and <a href='http://laptop.org'>One Laptop per Child</a>. I became fascinated in this idea back when I was 15 years old after writing a <a href='http://karankanwar.me/NLPAIHCIResearch.pdf'>research paper</a> about artificial intelligence coupled with natural language processing and speech recognition being able to assist those who were not computer literate. Two years later, I built Luna!<br>
<small>by Karan Kanwar, <a href='http://karankanwar.me'>karankanwar.me</a></small>";
}
?>