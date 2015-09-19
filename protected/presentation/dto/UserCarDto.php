<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');

class UserCarDto extends Dto 	{

    private $carId;
    private $user;
    private $carName;
    private $carNumPlate;
    private $carMake;
    private $carModel;
    private $carYear;
    private $carColor;

	public function __construct()	{
		$this->user = new UserDto();
	}

    public function getCarId()	{
		return $this->carId;
	}

	public function setCarId($carId)	{
		$this->carId = $carId;
	}

    public function getUser()	{
		return $this->user;
	}

	public function setUser($user)	{
		$this->user = $user;
	}

    public function getCarName()	{
		return $this->carName;
	}

	public function setCarName($carName)	{
		$this->carName = $carName;
	}

    public function getCarNumPlate()	{
		return $this->carNumPlate;
	}

	public function setCarNumPlate($carNumPlate)	{
		$this->carNumPlate = $carNumPlate;
	}

    public function getCarMake()	{
		return $this->carMake;
	}

	public function setCarMake($carMake)	{
		$this->carMake = $carMake;
	}

    public function getCarModel()	{
		return $this->carModel;
	}

	public function setCarModel($carModel)	{
		$this->carModel = $carModel;
	}

    public function getCarYear()	{
		return $this->carYear;
	}

	public function setCarYear($carYear)	{
		$this->carYear = $carYear;
	}

    public function getCarColor()	{
		return $this->carColor;
	}

	public function setCarColor($carColor)	{
		$this->carColor = $carColor;
	}


}

class UserCarListDto extends Dto {

	private $userCars = array();

	public function getUserCars()	{
		return $this->userCars;
	}

	public function setUserCars($userCars)	{
		$this->userCars = $userCars;
	}

}
?>
