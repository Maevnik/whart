<?php
class UserModel
{
    public $user_id;
    public $login;
    public $password;
    
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
            $query=$this->DBH->prepare("SELECT * FROM `users` WHERE `user_id`=?");
            $query->execute(array($id));
            $result=$query->fetch(PDO::FETCH_ASSOC);
            $this->user_id=$result['user_id'];
            $this->login=$result['login'];
            $this->password=$result['password'];
            $this->WriteLog('Reading', array('Query'=>$query,'Result'=>json_encode($result)));
        }  
        catch(PDOException $e) 
        { 
             $this->WriteLog('Write', $e->getMessage()); 
        }
    }
    public function Set()
    {
        
        if ($this->user_id)        
        {
           {
                try 
                    {
                        $query=$this->DBH->prepare("UPDATE `users` SET `login` = :login, `password` = :password WHERE `user_id` = :id");
                        $query->bindParam(":id", $this->user_id);
                        $query->bindParam(":login", $this->login);
                        $query->bindParam(":password", $this->password);
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