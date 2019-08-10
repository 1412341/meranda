*-
 <?php
	require_once '../Models/Database.php';

    date_default_timezone_set("Asia/Ho_Chi_Minh");
/**
*
*/
class BlogController
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    function publishBlog($title, $picture, $content, $author, $date, $slug) {
        $content = $this->db->escapeString($content);
        $title = $this->db->escapeString($title);
    	$sql = "INSERT INTO meranda_blog (`id`, `title`, `picture`, `content`, `author`, `date`, `slug`)
    			VALUES (NULL, '$title', '$picture', '$content', '$author', '$date', '$slug')";

    	$result = $this->db->executeUpdate($sql);
        if (is_string($result)) {
            return $result;
        } else {
        	return $result > 0;
        }
    }

    function updateBlog($id, $title, $picture, $content, $author, $date, $slug) {
        $content = $this->db->escapeString($content);
        $title = $this->db->escapeString($title);
        $sql = "UPDATE meranda_blog SET `title` = '". $title ."', `picture` = '". $picture ."', `content` = '". $content ."', `author` = '". $author ."', `date` = '". $date ."', `slug` = '". $slug ."'
                WHERE `meranda_blog`.`id` = ".$id;


        // $result = $this->db->query($sql);
        $result = $this->db->executeUpdate($sql);
        if (is_string($result)) {
            return $result;
        } else {
            return $result > 0;
        }
    }

    function deleteBlog($blogId) {

        $sql = "DELETE FROM meranda_blog WHERE id=$blogId";

        $result = $this->db->executeUpdate($sql);

        if ($result > 0) {
           return true;
        } else {
          return false;
        }
    }

    function getLastId() {
        $sql = "SELECT id FROM meranda_blog ORDER BY id DESC LIMIT 1";

        $result = $this->db->executeQueryGetOne($sql);

        return $result['id'];
    }

    // function getStatusOfBlog($blogId) {
    //     $sql = "SELECT status FROM tb_blogpost
    //             WHERE id = '$blogId'";

    //     $result = $this->db->executeQueryGetOne($sql);

    //     return $result['status'];
    // }

    // function changeToPublished($id, $title, $picture, $short_intro, $content, $author, $date, $categoryId) {
    //     $content = $this->db->escapeString($content);
    //     $title = $this->db->escapeString($title);
    //     $short_intro = $this->db->escapeString($short_intro);
    //     $sql = "UPDATE tb_blogpost SET `title` = '". $title ."', `picture` = '". $picture ."', `short_intro` = '". $short_intro ."', `content` = '". $content ."', `author` = '". $author ."', `date` = '". $date ."', `category` = '". $categoryId ."', `status` = 'Published'
    //             WHERE `tb_blogpost`.`id` = ".$id;

    //     $result = $this->db->executeUpdate($sql);
    //     if (is_string($result)) {
    //         return $result;
    //     } else {
    //         return $result > 0;
    //     }
    //     // return $result;
    // }

    // function deleteCmt($cmtId) {
    //     $sql = "DELETE FROM tb_blogcmt WHERE id=$cmtId";

    //     $result = $this->db->executeUpdate($sql);

    //     if ($result > 0) {
    //        return true;
    //     } else {
    //       return false;
    //     }
    // }

    function getPictureFromBlog($blogId) {
        $sql = "SELECT picture FROM meranda_blog WHERE id='$blogId'";

        $result = $this->db->executeQueryGetOne($sql);

        return $result['picture'];
    }
}
?>
