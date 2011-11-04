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

    require_once("../include/config.inc.php");
    require_once("../include/struct.inc.php");
    HTMLstruct::top();
    require_once("db.php");
    require_once("../langs/".Conf::language.".inc.php");

    define("SECTION", 0);
    define("MODULE", 1);
    define("LINK", 2);
    define("INTERNAL_LINK", 3);

    if(!isset($_GET["sez"]))
        die($_ERRORS["access"]);
    else
    {
        $db = new JPCdb(DBInfo::host, DBInfo::name, DBInfo::user, DBInfo::pwd);
        $query = "SELECT * FROM sections WHERE name = '".$_GET["sez"]."'";
        $row = mysql_fetch_assoc($db->query($query));

        switch($row[type])
        {
            case SECTION:
            {
                print '<meta http-equiv="refresh" content=0;url=../index.php?page= />';
                print $row[content];
                break;
            }

            case MODULE:
            {
                $queryModule = "SELECT dir FROM modules WHERE name = '".$row[name]."'";
                $rowModule = mysql_fetch_assoc($db->query($queryModule));
                require("../modules/".$rowModule[dir]."/home.php");
                break;
            }

            case INTERNAL_LINK:
            {
                ?>
                <meta http-equiv="refresh" content="0;<?php print $row[url] ?>" />
                <?php
                break;
            }
            
            case LINK:
            {
                ?>
                <meta target="_blank" http-equiv="refresh" content="0;http://<?php print $row[url] ?>" />
                <?php
                break;
            }
        }
    }

    $db->close();
    HTMLstruct::footSimple();
?>
