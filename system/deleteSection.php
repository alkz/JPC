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
    require_once("../langs/".Conf::language.".inc.php");
    require_once("db.php");
    require_once("functions.php");
    require_once("security.php");

    if(!isset($_GET["id"]))
    {
        Functions::redirect("../admin/formSection.php?op=e", 5);
        die($_ERRORS["access"]);
    }
    else
    {
        $db = new JPCdb(DBInfo::host, DBInfo::name, DBInfo::user, DBInfo::pwd);
        $queryCheck = "SELECT name FROM sections WHERE id = '".$_GET["id"]."'";
        $row = mysql_fetch_assoc($db->query($queryCheck));
        if($row[name] == Conf::home)
            die($_ERRORS["delete_home"]);

        $queryDel = "DELETE FROM sections WHERE id = '".$_GET["id"]."'";
        $db->query($queryDel);
        $db->close();

        print $_MESSAGES["delSection"]."<br />";
        print $_MESSAGES["wait"]."<br />";
        Functions::redirect("../admin/menu.php", 5);
    }

    HTMLstruct::footSimple();
?>
