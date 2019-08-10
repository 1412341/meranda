<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require_once('Database.php');


class Tag
{
	
	function __construct()	{ }
	public static function getAllTagSlug() {
		$query = "SELECT slug FROM `3net_tag`";

		$result = (new Database())->executeQueryGetList($query);

		if (empty($result)) {
			return null;
		} else {
			$tags = array();
			for($i = 0; $i < count($result); $i++) {
				array_push($tags, $result[$i]['slug']);
			}
		}

		return array_values($tags);
	}
}
?>