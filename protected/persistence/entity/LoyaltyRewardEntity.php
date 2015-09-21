<?php

/** @Entity @Table(name="PACS_LOYALTY_REWARD") **/
class LoyaltyRewardEntity 	{

    /** @Id @Column(name="REWARDS_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $rewardsId;
    /** @Column(name="REWARDS_NAME" , type="string" , length=50 , nullable=false) **/
    protected $rewardsName;
    /** @Column(name="REWARDS_DESCR" , type="string" , length=50 , nullable=false) **/
    protected $rewardsDescr;
    /** @Column(name="REWARDS_AMOUNT" , type="bigint" , length=15 , nullable=false) **/
    protected $rewardsAmount;
    /** @Column(name="EFF_FROM" , type="datetime" , nullable=false) **/
    protected $effFrom;
    /** @Column(name="EFF_TO" , type="datetime" , nullable=false) **/
    protected $effTo;

    public function getRewardsId()	{
        return $this->rewardsId;
	}

	public function setRewardsId($rewardsId)	{
		$this->rewardsId = $rewardsId;
	}

    public function getRewardsName()	{
        return $this->rewardsName;
	}

	public function setRewardsName($rewardsName)	{
		$this->rewardsName = $rewardsName;
	}

    public function getRewardsDescr()	{
        return $this->rewardsDescr;
	}

	public function setRewardsDescr($rewardsDescr)	{
		$this->rewardsDescr = $rewardsDescr;
	}

    public function getRewardsAmount()	{
        return $this->rewardsAmount;
	}

	public function setRewardsAmount($rewardsAmount)	{
		$this->rewardsAmount = $rewardsAmount;
	}

    public function getEffFrom()	{
        return $this->effFrom;
	}

	public function setEffFrom($effFrom)	{
		$this->effFrom = $effFrom;
	}

    public function getEffTo()	{
        return $this->effTo;
	}

	public function setEffTo($effTo)	{
		$this->effTo = $effTo;
	}


}
?>
