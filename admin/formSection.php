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

    define("SECTION", 0);
    define("MODULE", 1);
    define("LINK", 2);
    define("INTERNAL_LINK", 3); 
    
    if($_GET["op"] == 'm')
    {
        if(!isset($_GET["type"]))
            {
                print $_MESSAGES["secType"]."<br />";
                ?>
        <a href="formSection.php?op=m&type=<?php print SECTION ?>"><?php print $_MESSAGES["section"] ?></a>            
        <a href="formSection.php?op=m&type=<?php print LINK ?>"><?php print $_MESSAGES["link"] ?></a>
        <a href="formSection.php?op=m&type=<?php print INTERNAL_LINK ?>"><?php print $_MESSAGES["int_link"] ?></a>            
                <?php
            }
            else if($_GET["type"] == SECTION)
            {
                ?>
        <form action="../system/createSection.php?type=<?php print SECTION ?>" method="POST" name="formEditSection"> <?php print $_FORM["sectionName"] ?><br />
            <input type="text" size="30" id="name" name="name" /><br /><br />
            <?php print $_FORM["sectionCont"] ?><br />
            <textarea rows=15"" cols="30" id="content" name="content"></textarea> <br /><br />
            <input type="submit" value="<?php print $_FORM["butSection"] ?>" />
        </form> 
                <?php 
            }
            else 
            {
                ?>
        <form action="../system/createSection.php?type=<?php print $_GET["type"] ?>" method="POST" name="formEditSection"> <?php print $_FORM["sectionName"] ?><br />
            <input type="text" size="30" id="name" name="name" /><br /><br />
            <?php print $_FORM["sectionLink"] ?><br />
            <input type="text" size="100" id="url" name="url" />
            <br /><br />
            <input type="submit" value="<?php print $_FORM["butSection"] ?>" />
        </form> 
               <?php
            }
    }
    else if($_GET["op"] == 'e')
    {
        $db = new JPCdb(DBInfo::host, DBInfo::name, DBInfo::user, DBInfo::pwd);

        if(!isset($_GET["id"]))
        {
            $query = "SELECT * FROM sections";
            ?> 
        <table>
            <tr>
                <th><?php print $_TABLES["sectionName"] ?></th>
            </tr>
            <?php

            $res = $db->query($query);
            while(($row = mysql_fetch_assoc($res)) != null)
            {
                if($row[type] == MODULE) continue; 
                ?>
            <tr>
                <td><?php print $row[name] ?></td> 
                <td><a href="formSection.php?op=e&id=<?php print $row[id] ?>"><?php print $_TABLES["editSection"] ?></a></td>
                <td><a href="../system/deleteSection.php?id=<?php print $row[id] ?>"><?php print $_TABLES["deleteSection"] ?></a></td>
            </tr>
                <?php
            }
            
            ?>
        </table>
            <?php
        }
        else
        {
            $query = "SELECT * FROM sections WHERE id = '".$_GET["id"]."'";
            $row = mysql_fetch_assoc($db->query($query));
            if($row[type] == SECTION)
            {
                ?>
        <form action="../system/editSection.php?id=<?php print $_GET["id"] ?>&type=<?php print SECTION ?>" method="POST" name="formEditSection">
            <?php print $_FORM["sectionName"] ?><br />
            <input type="text" size="30" id="name" name="name" value="<?php print $row[name] ?>" /><br /><br />
            <?php print $_FORM["sectionCont"] ?><br />
            <textarea rows=15"" cols="30" id="content" name="content"><?php print $row[content] ?></textarea>
            <br /><br />
            <input type="submit" value="<?php print $_FORM["sectionEdit"] ?>" />
        </form> 
                <?php 
            }
            else if($row[type] == LINK || $row[type] == INTERNAL_LINK) 
            {
                ?>
        <form action="../system/editSection.php?id=<?php print $_GET["id"] ?>&type=<?php print $_GET["type"] ?>" method="POST" name="formEditSection">
            <?php print $_FORM["sectionName"] ?><br /><br />
            <input type="text" size="30" id="name" name="name" value="<?php print $row[name] ?>" /><br /><br />
            <?php print $_FORM["sectionLink"] ?><br /><br />
            <input type="text" size="100" id="url" name="url" value="<?php print $row[url] ?>" />
            <br /><br />
            <input type="submit" value="<?php print $_FORM["sectionEdit"] ?>" />
        </form> 
               <?php 
            }
        }

        $db->close();
    }
    else
        die($_ERROR["access"]);

    HTMLstruct::footSimple();
?>
