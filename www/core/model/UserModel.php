<?php
	class UserModel extends DataBaseModel
	{
		var $userid;
		var	$userlogin;
		var	$userpassword;
		var	$userfirstname;
		var	$usersecondname;
		var	$userregistred;
		var	$useractive;
		
		public function CreateNewUser($login,$pass,$firstname,$secondname)
		{
				$this->userlogin=$login;
				$this->userpassword=$pass;
				$this->userfirstname=$firstname;
				$this->secondname=$secondname;
		}
		
		public function GetUser($uid)
		{
				$query=$this->DBH->prepare("SELECT * FROM `users` WHERE `user.id` = :uid");
				$query->bindParam(':uid',$uid);
				$query->execute();
				$result=$query->fetch(PDO::FETCH_ASSOC);
				$this->userid=$result['user.id'];
				$this->userlogin=$result['user.login'];
				$this->userpassword=$result['user.password'];
				$this->userfirstname=$result['user.firstname'];
				$this->usersecondname=$result['user.secondname'];
				$this->userregistred=$result['user.registred'];
				$this->useractive=$result['user.active'];
				$this->Registry('User #'.$this->userid.' readed from DB',1);
		}
		public function SetUser()
		{
			try
			{
			if ($this->userid)
			{
				$query=$this->DBH->prepare("UPDATE `users` SET `user.password`=:userpassword, `user.firstname`=:userfirstname, `user.secondname`=:usersecondname WHERE `user.id`=:userid");
				$query->bindParam(':userid',$this->userid);
				$query->bindParam(':userpassword',$this->userpassword);
				$query->bindParam(':userfirstname',$this->userfirstname);
				$query->bindParam(':usersecondname',$this->usersecondname);
				$query->execute();
				$this->Registry('User #'.$this->userid.' updated',2);
				return TRUE;
			}
			else
			{
				if ($this->UserExist())
				{
				
				$this->Registry('User "'.$this->userlogin.'" already created', 0);
				return False;
				}
				else
				{
					$query=$this->DBH->prepare("INSERT INTO `users` (`user.id`, `user.login`, `user.password`, `user.firstname`, `user.secondname`, `user.registred`, `user.active`) VALUES (NULL, :userl, :userp, :userf, :users, CURRENT_TIMESTAMP, '0');");
					$query->bindParam(':userl',$this->userlogin);
					$query->bindParam(':userp',$this->userpassword);
					$query->bindParam(':userf',$this->userfirstname);
					$query->bindParam(':users',$this->secondname);
					$query->execute();
					$this->Registry('User #'.$this->userid.' created',1);
					return TRUE;
				}
			}
			}
			
			catch (PDOException $e)
			{
				echo $e;
			}
		}
		public function UserExist()
		{
				$query=$this->DBH->prepare("SELECT * FROM `users` WHERE `user.login`=:login");
				$query->bindParam(':login',$this->userlogin);
				$query->execute();
				$result=$query->fetch(PDO::FETCH_ASSOC);
				if ($result) {$result=true;} else {$result=false;}
				$this->Registry('User with = '.$this->userlogin.' readed',1);
				return $result;
		}
	}