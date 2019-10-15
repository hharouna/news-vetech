<?php 
/* sécurité de connexion session serveur*/
define("APP_ROOT",dirname(__FILE__));
define("PRIVATE_PATH",'db');
define("PRIVATE_FUNC",'../function'); 

require_once(PRIVATE_PATH."/connect_db.php");// connexion a l'unique  basse de données 
require_once(PRIVATE_FUNC."/url.php");// include de url function class et extends [ url , menu ]
require_once(PRIVATE_FUNC."/all_nav.php");// include de url function class et extends [ url , menu ]
require_once(PRIVATE_FUNC."/f_cookies/f_cookies.php");// include de url function class et extends [ url , menu ]
require_once(PRIVATE_FUNC."/f_session/f_session.php");// include de url function class et extends [ url , menu ]
require_once(PRIVATE_FUNC."/union_client_des.php");// include de url function class et extends [ url , menu ]
require_once(PRIVATE_FUNC."/liste_url.php");// include de url function class et extends [ url , liste url ]
require_once(PRIVATE_FUNC."/all_module_url.php");// include de url function class et extends [ url , module ]

?>