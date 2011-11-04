<?php

 /********************************************************************  
 *                        JPC(Jargon PHP CMS)                        * 
 *********************************************************************
 *                                                                   *
 *     copyleft alkz                                                 * 
 *                                                                   *
 *                          PUBLIC LICENSE                           * 
 *                         Date: 2010/01/12                          *
 *              See http://www.gnu.org/licenses/gpl.html             *                                                                   
 ********************************************************************/

?>

<?php

    // Not directly open
    $selfpart = split("/", $_SERVER["PHP_SELF"]);
    $file = ereg_replace("\\\\", "/", __FILE__);
    $filepart = split("/", $file);

    if($selfpart[count($selfpart) - 1] ==
        $filepart[count($filepart) - 1])
        die("Forbidden Access.");

    define(VERSION, "0.1.2");

    #####################################################
    #          Informations about your MySQL            #
    #####################################################
    class DBInfo
    { 
        const host = "";  
        const name = "";          
        const user = "";
        const pwd = "";
    }

    
    #####################################################
    #               Basic Informations                  #
    #####################################################

    class Conf
    {
        # Password for Login
        const pwd = "test";

        # Title of site
        const title = "JPCTest";

        # Your language(to know which languages JPC supports, take a look in langs/)
        const language = "EN";

        # Your theme(look in themes/)
        const theme = "default";

        #Page that you want to as Home page
        const home = "blog"; 
    }
/*
    if(!file_exists("../langs/".Conf::language.".inc.php"))
        die("The language you chose is not supported!"); 
        */
?>
