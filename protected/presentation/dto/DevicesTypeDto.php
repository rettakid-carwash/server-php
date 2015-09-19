<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class DevicesTypeDto extends Dto 	{

    private $devicesTypeId;
    private $deviceTypeName;
    private $deviceCanPush;

	public function __construct()	{
	}

    public function getDevicesTypeId()	{
		return $this->devicesTypeId;
	}

	public function setDevicesTypeId($devicesTypeId)	{
		$this->devicesTypeId = $devicesTypeId;
	}

    public function getDeviceTypeName()	{
		return $this->deviceTypeName;
	}

	public function setDeviceTypeName($deviceTypeName)	{
		$this->deviceTypeName = $deviceTypeName;
	}

    public function getDeviceCanPush()	{
		return $this->deviceCanPush;
	}

	public function setDeviceCanPush($deviceCanPush)	{
		$this->deviceCanPush = $deviceCanPush;
	}


}

class DevicesTypeListDto extends Dto {

	private $devicesTypes = array();

	public function getDevicesTypes()	{
		return $this->devicesTypes;
	}

	public function setDevicesTypes($devicesTypes)	{
		$this->devicesTypes = $devicesTypes;
	}

}
?>
