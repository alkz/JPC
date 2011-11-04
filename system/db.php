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

    class JPCdb
    {
        private $conn = null;
        private $host = null;
        private $name = null;
        private $user = null;
        private $pwd = null;

        public function __construct($host, $name, $user, $pwd)
        {
            $this->host = $host;
            $this->name = $name;
            $this->user = $user;
            $this->pwd = $pwd;
             
            if(!($this->conn = mysql_connect($host, $user, $pwd)))
            {
                print $_ERRORS["dbAccess"];
                die();
            }

            if(!(mysql_select_db($this->name, $this->conn)))
            {
                print $_ERRORS["dbSelect"];
                die();
            }

            return $this->conn;
        }

        public function query($query)
        {  
            if(!($res = mysql_query($query, $this->conn)))          
            {
                print $_ERRORS["query"];
                die();
            }
           
            return $res;
        }      
        
        public function close()
        {
            mysql_close($this->conn);
        }
    }

?>
