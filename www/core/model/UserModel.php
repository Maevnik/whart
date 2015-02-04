<?php
class UserModel extends DataBaseModel
{
 public $user_id;
 public $login;
 public $password;
 private $STH;
    
	public function AllRecords()
	{
		$query=$this->DBH->query("SELECT * FROM users");
		return $query->rowCount();
	}
	public function GetUserInfo()
	{
		return json_encode(array($this->user_id,$this->login,$this->password));
	}
	public function Get($id)
	{
	//Здесь мы создаем данные для модели по умолчанию
					
		$query=$this->DBH->query("SELECT * FROM users");
		$this->user_id=$query->rowCount()+1;
		$this->login=('id_'.$this->user_id);
		if (($id<$this->user_id))
			{
				try 
				{
							
							//Здесь пытаемся получить их из БД
								$sth = $this->DBH->prepare("SELECT * FROM users WHERE user_id=".$id);
								$sth->execute();
								$arResult = $sth->fetchAll(PDO::FETCH_ASSOC);
										$this->user_id=$arResult[0]['user_id'];
										$this->login=$arResult[0]['login'];
										$this->password=$arResult[0]['password'];
				}
					catch(PDOException $e) 
						{  
							echo "ErRor";  
							file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);  
						}
			}
	}
	public function Set()
	{
	if ($this->user_id>$this->AllRecords())
	{
	$query=$this->DBH->prepare("INSERT INTO `users` (`user_id`,`login`,`password`) VALUES (NULL, :login, :password)");
	ECHO 'NO RECORD</BR>';
	}
	else
	{
	$query=$this->DBH->prepare("UPDATE `users` SET `login`=':login', `password`=':password' WHERE `user_id`=':id'");
	ECHO 'UPDATE RECORD</BR>';
	}
			try 
				{
					$query->bindParam(':id', $this->user_id);
					$query->bindParam(':login', $this->login);
					$query->bindParam(':password', $this->password);
					$query->execute();
					echo 'COMPLITE</br>';
				}
			catch(PDOException $e) 
				{  
					echo "ErRor";  
					file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);  
				}
	}
}