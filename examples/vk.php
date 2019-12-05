<?php 
	/**
	 * For correct retrun title file should be in utf-8 charset;
	 */
	include_once("../vkApi.class.php");
	
	const TOKEN_ACCESS = 'YOUR_API_TOKEN_HERE';
	$group_id = 'GROUP_ID_OR_NAME';
	
	$countMembers = vkApi::getCountMembers($group_id,TOKEN_ACCESS);
	if (!$countMembers){
		echo "Error count members in group $group_id not found\n<br>";
	}else{
		echo "$group_id has $countMembers members\n<br>";
	}

	$titleGroup = vkApi::getTitleGroup($group_id,TOKEN_ACCESS);
	if (!$titleGroup){
		echo "Error title in group $group_id not found\n<br>";
	}else{
		echo "$group_id has '$titleGroup' title\n<br>";
	}
?>