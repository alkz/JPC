<?php

 /********************************************************************  
 *                        JPC(Jargon PHP CMS)                        * 
 *********************************************************************
 *                                                                   *
 *     copyleft alkz                                                 * 
 *                                                                   *
 *                          PUBLIC LICENSE                           * 
 *                         Date: 2010/01/12                          *
 *                                                                   * 
 *              See http://www.gnu.org/licenses/gpl.html             *
 *                                                                   *
 ********************************************************************/

?>

<?php

    require_once("../include/struct.inc.php");
    HTMLstruct::top();
    require_once("functions.php");
    require_once("../langs/".Conf::language.".inc.php");
    require_once("security.php"); 
    
    if(!isset($_SESSION["login"]))
        die($_ERRORS["access"]);
    else
    {
        session_destroy();
        $_SESSION["login"] = null;
        $_SESSION["pwd"]   = null;
        
        print $_MESSAGES["logout"]."<br />";
        print $_MESSAGES["wait"]."<br />";
        Functions::redirect("../index.php", 5);
    }
    
    HTMLstruct::footSimple();
?>
