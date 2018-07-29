
<?php 

// import config
require_once("conf.php");

Class Connection {

    protected $db;

    function __construct() {

        try {
            // Connect to Mysql
            $this->db = new PDO("mysql:host" . constant("HOST") . ";dbname=" . constant('DB') .")", constant('USER'), constant('PASSWORD'));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec("SET CHARACTER SET utf8");

            return $this->db;

        } catch(Exception $e) { 
            echo $e.getMessage(); 
        }
       
    }

}

?>
