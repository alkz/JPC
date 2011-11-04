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
    require_once("../system/db.php");
    require_once("../system/security.php");

    ?> 

        <?php print $_MENU["title"] ?>:<br /><br />
        - <a href="formSection.php?op=m"><?php print $_MENU["mkSection"] ?></a><br />
        - <a href="formSection.php?op=e"><?php print $_MENU["eSection"] ?></a><br /><br />

        <br /><br /><?php print $_MENU["modules"] ?>:<br /><br />

        <?php
            // Check for modules
            $db = new JPCdb(DBInfo::host, DBInfo::name, DBInfo::user, DBInfo::pwd);
            $query = "SELECT * FROM modules";
            $res = $db->query($query);
            $modules = 0;
            while(($row = mysql_fetch_assoc($res)) != null)
            {
                print $row[name]."<br />";
                require_once("../modules/".$row[dir]."/menu.php");
                ?>
                <br /><br />
                <?php
                $modules++;
            }

            $db->close();
            if(!$modules) print $_MESSAGES["noModules"];

        ?>
        <br /><br />
        <br /><br />
        - <a href="../system/logout.php"><?php print $_MENU["logout"] ?></a><br />
        <?php

        HTMLstruct::footSimple();
    ?>
