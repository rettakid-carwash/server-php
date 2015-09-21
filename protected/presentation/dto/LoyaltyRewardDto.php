<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class LoyaltyRewardDto extends Dto 	{

    private $rewardsId;
    private $rewardsName;
    private $rewardsDescr;
    private $rewardsAmount;
    private $effFrom;
    private $effTo;

	public function __construct()	{
		$this->effFrom = new \DateTime("now");
		$this->effTo = new \DateTime("now");
	}

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

class LoyaltyRewardListDto extends Dto {

	private $loyaltyRewards = array();

	public function getLoyaltyRewards()	{
		return $this->loyaltyRewards;
	}

	public function setLoyaltyRewards($loyaltyRewards)	{
		$this->loyaltyRewards = $loyaltyRewards;
	}

}
?>
