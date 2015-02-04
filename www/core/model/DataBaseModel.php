<?php
class DataBaseModel
{
private $db_host='localhost';
    private $db_username='root';
    private $db_password='';
    private $db_base='host1354893_whar';
    public $DBH;
	function __construct()
    {
        try 
        {  
            $this->DBH = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_base, $this->db_username, $this->db_password);       
        }  
        catch(PDOException $e) 
        {  
            echo "Хьюстон, у нас проблемы.";  
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);  
        }
    }
    
}