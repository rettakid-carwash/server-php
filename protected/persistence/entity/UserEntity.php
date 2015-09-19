<?php

/** @Entity @Table(name="pacs_user") **/
class UserEntity 	{

    /** @Id @Column(name="USER_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $userId;
    /** @Column(name="USER_EMAIL" , type="string" , length=50 , nullable=false) **/
    protected $userEmail;
    /** @Column(name="USER_PASSWORD" , type="string" , length=20 , nullable=false) **/
    protected $userPassword;
    /** @Column(name="USER_NAME" , type="string" , length=20) **/
    protected $userName;
    /** @Column(name="USER_SURNAME" , type="string" , length=20) **/
    protected $userSurname;
    /** @Column(name="USER_NUMBER" , type="string" , length=15) **/
    protected $userNumber;
    /** @Column(name="USER_GENDER" , type="string" , length=9) **/
    protected $userGender;
    /** @Column(name="USER_AGE" , type="integer" , length=4) **/
    protected $userAge;
    /** @Column(name="USER_ALLOW_PUSH" , type="boolean" , nullable=false) **/
    protected $userAllowPush;

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
        return ($this->userAllowPush) ? 'true' : 'false';
	}

	public function setUserAllowPush($userAllowPush)	{
		$this->userAllowPush = $userAllowPush;
	}


}
?>
