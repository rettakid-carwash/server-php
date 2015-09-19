<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'DataContentDto.php');

class NewsDto extends Dto 	{

    private $newsId;
    private $newsHeading;
    private $dataContent;
    private $newsDate;

	public function __construct()	{
		$this->dataContent = new DataContentDto();
	}

    public function getNewsId()	{
		return $this->newsId;
	}

	public function setNewsId($newsId)	{
		$this->newsId = $newsId;
	}

    public function getNewsHeading()	{
		return $this->newsHeading;
	}

	public function setNewsHeading($newsHeading)	{
		$this->newsHeading = $newsHeading;
	}

    public function getDataContent()	{
		return $this->dataContent;
	}

	public function setDataContent($dataContent)	{
		$this->dataContent = $dataContent;
	}

    public function getNewsDate()	{
		return $this->newsDate;
	}

	public function setNewsDate($newsDate)	{
		$this->newsDate = $newsDate;
	}


}

class NewsListDto extends Dto {

	private $newss = array();

	public function getNewss()	{
		return $this->newss;
	}

	public function setNewss($newss)	{
		$this->newss = $newss;
	}

}
?>
