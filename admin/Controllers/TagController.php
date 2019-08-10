<?php
	require_once '../Models/Database.php';

    date_default_timezone_set("Asia/Ho_Chi_Minh");
/**
*
*/
class TagController
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    function findTagIdByTag($tag) {
    	$sql = "SELECT id FROM meranda_tag WHERE `slug` = '".$tag."'";

    	$result = $this->db->executeQueryGetOne($sql);

    	return $result['id'];
    }


    function addBlogTag($blogId, $tags) {
        foreach ($tags as $tag) {
        	$tagId = $this->findTagIdByTag($tag)[0];
            $sql = "INSERT INTO meranda_blog_tag (`id`, `blog_id`, `tag_id`) VALUES (NULL, '$blogId', '$tagId')";

            $result = $this->db->executeUpdate($sql);

            if (is_string($result)) {
                return $result;
            }
        }
    }

    function deleteAllBlogTags($blogId) {
        $sql ="DELETE FROM meranda_blog_tag WHERE `blog_id` = ".$blogId;

        $result = $this->db->executeUpdate($sql);

        if ($result > 0) {
           return true;
        } else {
          return false;
        }

    }
}
?>
