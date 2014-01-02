<?php
  include($_SERVER['DOCUMENT_ROOT'].'/jarvis/wa_wrapper/WolframAlphaEngine.php');
  $q = $_GET['q'];
?>
<html><head><link href='http://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'><style>body{font-family:'Roboto','Verdana';}</style>
<body>
<form method='POST' action='#' style="display:none;">
Search: <input type="text" name="q" value="<?php echo $_REQUEST['q']; ?>">&nbsp;&nbsp; <input type="submit" name="Search" value="Search">
</form>
<?php
  $appID = 'GWRXPT-YWGV3L4GA6';

  // instantiate an engine object with your app id
  $engine = new WolframAlphaEngine( $appID );

  // we will construct a basic query to the api with the input 'pi'
  // only the bare minimum will be used
  $response = $engine->getResults( $_GET['q'] );

  // getResults will send back a WAResponse object
  // this object has a parsed version of the wolfram alpha response
  // as well as the raw xml ($response->rawXML) 
  
  // we can check if there was an error from the response object
  if ( $response->isError ) {
?>
  <h1>There was an error in the request</h1>
  </body>
  </html>
<?php
    die();
  }
?>
<?php
  // if there are any assumptions, display them 
  if ( count($response->getAssumptions()) > 0 ) {
?>
<div style="display:none;">
    <h2>Assumptions:</h2>
    <ul>
<?php
      // assumptions come as a hash of type as key and array of assumptions as value
      foreach ( $response->getAssumptions() as $type => $assumptions ) {
?>
        <li><?php echo $type; ?>:<br>
          <ol>
<?php
          foreach ( $assumptions as $assumption ) {
?>
            <li><?php echo $assumption->name ." ". $assumption->description;?> to change search to this assumption <a href="simpleRequest.php?q=<?php echo urlencode($assumption->input);?>">click here</a></li>
<?php
          }
?>
          </ol>
        </li>
<?php
      }
?>
      
    </ul>
<?php
  }
?>

</div>

<?php
  // if there are any pods, display them
  if ( count($response->getPods()) > 0 ) {
?>
<?php
    foreach ( $response->getPods() as $pod ) {
?>
          <?php if($pod->attributes['title']=="Definition" || $pod->attributes['title']=="Result" || $pod->attributes['title']=="Decimal approximation"){
		  $pod->attributes['title'];
		  echo "<center><br><br><i>";
		  echo $q;
		  echo "</i><br><br><h3>";
		  echo "I believe this is what you were looking for, sir";
		  echo "<h1>".$pod->subpod->plaintext."</h1>";  ?>
<?php
        // each pod can contain multiple sub pods but must have at least one
        foreach ( $pod->getSubpods() as $subpod ) {
          // if format is an image, the subpod will contain a WAImage object
?>
          <a><?php if($subpod->plaintext==""){
          echo '<center><img src="'.$subpod->image->attributes['src'].'"></h3>';
          }
          else { 
		  echo "</h3>";
		  echo "<center>";
          echo $subpod->plaintext; 
		  echo '<br><iframe src="http://tomedu.org/lunabeta/exec/sayer.php?ar='.$subpod->plaintext.'" style="opacity:0;"></iframe>'; ?></a><br>
<?php
        }
		}
    }
  }
  }
?>

</body>
</html>