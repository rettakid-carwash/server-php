<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'DevicesTypeDto.php');

class UserDeviceDto extends Dto 	{

    private $userDevicesId;
    private $user;
    private $devicesType;
    private $deviceName;
    private $deviceId;

	public function __construct()	{
		$this->user = new UserDto();
		$this->devicesType = new DevicesTypeDto();
	}

    public function getUserDevicesId()	{
		return $this->userDevicesId;
	}

	public function setUserDevicesId($userDevicesId)	{
		$this->userDevicesId = $userDevicesId;
	}

    public function getUser()	{
		return $this->user;
	}

	public function setUser($user)	{
		$this->user = $user;
	}

    public function getDevicesType()	{
		return $this->devicesType;
	}

	public function setDevicesType($devicesType)	{
		$this->devicesType = $devicesType;
	}

    public function getDeviceName()	{
		return $this->deviceName;
	}

	public function setDeviceName($deviceName)	{
		$this->deviceName = $deviceName;
	}

    public function getDeviceId()	{
		return $this->deviceId;
	}

	public function setDeviceId($deviceId)	{
		$this->deviceId = $deviceId;
	}


}

class UserDeviceListDto extends Dto {

	private $userDevices = array();

	public function getUserDevices()	{
		return $this->userDevices;
	}

	public function setUserDevices($userDevices)	{
		$this->userDevices = $userDevices;
	}

}
?>
