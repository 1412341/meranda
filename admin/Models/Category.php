<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require_once('Database.php');


class Category
{

	function __construct()	{ }
	public static function getAllCategory() {
		$query = "SELECT id, title, slug, picture FROM `meranda_category`";

		$result = (new Database())->executeQueryGetList($query);

		if (empty($result)) {
			return null;
		}

		return $result;
	}

    // public static function getCategoryInBlog($categoryId) {
    //     $sql = "SELECT title FROM meranda_category WHERE id=$categoryId";
    //
    //     $result = (new Database())->executeQueryGetList($sql);
    //
    //     return $result[0]['name'];
    // }
    public static function getCategoryInBlog($blogId) {
        $sql = "SELECT category_id FROM meranda_blog_category WHERE blog_id=$blogId";
        $result = (new Database())->executeQueryGetList($sql);
        $categoryId = $result[0]['category_id'];

        $sql = "SELECT title FROM meranda_category WHERE id=$categoryId";
        $result = (new Database())->executeQueryGetList($sql);
        return $result[0]['title'];


    }

    public static function getCategoryById($id) {
		$query = "SELECT id, title, picture, slug FROM meranda_category WHERE id=$id";

		$result = (new Database())->getResult($query);


		if (isset($result)) {
			$blog = mysqli_fetch_array($result);
		}

		return $blog;
	}
    public static function getCategoryBySlug($slug) {
		$query = "SELECT id, title, picture, slug FROM meranda_category WHERE slug LIKE '%$slug%'";

		$result = (new Database())->getResult($query);


		if (isset($result)) {
			$blog = mysqli_fetch_array($result);
		}

		return $blog;
	}
}
?>
