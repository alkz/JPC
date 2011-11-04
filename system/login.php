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
   
    if(sha1($_POST["pwd"]) != sha1(Conf::pwd))
        die($_ERRORS["pwd"]);
    else
    {
        session_start();
        $_SESSION["login"] = true;
        $_SESSION["pwd"]   = sha1($_POST["pwd"]);
        print $_MESSAGES["login"]."<br />";
        print $_MESSAGES["wait"]."<br />";
        Functions::redirect("../admin/menu.php", 5);
    }

    HTMLstruct::footSimple();
?>
    
