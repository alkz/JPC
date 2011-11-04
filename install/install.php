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
    require_once("../system/functions.php");
    require_once("../langs/".Conf::language.".inc.php");
    require_once("../system/db.php");
    
    $queryInstall =  "CREATE TABLE sections
                      (
                          id        INT(5) not null AUTO_INCREMENT PRIMARY KEY,
                          type      TINYINT(2) not null,
                          name      VARCHAR(30) not null,
                          content   TEXT,
                          url       VARCHAR(100)
                      )";

    $queryInstall1 = "CREATE TABLE modules
                      (
                          dir     VARCHAR(50) not null PRIMARY KEY,
                          name    VARCHAR(50) not null
                      )";

    $queryInstall2 = "INSERT INTO sections
                                  (
                                      type,
                                      name,
                                      content
                                  ) 
                                  VALUES
                                  (
                                      0,
                                      'fags',
                                      'yoyoyoyoyoyoyoyoyoyoyoyoyoyoyooyoyoyo'
                                  )";
                                  
    $queryInstall3 = "INSERT INTO sections
                                  (
                                      type,
                                      name,
                                      content
                                  )
                                  VALUES
                                  (
                                      0, 
                                      'alkz',
                                      'alkz is thy God'
                                  )";

    $queryInstall4 = "INSERT INTO sections
                                  (
                                      type,
                                      name,
                                      content
                                  )
                                  VALUES
                                  (
                                      0,
                                      'stuff',
                                      'Here you can put you awesome stuff'
                                  )";

    $queryInstall5 = "INSERT INTO sections
                                  (
                                      type,
                                      name,
                                      url
                                  )
                                  VALUES
                                  (
                                      3,
                                      'adminMenu',
                                      '../admin/menu.php'
                                  )";

                             
    $queryInstall6 = "INSERT INTO sections
                                  (
                                      type,
                                      name,
                                      url
                                  )
                                  VALUES
                                  (
                                      3,
                                      'loginAdmin',
                                      'formLogin.php'
                                  )";


    $db = new JPCdb(DBInfo::host, DBInfo::name, DBInfo::user, DBInfo::pwd);
    $db->query($queryInstall);
    $db->query($queryInstall1);
    $db->query($queryInstall2);
    $db->query($queryInstall3);
    $db->query($queryInstall4);
    $db->query($queryInstall5);
    $db->query($queryInstall6);
    
    $db->close();
    print $_MESSAGES["install"]."<br />";
    print $_MESSAGES["wait"]."<br />";
    Functions::redirect("../index.php", 5);  

    HTMLstruct::foot();
?>
