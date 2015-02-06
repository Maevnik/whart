<?php
class GroupModel
	{
	public $group_id;
    public $group_name;
    public $creator_id;
	public $users;
    
    private $db_host='localhost';
    private $db_username='root';
    private $db_password='';
    private $db_base='host1354893_whar';
    private $DBH;

    private function WriteLog($event,$var)
    {
        $message=date("Y-m-d H:i:s ").'IP '.$_SERVER['REMOTE_ADDR'].' '.$event.' - '.json_encode($var);
        file_put_contents(__DIR__.'/MySQLEvents.txt', $message."\n", FILE_APPEND);  
    }
   
    public function __construct() 
    {
        try 
        {  
            $this->DBH = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_base, $this->db_username, $this->db_password);       
            $this->WriteLog('Connection', 'success');
        }  
        catch(PDOException $e) 
        {  
            $this->WriteLog('Write', $e->getMessage());  
        }
    }
	
	public function GetAllUsers($gid)
	{
	try
	{
		$query=$this->DBH->prepare("SELECT * FROM `roles` WHERE `group_id`=:gid");
		$query->bindParam(':gid',$gid);
		$query->execute();
		while ($row=$query->fetch())
		{
			$users[]=$row['user_id'];
		}
	}
	 catch(PDOException $e) 
        { 
             $this->WriteLog('Write', $e->getMessage()); 
        }
	}
	public function Create($uid,$group_name)
	{
		try
		{
		$query=$this->DBH->prepare("INSERT INTO `groups` (`group_id`,`group_name`,`creator_id`) VALUES (NULL, :gn,:cid)");
		$query->bindParam(':gn',$group_name);
		$query->bindParam(':cid',$uid);
		$query->execute();
		}			
		catch(PDOException $e) 
		{ 
			 $this->WriteLog('Write', $e->getMessage()); 
		}
	
	}


)
?>