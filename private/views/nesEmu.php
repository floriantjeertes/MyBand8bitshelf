<?php


  $servername ="localhost";
  $uid="root";
  $pwd="";
  $database="gamedata";
  $con = mysqli_connect($servername,$uid,$pwd,$database);
  // $q = $_GET['q'];

  if(!$con){
    die('kan niet verbinden: '.mysqli_error($con));
  }
  $sql="SELECT * FROM GameInfo WHERE id='$number'";
  $result = mysqli_query($con,$sql);

  $rom = "";
  while($row = mysqli_fetch_array($result)){
    $rom = $row['file'];
  }
?>

<link rel="stylesheet" type="text/css" href="../public/css/baseStyle.css">



<div id="emulator">
  <p>To play this game, please, download the latest Flash player!</p>
  <br>
  <a href="http://www.adobe.com/go/getflashplayer">
    <img src="http://www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png" alt="Get Adobe Flash player"/>
  </a>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>

<script type="text/javascript">
console.log(document.cookie);
var resizeOwnEmulator = function(width, height)
{
  var emulator = $('#emulator');
  emulator.css('width', width);
  emulator.css('height', height);
}

$(function()
{
  function embed()
  {
    var emulator = $('#emulator');
    if(emulator)
    {
      var flashvars =
      {
        system : 'nes',
        url : 'roms/<?php echo$rom;?>'
      };
      var params = {};
      var attributes = {};

      params.allowscriptaccess = 'sameDomain';
      params.allowFullScreen = 'true';
      params.allowFullScreenInteractive = 'true';

      swfobject.embedSWF('bin/Nesbox.swf', 'emulator', '640', '480', '11.2.0', 'bin/expressInstall.swf', flashvars, params, attributes);
    }
  }

  embed();
});

</script>
