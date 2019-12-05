<?php
/**
 * Class for getting title and count members from vk group.
 * Original class for vkApi  https://github.com/VKCOM/vk-php-sdk cannot be used, because need php > 7
 */

class vkApi(){

  static $urlQuery = array(
    'countMember' => 'https://api.vk.com/method/groups.getMembers',
    'title' => 'https://api.vk.com/method/groups.getSettings',
  );



  static function getQuery($queryUrl,$requestParams){
    $get_params = http_build_query($request_params); 
    $result = json_decode(file_get_contents("$queryUrl?$get_params")); 
    return $result -> response[0]; 
  }

  static function getTitle($groupId,$accessToken){
    $requestParams = array(
      'group_id' => $groupId, 
      'v' => '5.52', 
      'access_token' => $accessToken,
    ); 
    return self::getQuery(self::$urlQuery['title'], $requestParams);
  }

  static function getCountMembers($groupId,$accessToken){
    $requestParams = array(
      'group_id' => $groupId, 
      'fields' => 'bdate,status', 
      'v' => '5.52', 
      'access_token' => $accessToken,
    ); 
    return self::getQuery(self::$urlQuery['countMember'], $requestParams);
  }

 }
?>