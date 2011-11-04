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

    ?>  
    <form action="login.php" method="POST" name="loginForm">
        <?php print $_FORM["pwd"] ?>:<br />
        <input type="password" size="40" id="pwd" name="pwd" />
        <br /><br />
        <input type="submit" value="<?php print $_FORM["butLog"] ?>" /> 
    </form>
    <?php
    HTMLstruct::footSimple();
    ?> 
