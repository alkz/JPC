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
 
 /**
  *
  * This is the default theme of JPC.
  *
  */

?>

<?php

    require_once("include/config.inc.php");
    require_once("system/db.php");

    define("SECTION", 0);
    define("MODULE", 1);
    define("LINK", 2);
    define("INTERNAL_LINK", 3); 
    
    ?>

    <div id="container">
            <div id="head">
                <!-- This part should not be edited --> 
                <div id="menu">
                    | <a href="system/content.php?sez=<?php print Conf::home ?>"><?php print Conf::home ?></a> |
                    <?php
                        $db = new JPCdb(DBInfo::host, DBInfo::name, DBInfo::user, DBInfo::pwd);
                        $query = "SELECT name, type FROM sections";
                        $res = $db->query($query);
                        while(($row = mysql_fetch_assoc($res)) != null)
                        {
                            if(strcmp($row[name], Conf::home) != 0)
                            {
                                ?>
                    <a href="system/content.php?sez=<?php print $row[name] ?>"><?php print $row[name] ?></a> |
                                <?php
                            }
                        }
                    ?> </div>
                    <hr />
                <!-- End -->
            </div>
        <!-- Here is include the home page you set -->
        <div id="body">
            <?php
                if(isset($_GET["page"]))
                    require("system/content.php?sez=".$_GET["page"]);
                else
                    require("system/content.php?sez=".Conf::home);
            ?>
        </div>
    </div>


