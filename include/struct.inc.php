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

    require_once("config.inc.php");

    class HTMLstruct
    {
        static function top()
        {
            ?>
<html>
    <head>
        <title><?php print Conf::title ?></title>
        <?php
            if(strstr($_SERVER["PHP_SELF"], "index.php"))
            {
                ?>
        <link rel="stylesheet" type="text/css" href="themes/<?php print Conf::theme ?>/style.css" />                    
                <?php
            }
            else if(strstr($_SERVER["PHP_SELF"], "modules"))
            {
                ?>
        <link rel="stylesheet" type="text/css" href="../../themes/<?php print Conf::theme ?>/style.css" />                    
                <?php
            }
            else
            {
                ?>
        <link rel="stylesheet" type="text/css" href="../themes/<?php print Conf::theme ?>/style.css" />                    
                <?php
            }
            ?>
    </head>
    <body>
            <?php
        }

        static function foot()
        {
            ?>
        <br /><br />
        <!-- It would be great if you leave this credits, however you
             can do what the fuck you want :) -->
        <div class="credits">powered by <a href="http://alkz.altervista.org/#JPC">JPC</a> - v<?php print VERSION ?></div>
    </body>
</html> 
            <?php 
        } 
        
        static function footSimple()
        {
            ?>
        <br /><br />
    </body>
</html> 
            <?php 
        }
    }
?>
