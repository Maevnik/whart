<?php
class DataBaseModel extends BaseModel
{
    private $db_table;
    private $db_host='localhost';
    private $db_username='host1354893_whar';
    private $db_password='ckexfqyjcnm';
    private $db_base='host1354893_whart';
    private $db;
    function ConnectToBase()
    {
        $this->db = mysql_connect($this->db_host,$this->db_username,$this->db_password) or die("DB DOESN'T WORKS");
        mysql_select_db($this->db_base);
    }
    public function Insert($var)
    {
       echo "this is insert method";
    }
    public function Remove($var)
    {
        echo "this is remove method";
    }
    public function Rewrite($var)
    {
        echo "this is edit method";
    }
     public function Show($table)
    {   
        $this->ConnectToBase();  
        $query =mysql_query('SELECT * FROM '.$table) or die(mysql_error());
        while ($row = mysql_fetch_assoc($query))
        {        
            echo json_encode($row).'</br>';
        }
    }
}