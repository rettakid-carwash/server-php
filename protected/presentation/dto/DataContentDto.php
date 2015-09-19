<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class DataContentDto extends Dto 	{

    private $dataContentId;
    private $dataContentData;

	public function __construct()	{
	}

    public function getDataContentId()	{
		return $this->dataContentId;
	}

	public function setDataContentId($dataContentId)	{
		$this->dataContentId = $dataContentId;
	}

    public function getDataContentData()	{
		return $this->dataContentData;
	}

	public function setDataContentData($dataContentData)	{
		$this->dataContentData = $dataContentData;
	}


}

class DataContentListDto extends Dto {

	private $dataContents = array();

	public function getDataContents()	{
		return $this->dataContents;
	}

	public function setDataContents($dataContents)	{
		$this->dataContents = $dataContents;
	}

}
?>
