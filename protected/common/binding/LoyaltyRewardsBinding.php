<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'LoyaltyRewardsDto.php');

function bindLoyaltyRewardsDto($loyaltyRewardsDto)	{
	if ($loyaltyRewardsDto != null)	{
	    global $entityManager;
		$loyaltyRewardsEntity = new LoyaltyRewardsEntity();
        $loyaltyRewardsEntity->setRewardsId($loyaltyRewardsDto->getRewardsId());
        $loyaltyRewardsEntity->setRewardsName($loyaltyRewardsDto->getRewardsName());
        $loyaltyRewardsEntity->setRewardsDescr($loyaltyRewardsDto->getRewardsDescr());
        $loyaltyRewardsEntity->setRewardsAmount($loyaltyRewardsDto->getRewardsAmount());
        $loyaltyRewardsEntity->setEffFrom($loyaltyRewardsDto->getEffFrom());
        $loyaltyRewardsEntity->setEffTo($loyaltyRewardsDto->getEffTo());
        return $loyaltyRewardsEntity;
    }	else {
        return null;
    }
}

function bindLoyaltyRewardsEntity($loyaltyRewardsEntity)	{
	if ($loyaltyRewardsEntity != null)	{
		$loyaltyRewardsDto = new LoyaltyRewardsDto();
        $loyaltyRewardsDto->setRewardsId($loyaltyRewardsEntity->getRewardsId());
        $loyaltyRewardsDto->setRewardsName($loyaltyRewardsEntity->getRewardsName());
        $loyaltyRewardsDto->setRewardsDescr($loyaltyRewardsEntity->getRewardsDescr());
        $loyaltyRewardsDto->setRewardsAmount($loyaltyRewardsEntity->getRewardsAmount());
        $loyaltyRewardsDto->setEffFrom($loyaltyRewardsEntity->getEffFrom());
        $loyaltyRewardsDto->setEffTo($loyaltyRewardsEntity->getEffTo());
        return $loyaltyRewardsDto;
    }	else {
        return null;
    }
}

function bindLoyaltyRewardsEntityArray($loyaltyRewardsEntitys)   {
    $loyaltyRewardsDtos = new LoyaltyRewardsListDto();
    $loyaltyRewardsDtoArray = array();
    foreach ($loyaltyRewardsEntitys as $loyaltyRewardsEntity => $value) {
        array_push($loyaltyRewardsDtoArray, bindLoyaltyRewardsEntity($value));
    }
    $loyaltyRewardsDtos->setLoyaltyRewardss($loyaltyRewardsDtoArray);
    return $loyaltyRewardsDtos;
}

?>