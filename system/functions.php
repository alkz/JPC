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

    class Functions
    {
        static function format($string)
        {
            $string = trim($string);
            $string = str_replace("<", "&lt;", $string);
            $string = str_replace(">", "&gt;", $string);
            $string = addslashes(stripslashes($string));
            
            return $string;
        }
        
        static function redirect($url, $seconds = false)
        {
            if (!headers_sent() && $seconds == false)
                header("Location: " . $url);
            else
            {
                if ($seconds == false)
                    $seconds = "0";
                print '<meta http-equiv="refresh" content="'.$seconds.';url='.$url.'" />';
            }
        }
        
        static function removedir($dir)
        {
            if($objs = glob($dir."/*"))
            {
                foreach($objs as $obj) 
                {
                    is_dir($obj) ? rmdirr($obj) : unlink($obj);
                }
            }
            rmdir($dir);
        }
    }
    
 ?>
