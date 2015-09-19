<?php

/** @Entity @Table(name="PACS_ICON") **/
class IconEntity 	{

    /** @Id @Column(name="ICON_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $iconId;
    /** @Column(name="ICON_NAME" , type="string" , length=10 , nullable=false) **/
    protected $iconName;
    /** @Column(name="ICON_COLOR" , type="string" , length=10 , nullable=false) **/
    protected $iconColor;
    /** @Column(name="ICON_SIZE" , type="integer" , length=9 , nullable=false) **/
    protected $iconSize;
    /** @Column(name="ICON_FILE_NAME" , type="string" , length=50 , nullable=false) **/
    protected $iconFileName;

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
?>
