<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class UserDto extends Dto 	{

    private $userId;
    private $userEmail;
    private $userPassword;
    private $userName;
    private $userSurname;
    private $userNumber;
    private $userGender;
    private $userAge;
    private $userAllowPush;

	public function __construct()	{
	}

    public function getUserId()	{
		return $this->userId;
	}

	public function setUserId($userId)	{
		$this->userId = $userId;
	}

    public function getUserEmail()	{
		return $this->userEmail;
	}

	public function setUserEmail($userEmail)	{
		$this->userEmail = $userEmail;
	}

    public function getUserPassword()	{
		return $this->userPassword;
	}

	public function setUserPassword($userPassword)	{
		$this->userPassword = $userPassword;
	}

    public function getUserName()	{
		return $this->userName;
	}

	public function setUserName($userName)	{
		$this->userName = $userName;
	}

    public function getUserSurname()	{
		return $this->userSurname;
	}

	public function setUserSurname($userSurname)	{
		$this->userSurname = $userSurname;
	}

    public function getUserNumber()	{
		return $this->userNumber;
	}

	public function setUserNumber($userNumber)	{
		$this->userNumber = $userNumber;
	}

    public function getUserGender()	{
		return $this->userGender;
	}

	public function setUserGender($userGender)	{
		$this->userGender = $userGender;
	}

    public function getUserAge()	{
		return $this->userAge;
	}

	public function setUserAge($userAge)	{
		$this->userAge = $userAge;
	}

    public function getUserAllowPush()	{
		return $this->userAllowPush;
	}

	public function setUserAllowPush($userAllowPush)	{
		$this->userAllowPush = $userAllowPush;
	}


}

class UserListDto extends Dto {

	private $users = array();

	public function getUsers()	{
		return $this->users;
	}

	public function setUsers($users)	{
		$this->users = $users;
	}

}
?>
