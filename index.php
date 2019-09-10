<?php 
include_once("function/url.php");
include_once("function/f_session/f_session.php");
/*function parametre url redirection*/
    
$u = new url();
$u->url_vetechdesign($u->site_serveur, $_SERVER["HTTP_HOST"]);
$u_token = $u->__c_token(); 
$_session_start = new f_session(); 
$sessionsite=$u->session_site;
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site);
/* liste de session */

$_SESSION["token"]=$u_token;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" id="favicon" href="imgformation/licone.png"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="google-site-verification" content="CWqBSmMKfZkf3q5cskFNiUp-ra7PkDhO2-70WKTnyrM" />
<title> VETECH&DESIGN </title>
<link  rel="stylesheet" type="text/css"  href="css/responsive.css"/> 
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome.css"/>

<link rel="stylesheet" type="text/css" href="css/news_site.css"/>
    
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script_vetechdesign.js"></script>
<script type="text/javascript" src="fonts/js/all.js"></script> 
<script type="text/javascript" src="bootstrap/bootstrap/js/bootstrap.js"></script>
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145847761-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145847761-1');
</script>


    <script type="text/javascript">
        $(document).ready(function(){
               
     
        })
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

<style rel="stylesheet" type="text/css">

.container {
    margin-top: 200px;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
/* .dropdown-menu.show {
  display: flex;
  width: 450%;  
}
 */

.dropdown-menu{
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  z-index: 1000;
  display: none;
  float: left;
  /* min-width: 10rem; */
  padding: 0.5rem 0;
  margin: 0.125rem 0 0;
  font-size: 1rem;
  color: #212529;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-radius: 0.25rem;
}
.dropdown-menu[x-placement^="top"], .dropdown-menu[x-placement^="right"], .dropdown-menu[x-placement^="bottom"], .dropdown-menu[x-placement^="left"] {
  right: auto;
  bottom: auto;
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }

}

@media screen and (min-width: 100px) and (max-width: 991px) {
.fixed-top{
  position: relative;
  /* width: 100%; */
}
.container-fluid{
  width: 
}
}


@media (min-width: 768px) {
  .container {
    /* max-width: 720%; */
    max-width: 100%;
  }
  .vetech_qsn{
    /* font-size: 25px; */
    width: 100%;
    height: auto;
  }
  .vetech_cont_qsn{
    margin-top: 0px;
    margin-left: 0px;
    margin-right: 0px;
    margin-bottom: 200px;
    padding: 0px;
    left: 0;
    /* height: 100px; */

  }
  .vetech_cont_qsn_border{
    height: 20px;
  }
}

@media (min-width: 992px) {
  .container {
    /* max-width: 960px; */
    max-width: 100%;
  }
  
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px;
  }
}
div{
    /* border: 1px solid red; */
}
  
</style>
</head>

<body>
<div class="container">  
 




</div>


</body>
</html>