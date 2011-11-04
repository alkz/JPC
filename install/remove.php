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
    require_once("../system/functions.php");
    require_once("../langs/".Conf::language.".inc.php");
    require_once("../system/db.php");

    HTMLstruct::top();

    $db = new JPCdb(DBInfo::host, DBInfo::name, DBInfo::user, DBInfo::pwd);
    $querySearch = "SELECT name FROM modules";

    // Call the remover for each module
    $res = $db->query($querySearch);
    while(($row = mysql_fetch_assoc($res)) != null)
    {
        require("../modules/".$row[name]."/removeEnd.php");
        print "<br />";
    }

    $queryDrop = "DROP TABLE sections, modules";
    $db->query($queryDrop);
    $db->close();

    print $_MESSAGES["remove"]."<br />";
    
    HTMLstruct::foot();
?>
