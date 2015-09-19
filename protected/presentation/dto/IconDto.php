<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class IconDto extends Dto 	{

    private $iconId;
    private $iconName;
    private $iconColor;
    private $iconSize;
    private $iconFileName;

	public function __construct()	{
	}

    public function getIconId()	{
		return $this->iconId;
	}

	public function setIconId($iconId)	{
		$this->iconId = $iconId;
	}

    public function getIconName()	{
		return $this->iconName;
	}

	public function setIconName($iconName)	{
		$this->iconName = $iconName;
	}

    public function getIconColor()	{
		return $this->iconColor;
	}

	public function setIconColor($iconColor)	{
		$this->iconColor = $iconColor;
	}

    public function getIconSize()	{
		return $this->iconSize;
	}

	public function setIconSize($iconSize)	{
		$this->iconSize = $iconSize;
	}

    public function getIconFileName()	{
		return $this->iconFileName;
	}

	public function setIconFileName($iconFileName)	{
		$this->iconFileName = $iconFileName;
	}


}

class IconListDto extends Dto {

	private $icons = array();

	public function getIcons()	{
		return $this->icons;
	}

	public function setIcons($icons)	{
		$this->icons = $icons;
	}

}
?>
