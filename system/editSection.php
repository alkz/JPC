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
    define("LINK", 2);

    if(!isset($_GET["id"]) || !isset($_POST["name"]) ||
        $_POST["name"] == "" || !isset($_GET["type"]) ||
        ( !($_GET["type"] == SECTION) xor ($_GET["type"] == LINK) ))
    {
        Functions::redirect("../admin/formSection.php?op=e&id=".$_GET["id"], 5);
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

        $fname = Functions::format($_POST["name"]);
        $db = new JPCdb(DBInfo::host, DBInfo::name, DBInfo::user, DBInfo::pwd);
        
        $querySearch = "SELECT id, name, type FROM sections";
        $res = $db->query($querySearch);
        while(($row = mysql_fetch_assoc($res)) != null)
        {
            if( ($row[name] == $fname) && ($row[id] != $_GET["id"]) )
                die($_ERRORS["nameUsed"]);
            if($row[id] == $_GET["id"])
                if($row[type] != $_GET["type"])
                    die($_ERRORS["access"]);
        }

        if($_GET["type"] == SECTION)
        {
            $fcontent = trim($_POST["content"]);
            $fcontent = addslashes(stripslashes($fcontent));        
            $query = "UPDATE sections SET name = '".$fname."', content = '".$fcontent."' WHERE id = '".$_GET["id"]."'";        
        }
        else 
        {
            $furl = Functions::format($_POST["url"]);
            $query = "UPDATE sections SET name = '".$fname."', url = '".$furl."' WHERE id = '".$_GET["id"]."'";        
        }

        $db->query($query);
        $db->close();

        print $_MESSAGES["modSection"]."<br />";
        print $_MESSAGES["wait"];
        Functions::redirect("../admin/menu.php", 5);
    }

    HTMLstruct::footSimple();
?>

