<?php
/**
 * Class for getting title and count members from vk group.
 * Original class for vkApi  https://github.com/VKCOM/vk-php-sdk cannot be used, because need php > 7
 */

class vkApi{

  private static $urlQuery = array(
    'countMember' => 'https://api.vk.com/method/groups.getMembers',
    'title' => 'https://api.vk.com/method/groups.getSettings',
  );

  /**
   * Send query to API and return result query
   * @param $queryUrl String Url for send query
   * @param $requestParams Array Params to send query
   * @return $response Object Response data.
   */
  private static function getQuery($queryUrl,$requestParams){
    $get_params = http_build_query($request_params); 
    $result = json_decode(file_get_contents("$queryUrl?$get_params")); 
    return $result -> response[0]; 
  }

  /**
   * Get title vk group by id
   * @param $groupId ID or short name vk group
   * @param $accessToken String Token for send query by API
   * @return $title String Group Title
   */
  public static function getTitle($groupId,$accessToken){
    $requestParams = array(
      'group_id' => $groupId, 
      'v' => '5.52', 
      'access_token' => $accessToken,
    ); 
    return $title = self::getQuery(self::$urlQuery['title'], $requestParams)->title;
  }

  /**
   * Get count members in group
   * @param $groupId ID or short name vk group
   * @param $accessToken String Token for send query by API
   * @return $countMembers Integer Count members in group
   * 
   */
  public static function getCountMembers($groupId,$accessToken){
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