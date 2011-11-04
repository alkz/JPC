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

    require_once("include/config.inc.php");
    require_once("langs/".Conf::language.".inc.php");
    require_once("include/struct.inc.php");
    HTMLstruct::top();


    // Check if JPC is installed

    $installed = false;
    
    $tables = mysql_list_tables(DBInfo::name); 
	while(list($tmp) = mysql_fetch_array($tables)) 
    {
		if($tmp == "modules") 
        {
			$installed = true;
            break;
		}
	}

    if(!$installed) 
    {
        print $_ERRORS["notInst"];
        die();
    }

    require_once("themes/".Conf::theme."/home.php");    // Just loads the theme, too easy isn't it? lol

    HTMLstruct::foot();
?>
