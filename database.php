<?php
    
class MyPDO {

    private static $instance = NULL;
    private $pdo = NULL;
    
    private function __construct() {
	$options = [
	    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES => FALSE
	];
	
	$host = '127.0.0.1';
	$db = 'plant_db';
	$user = 'root';
	$pass = 'root';
	$charset = 'utf8mb4';
	
	$dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s',
		$host, $db, $charset);
	
	$this->pdo = new PDO($dsn, $user, $pass, $options);
    }
    
    public static function instance() {
	if (self::$instance === NULL) {
	    self::$instance = new self;
	}
	
	return self::$instance;
    }
    
    // a proxy to native PDO methods
    // __call is triggered when invoking inaccessible methods in an object context
    public function __call($method, $args) {
	return call_user_func_array([$this->pdo, $method], $args);
    }
    
    // a helper function to run prepared statements smoothly
    public function run($sql, $args = []) {
	if (!$args) {
	    return $this->query($sql);
	}
	
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute($args);
	return $stmt;
    }
}