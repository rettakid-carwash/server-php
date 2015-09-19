<?php

/** @Entity @Table(name="pacs_data_content") **/
class DataContentEntity 	{

    /** @Id @Column(name="DATA_CONTENT_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $dataContentId;
    /** @Column(name="DATA_CONTENT_DATA" , type="string" , nullable=false) **/
    protected $dataContentData;

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
?>
