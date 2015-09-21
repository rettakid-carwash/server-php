<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'LoyaltyRewardDto.php');

function bindLoyaltyRewardDto($loyaltyRewardDto)	{
	if ($loyaltyRewardDto != null)	{
	    global $entityManager;
		$loyaltyRewardEntity = new LoyaltyRewardEntity();
        $loyaltyRewardEntity->setRewardsId($loyaltyRewardDto->getRewardsId());
        $loyaltyRewardEntity->setRewardsName($loyaltyRewardDto->getRewardsName());
        $loyaltyRewardEntity->setRewardsDescr($loyaltyRewardDto->getRewardsDescr());
        $loyaltyRewardEntity->setRewardsAmount($loyaltyRewardDto->getRewardsAmount());
        $loyaltyRewardEntity->setEffFrom($loyaltyRewardDto->getEffFrom());
        $loyaltyRewardEntity->setEffTo($loyaltyRewardDto->getEffTo());
        return $loyaltyRewardEntity;
    }	else {
        return null;
    }
}

function bindLoyaltyRewardEntity($loyaltyRewardEntity)	{
	if ($loyaltyRewardEntity != null)	{
		$loyaltyRewardDto = new LoyaltyRewardDto();
        $loyaltyRewardDto->setRewardsId($loyaltyRewardEntity->getRewardsId());
        $loyaltyRewardDto->setRewardsName($loyaltyRewardEntity->getRewardsName());
        $loyaltyRewardDto->setRewardsDescr($loyaltyRewardEntity->getRewardsDescr());
        $loyaltyRewardDto->setRewardsAmount($loyaltyRewardEntity->getRewardsAmount());
        $loyaltyRewardDto->setEffFrom($loyaltyRewardEntity->getEffFrom());
        $loyaltyRewardDto->setEffTo($loyaltyRewardEntity->getEffTo());
        return $loyaltyRewardDto;
    }	else {
        return null;
    }
}

function bindLoyaltyRewardEntityArray($loyaltyRewardEntitys)   {
    $loyaltyRewardDtos = new LoyaltyRewardListDto();
    $loyaltyRewardDtoArray = array();
    foreach ($loyaltyRewardEntitys as $loyaltyRewardEntity => $value) {
        array_push($loyaltyRewardDtoArray, bindLoyaltyRewardEntity($value));
    }
    $loyaltyRewardDtos->setLoyaltyRewards($loyaltyRewardDtoArray);
    return $loyaltyRewardDtos;
}

?>