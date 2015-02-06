<?php
class ScheduleModel {
public $user_id;
public $group_id;
public $schedule_id;
public $schedule_start;
public $schedule_end;

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

 public function Get($id)
    {
        try 
        {  
            $query=$this->DBH->prepare("SELECT * FROM `schedules` WHERE `schedule_id`=:id");
            $query->bindParam(':id',$id);
			$query->execute();
            $result=$query->fetch(PDO::FETCH_ASSOC);
            $this->user_id=$result['user_id'];
            $this->schedule_id=$result['schedule_id'];
            $this->group_id=$result['group_id'];
			$this->schedule_start=$result['schedule_start'];
			$this->schedule_end=$result['schedule_end'];
			echo 'Ready';
            $this->WriteLog('Reading', array('Query'=>$query,'Result'=>json_encode($result)));
        }  
        catch(PDOException $e) 
        { 
             $this->WriteLog('Write', $e->getMessage()); 
        }
    }
public function Set()
    {
        
        if ($this->schedule_id)        
        {
           {
                try 
                    {
                        $query=$this->DBH->prepare("UPDATE `schedules` SET `group_id` = :group_id, `schedule_start` = :schedule_start, `schedule_end` = :schedule_end, `user_id` = :id WHERE `schedule_id`=:schedule_id");
                        $query->bindParam(":group_id", $this->group_id);
                        $query->bindParam(":id", $this->user_id);
                        $query->bindParam(":schedule_start", $this->schedule_start);
                        $query->bindParam(":schedule_end", $this->schedule_end);
                        $query->bindParam(":schedule_id", $this->schedule_id);
                        $query->execute();
                        $this->WriteLog('Write', 'success'); 
                    } 
                catch(PDOException $e) 
                    { 
                        $this->WriteLog('Write', $e->getMessage());
                        return false;
                    }
            }
        }
        else  
        {
            try 
            {
                $query=$this->DBH->prepare("INSERT INTO `users` (`user_id`, `login`, `password`) VALUES (NULL, :lo, :pa)");
                echo $this->login;
                $query->bindParam(":lo",$this->login);
                echo $this->password;
                $query->bindParam(":pa",$this->password);
                $query->execute();
                $this->WriteLog('Write', 'success');  
            } 
            catch(PDOException $e) 
            { 
                $this->WriteLog('Write', $e->getMessage()); 
            }
        }
    }

}
?>