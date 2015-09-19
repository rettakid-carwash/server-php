<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');

function bindUserDto($userDto)	{
	if ($userDto != null)	{
	    global $entityManager;
		$userEntity = new UserEntity();
        $userEntity->setUserId($userDto->getUserId());
        $userEntity->setUserEmail($userDto->getUserEmail());
        $userEntity->setUserPassword($userDto->getUserPassword());
        $userEntity->setUserName($userDto->getUserName());
        $userEntity->setUserSurname($userDto->getUserSurname());
        $userEntity->setUserNumber($userDto->getUserNumber());
        $userEntity->setUserGender($userDto->getUserGender());
        $userEntity->setUserAge($userDto->getUserAge());
        $userEntity->setUserAllowPush($userDto->getUserAllowPush());
        return $userEntity;
    }	else {
        return null;
    }
}

function bindUserEntity($userEntity)	{
	if ($userEntity != null)	{
		$userDto = new UserDto();
        $userDto->setUserId($userEntity->getUserId());
        $userDto->setUserEmail($userEntity->getUserEmail());
        $userDto->setUserPassword($userEntity->getUserPassword());
        $userDto->setUserName($userEntity->getUserName());
        $userDto->setUserSurname($userEntity->getUserSurname());
        $userDto->setUserNumber($userEntity->getUserNumber());
        $userDto->setUserGender($userEntity->getUserGender());
        $userDto->setUserAge($userEntity->getUserAge());
        $userDto->setUserAllowPush($userEntity->getUserAllowPush());
        return $userDto;
    }	else {
        return null;
    }
}

function bindUserEntityArray($userEntitys)   {
    $userDtos = new UserListDto();
    $userDtoArray = array();
    foreach ($userEntitys as $userEntity => $value) {
        array_push($userDtoArray, bindUserEntity($value));
    }
    $userDtos->setUsers($userDtoArray);
    return $userDtos;
}

?>