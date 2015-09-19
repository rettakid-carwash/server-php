<?php

/** @Entity @Table(name="PACS_USER_CAR") **/
class UserCarEntity 	{

    /** @Id @Column(name="CAR_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $carId;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="CAR_USER_ID", referencedColumnName="USER_ID") **/
    protected $user;
    /** @Column(name="CAR_NAME" , type="string" , length=50 , nullable=false) **/
    protected $carName;
    /** @Column(name="CAR_NUM_PLATE" , type="string" , length=50) **/
    protected $carNumPlate;
    /** @Column(name="CAR_MAKE" , type="string" , length=50) **/
    protected $carMake;
    /** @Column(name="CAR_MODEL" , type="string" , length=50) **/
    protected $carModel;
    /** @Column(name="CAR_YEAR" , type="string" , length=50) **/
    protected $carYear;
    /** @Column(name="CAR_COLOR" , type="string" , length=10) **/
    protected $carColor;

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
?>
