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

    define("SECTION", 0);
    define("MODULE", 1);
    define("LINK", 2);
    define("INTERNAL_LINK", 3);

    if(!isset($_POST["name"]) || $_POST["name"] == "" ||
        !isset($_GET["type"]) || 
        ( !($_GET["type"] == SECTION) xor ($_GET["type"] == LINK) xor 
        ($_GET["type"] == INTERNAL_LINK)))
    {
        Functions::redirect("../admin/formSection.php?op=m", 5);
        die($_ERRORS["notFill"]);
    }
    else
    {
        if($_GET["type"] == SECTION && $_POST["content"] == "")
        {
            Functions::redirect("../admin/formSection.php?op=e&id=".$_GET["id"], 5);
            die($_ERRORS["notFill"]);
        }
        else if($_GET["type"] == LINK && $_POST["url"] == "")
        {
            Functions::redirect("../admin/formSection.php?op=e&id=".$_GET["id"], 5);
            die($_ERRORS["notFill"]);
        }
 

        $db = new JPCdb(DBInfo::host, DBInfo::name, DBInfo::user, DBInfo::pwd);
        $fname = Functions::format($_POST["name"]);
        
        $querySearch = "SELECT name FROM sections WHERE name = '".$fname."'";
        if($row = mysql_fetch_assoc($db->query($querySearch)))
            die($_ERRORS["nameUsed"]);
            
        
        if($_GET["type"] == SECTION)
        {
            $fcontent = trim($_POST["content"]);
            $fcontent = addslashes(stripslashes($fcontent));        
            $query = "INSERT INTO sections 
                             (
                                 type,
                                 name, 
                                 content 
                             ) 
                             VALUES
                             (
                                 '".$_GET["type"]."',
                                 '".$fname."', 
                                 '".$fcontent."'
                             )";
        }
        else if($_GET["type"] == LINK)
        {
            $furl = Functions::format($_POST["url"]);
            $query = "INSERT INTO sections 
                             (
                                 type,
                                 name, 
                                 url 
                             ) 
                             VALUES
                             (
                                 '".$_GET["type"]."',
                                 '".$fname."', 
                                 '".$furl."'
                             )";
        }
        else if($_GET["type"] == INTERNAL_LINK)
        {
            $furl = Functions::format($_POST["url"]);
            $query = "INSERT INTO sections 
                             (
                                 type,
                                 name, 
                                 url 
                             ) 
                             VALUES
                             (
                                 '".$_GET["type"]."',
                                 '".$fname."', 
                                 '".$furl."'
                             )";
        }

        $db->query($query);
        $db->close();

        print $_MESSAGES["mkSection"]."<br />";
        print $_MESSAGES["wait"];
        Functions::redirect("../admin/menu.php", 5);
    }

    HTMLstruct::footSimple();
?>

