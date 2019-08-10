<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require_once('Database.php');

class Blog
{

	function __construct()	{ }



	// Ngan
	public static function getAllBlogs() {
		$query = "SELECT id, title, content, picture, author, date, slug FROM meranda_blog ORDER BY id DESC";

		$result = (new Database())->getResult($query);
		$blogs = array();

		if (isset($result))
		while ($record = mysqli_fetch_array($result)) {
			$blog = $record;
			// $blog['num_of_cmt']	= Blog::getNumOfCommentInBlog($blog['id']);
			$blogs[]	= $blog;
		}

		return $blogs;
	}

	public static function getBlogs($page=1, $limit=10) {
		$offset = ($page-1)*$limit;
		$query = "SELECT id, title, content, picture, author, date, slug FROM meranda_blog ORDER BY id DESC LIMIT $offset,$limit";

		$result = (new Database())->getResult($query);
		$blogs = array();

		if (isset($result))
		while ($record = mysqli_fetch_array($result)) {
			$blog = $record;
			// $blog['num_of_cmt']	= Blog::getNumOfCommentInBlog($blog['id']);
			$blogs[]	= $blog;
		}

		return $blogs;
	}

	public static function getNewestBlogs($num) {
		$query = "SELECT id, title, content, picture, author, date, slug FROM meranda_blog ORDER BY id DESC LIMIT $num";
		$result = (new Database())->getResult($query);
		$blogs = array();

		if (isset($result))
		while ($record = mysqli_fetch_array($result)) {
			$blog = $record;
			// $blog['num_of_cmt']	= Blog::getNumOfCommentInBlog($blog['id']);
			$blogs[]	= $blog;
		}

		return $blogs;
	}


	//Ngan
	public static function getBlogById($id) {
		$query = "SELECT id, title, picture, content, author, date, timestamp, slug FROM meranda_blog WHERE id = $id";

		$result = (new Database())->getResult($query);


		if (isset($result)) {
			$blog = mysqli_fetch_array($result);
		}

		return $blog;
	}


	public static function getBlogsByCategoryId($categoryId, $offset=0, $limit = 5) {
		$query = "SELECT id, title, picture, content, author, date, timestamp, slug FROM meranda_blog WHERE id IN (SELECT blog_id FROM meranda_blog_category WHERE category_id = $categoryId) ORDER BY date DESC LIMIT $offset, $limit";

		$result = (new Database())->getResult($query);
		$blogs = array();

		if (isset($result)) {
			while ($record = mysqli_fetch_array($result)) {
				$blog = $record;
				// $blog['num_of_cmt']	= Blog::getNumOfCommentInBlog($blog['id']);
				$blogs[]	= $blog;
			}
		}

		return $blogs;
	}

	public static function getBlogsByTag($offset, $tag) {
		$query = "SELECT id, title, picture, date, timestamp FROM tb_blogpost WHERE id IN (SELECT id_post FROM tb_blogtag WHERE tag = '$tag') ORDER BY date DESC LIMIT $offset, 4";

		$result = (new Database())->getResult($query);
		$blogs = array();

		if (isset($result))
			while ($record = mysqli_fetch_array($result)) {
				$blog = $record;
				$blog['num_of_cmt']	= Blog::getNumOfCommentInBlog($blog['id']);
				$blogs[]	= $blog;
			}


		return $blogs;
	}


	public function getTagIdInBlog($id) {
		$query = "SELECT tag_id FROM meranda_blog_tag WHERE blog_id = $id";

		$result = (new Database())->getResult($query);
		$tag = array();

		if (isset($result)) {
			while ($record = mysqli_fetch_array($result)) {
				$tag[]	= $record;
			}
		}

		return $tag;
	}

	public static function getTagInBlog($tagIds) {
		$tagsArr = array();
		foreach ($tagIds as $tagId) {
			$query = "SELECT slug FROM meranda_tag WHERE id = $tagId";

			$result = (new Database())->getResult($query);


			if (isset($result)) {
				while ($record = mysqli_fetch_array($result)) {
					$tagsArr[]	= $record;
				}
			}
		}

		$tags = array();
        foreach ($tagsArr as $tag) {
          $tags[] = $tag['slug'];
        }

		return $tags;
	}

	// Ngan
	public static function getCategoryIdInBlog($id) {
		$query = "SELECT category_id  FROM meranda_blog_category WHERE blog_id = $id";

		$result = (new Database())->getResult($query);

		if (isset($result)) {
			$record = mysqli_fetch_array($result);
		}

		return $record['category_id'];
	}
    public static function getBlogBySlug($slug) {
		$query = "SELECT id, title, picture, slug, content, author, date FROM meranda_blog WHERE slug LIKE '%$slug%'";

		$result = (new Database())->getResult($query);


		if (isset($result)) {
			$blog = mysqli_fetch_array($result);
		}

		return $blog;
	}
    public static function getBlogsByCategoryTitle($title, $offset = 0, $limit = 5) {
		$query = "SELECT id, title, picture, slug, content, author, date FROM meranda_blog WHERE title LIKE '%$title%' LIMIT $offset, $limit";

		$result = (new Database())->executeQueryGetList($query);


		// if (isset($result)) {
		// 	$blog = mysqli_fetch_array($result);
		// }

		return $result;
	}


}
?>
