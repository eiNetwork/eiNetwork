<?php

require_once 'DB/DataObject.php';

class GetList extends DB_DataObject{
    function getLists() {
		require_once 'services/MyResearch/lib/User_list.php';
		$lists = array();

		$sql = "SELECT user_list.*, COUNT(user_resource.id) AS cnt FROM user_list " .
               "LEFT JOIN user_resource ON user_list.id = user_resource.list_id " .
               "WHERE user_list.user_id = '$this->id' " . 
               "GROUP BY user_list.id, user_list.user_id, user_list.title, " .
               "user_list.description, user_list.created, user_list.public " .
               "ORDER BY user_list.title";
		$list = new User_list();
		$list->query($sql);
		if ($list->N) {
			while ($list->fetch()) {
				$lists[] = clone($list);
			}
		}

		return $lists;
	}
	
}