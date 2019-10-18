<?php
include_once("private/db/connect_db.php");
include_once("function/url_db.php");
include_once("function/url.php");
include_once("function/all_nav.php");
include_once("function/f_session/f_session.php");
/*function parametre url redirection*/
$connect_nav =  $_SERVER["HTTP_USER_AGENT"];   
$u = new url();
$_session_start = new f_session(); 
//$nav = new nav();
$u->url_vetechdesign($u->site_serveur, $_SERVER["HTTP_HOST"]);
$u_token = $u->__c_token(); 
$sessionsite=$u->session_site;
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site);
/* liste de session */
$_SESSION["nav"]=$connect_nav ;
$_SESSION["token"]=$u_token;

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> VETECH&DESIGN </title>
<meta name="description" content="">
<meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="google-site-verification" content="CWqBSmMKfZkf3q5cskFNiUp-ra7PkDhO2-70WKTnyrM" />
<meta charset="utf-8" />
<meta http-equiv="Content-Security-Policy" content="script-src 'self' 127.0.0.1:8888  www.google-analytics.com connect.facebook.net www.googletagmanager.com app.vetechdesign.net www.smartsuppchat.com smartsupp-widget-161959.c.cdn77.org bootstrap.smartsuppchat.com widget-v4.tidiochat.com tidiochat.com code.tidio.co 'unsafe-inline' ;" /> 
<link  rel="stylesheet" type="text/css"  href="css/responsive.css"/>  
    <link  rel="stylesheet" type="text/css"  href="css/fotorama.dev.css"/>  
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome.css"/>
<link rel="stylesheet" type="text/css" href="update_news/update/css/uploadfile.css"/>
<link rel="icon" type="image/png" id="favicon"  href="imgformation/licone.png"/>
<link rel="stylesheet" type="text/css" href="css/news_site.css"/>
 
<script type="text/javascript" src="js/jquery.js"></script>
   
<!--<script type="text/javascript" src="update_news/update/js/jquery.js"></script>-->
<script type="text/javascript" src="fonts/js/all.js"></script>

 <script type="text/javascript" src="js/fotorama.dev.js"></script>
<script type="text/javascript" src="bootstrap/bootstrap/js/bootstrap.js"></script> 
<script type="text/javascript" src="js/jquery.uploadfile.js"></script>	
<script type="text/javascript" src="js/script_vetechdesign.js"></script>
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145847761-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145847761-1');
</script>


	
    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '41c7e0d7c8838ed9eac8cb0551fcbcc15b8f583e';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
	
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '455441195053242');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=455441195053242&ev=PageView&noscript=1"
/></noscript>
	
<!-- End Facebook Pixel Code -->	

</head>

<body>
		<div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		<div class="modal-content">

		</div>
		</div>
		</div>
    <input type="hidden" id="nav_token" value="<?php echo $u_token; ?>">
    <input type="hidden" id="nav" value="<?php echo $connect_nav; ?>">
<div class="container">  

</div>


	
</body>
</html>