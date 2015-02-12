<?php
class DataBaseModel
{
	protected $db_host;
	protected $db_username;
	protected $db_password;
	protected $db_base;
	public $DBH;
	
    function __construct()
    {
			$this->db_host='localhost';
			$this->db_username='root';
			$this->db_password='';
			$this->db_base='host1354893_whar';
		try
		{
			$this->DBH=new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_base, $this->db_username, $this->db_password);
		}
		catch (PDOException $e)
		{
			echo $e;
		}
	}
	
		public function Registry($data,$type)
		{
			try
			{
				$q=$this->DBH->prepare("INSERT INTO `events` (`event.id`,`event.time`,`event.data`,`event.type`,`event.remoteip`) VALUES (NULL,NULL,:data,:type,:rip)");
				$q->bindParam(':type',$type);
				$q->bindParam(':data',$data);
				$q->bindParam(':rip',$_SERVER['REMOTE_ADDR']);
				$q->execute();
			}
			catch (PDOException $e)
			{
				echo $e;
			}
		}
    
}