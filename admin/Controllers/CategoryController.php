<?php
	require_once '../Models/Database.php';

    date_default_timezone_set("Asia/Ho_Chi_Minh");
/**
*
*/
class CategoryController
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    function publishCategory($title, $picture, $slug) {
        $title = $this->db->escapeString($title);
        $sql = "INSERT INTO meranda_category (`id`, `title`, `picture`, `slug`)
                VALUES (NULL, '$title', '$picture', '$slug')";

        $result = $this->db->executeUpdate($sql);
        if (is_string($result)) {
            return $result;
        } else {
            return $result > 0;
        }
    }

    function updateCategory($id, $title, $picture, $slug) {
        $title = $this->db->escapeString($title);
        $sql = "UPDATE meranda_category SET `title` = '". $title ."', `picture` = '". $picture ."', `slug` = '".$slug."'
                WHERE `meranda_category`.`id` = ".$id;


        // $result = $this->db->query($sql);
        $result = $this->db->executeUpdate($sql);
        if (is_string($result)) {
            return $result;
        } else {
            return $result > 0;
        }
    }

    function deleteCategory($categoryId) {

        $sql = "DELETE FROM meranda_category WHERE id=$categoryId";

        $result = $this->db->executeUpdate($sql);

        if ($result > 0) {
           return true;
        } else {
          return false;
        }
    }

    function addBlogCategory($blogId, $categoryId) {
        $sql = "INSERT INTO meranda_blog_category (`id`, `blog_id`, `category_id`) VALUES (NULL, '$blogId', '$categoryId')";

        $result = $this->db->executeUpdate($sql);

        if (is_string($result)) {
            return $result;
        }
    }

    function deleteAllBlogCategories($blogId) {
        $sql ="DELETE FROM meranda_blog_category WHERE `blog_id` = ".$blogId;

        $result = $this->db->executeUpdate($sql);

        if ($result > 0) {
           return true;
        } else {
          return false;
        }

    }
    function getPictureFromCategory($categoryId) {
        $sql = "SELECT picture FROM meranda_category WHERE id='$categoryId'";

        $result = $this->db->executeQueryGetOne($sql);

        return $result['picture'];
    }
}
?>
