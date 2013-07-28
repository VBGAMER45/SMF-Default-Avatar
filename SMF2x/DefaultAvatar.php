<?php

/**
* @package manifest file for Default Avatar
* @version 2.3
* @author Joker (http://www.simplemachines.org/community/index.php?action=profile;u=226111)
* @copyright Copyright (c) 2012, Siddhartha Gupta
* @license http://www.mozilla.org/MPL/MPL-1.1.html
*/

/*
* Version: MPL 1.1
*
* The contents of this file are subject to the Mozilla Public License Version
* 1.1 (the "License"); you may not use this file except in compliance with
* the License. You may obtain a copy of the License at
* http://www.mozilla.org/MPL/
*
* Software distributed under the License is distributed on an "AS IS" basis,
* WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
* for the specific language governing rights and limitations under the
* License.
*
* The Initial Developer of the Original Code is
*  Joker (http://www.simplemachines.org/community/index.php?action=profile;u=226111)
* Portions created by the Initial Developer are Copyright (C) 2012
* the Initial Developer. All Rights Reserved.
*
* Contributor(s):
*
*/

if (!defined('SMF'))
	die('Hacking attempt...');

function checkDefaultAvatar ($user_data) {
	global $modSettings, $settings;

	if(!empty($user_data['avatar']) && !empty($user_data['avatar']['image']) || empty($modSettings['enable_default_avatar'])) {
		return $user_data['avatar'];
	}

	$avatar_url = '';
	if(isset($user_data['gender']) && isset($user_data['gender']['name'])) {
		if($user_data['gender']['name'] == $txt['male'] && !empty($modSettings['default_male_avatar_url'])) {
			$avatar_url = (($user_data['is_online'] || empty($modSettings['default_avatar_opacity'])) ? '<img class="avatar" src="' . $modSettings['default_male_avatar_url'] . '" alt="" />' : '<img class="avatar_offline" src="' . $modSettings['default_male_avatar_url'] . '" alt="" />');
		} elseif($user_data['gender']['name'] == $txt['female'] && !empty($modSettings['default_female_avatar_url'])) {
			$avatar_url = (($user_data['is_online'] || empty($modSettings['default_avatar_opacity'])) ? '<img class="avatar" src="' . $modSettings['default_female_avatar_url'] . '" alt="" />' : '<img class="avatar_offline" src="' . $modSettings['default_female_avatar_url'] . '" alt="" />');
		}
	} else {
		if(!empty($modSettings['default_avatar_url'])) {
			$avatar_url = (($user_data['is_online'] || empty($modSettings['default_avatar_opacity'])) ? '<img class="avatar" src="' . $modSettings['default_avatar_url'] . '" alt="" />' : '<img class="avatar_offline" src="' . $modSettings['default_avatar_url'] . '" alt="" />');
		} else {
			$avatar_url = (($user_data['is_online'] || empty($modSettings['default_avatar_opacity'])) ? '<img class="avatar" src="' . $settings['default_images_url'] . '/default_avatar.png" alt="" />' : '<img class="avatar_offline" src="' . $settings['default_images_url'] . '/default_avatar.png" alt="" />');
		}
	}

	return $avatar_url;
}

?>