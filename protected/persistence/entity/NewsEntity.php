<?php

/** @Entity @Table(name="pacs_news") **/
class NewsEntity 	{

    /** @Id @Column(name="NEWS_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $newsId;
    /** @Column(name="NEWS_HEADING" , type="string" , length=50 , nullable=false) **/
    protected $newsHeading;
    /** @ManyToOne(targetEntity="DataContentEntity" , fetch="LAZY") @JoinColumn(name="NEWS_BODY", referencedColumnName="DATA_CONTENT_ID") **/
    protected $dataContent;
    /** @Column(name="NEWS_DATE" , type="datetime" , nullable=false) **/
    protected $newsDate;

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
?>
