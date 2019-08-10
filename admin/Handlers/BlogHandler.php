<?php

require_once('../Controllers/BlogController.php');
require_once('../Controllers/CategoryController.php');
// require_once('../Controllers/CategoryController.php');
require_once('../Models/Account.php');
session_start();

$action = $_POST['action'];
$account = $_SESSION['account'];

$blogCtrl = new BlogController();
$catCtrl = new CategoryController();
// $catCtrl = new CategoryController();

function getPicture($fileUpload) {
	$destinationPath = implode('/', explode('\\', realpath('../'))) . '/Pictures/Blog/';

    // if ($filename = "")
    // 	$pictureFileName = $fileUpload['name'];
    // else {
    	$ext = explode('.', $fileUpload['name']);
    	$pictureFileName = md5(rand(100, 200)) . '.' . $ext[1];
    // }

    $realPath = $destinationPath . $pictureFileName;

    move_uploaded_file($fileUpload["tmp_name"], $realPath);

    $result = [];
    $result['realpath'] = './Pictures/Blog/' . $pictureFileName;
    $result['filename'] = $pictureFileName;

    return $result;
}

// function getTagIds($tags) {
// 	$tagCtrl = new TagController();
// 	$tagIds = [];

// 	foreach ($tags as $tag) {
// 		$tagId = $tagCtrl->findTagIdByTag($tag);
// 		$tagIds[]=$tagId;
// 	}

// 	return $tagIds;
// }

switch ($action) {
	//new
	case 'publishBlog':
		$picture = getPicture($_FILES["picture"])['realpath'];
		$categoryId = $_POST['category_id'];

		// Add to blogpost
		$blog = $blogCtrl->publishBlog($_POST['blog_title'],  $picture, $_POST['content'], $account->getDisplayedName(), $_POST['date'], $_POST['blog_slug']);

		$blogId = $blogCtrl->getLastId();
        //Add category to blog_category
		$category = $catCtrl->addBlogCategory($blogId, $categoryId);

		echo $blog&$category;
		// echo  $blog;
		break;

	case 'updateBlog':

		// print_r($_POST);
		// print_r($_FILES);

		// $status = $blogCtrl->getStatusOfBlog($_POST['blogId']);

		// if ($status == 'Published') {

			if ((count($_FILES) != 0) && ($_FILES["picture"]['name'])) {
				unlink(implode('/', explode('\\', realpath('../'))) . substr($_POST['prev_picture'],1));
				$picture = getPicture($_FILES["picture"])['realpath'];
			}
			else
				$picture = $_POST['prev_picture'];

			// Add to blogpost
			$blog = $blogCtrl->updateBlog($_POST['blogId'], $_POST['blog_title'], $picture, $_POST['content'], $account->getDisplayedName(), $_POST['date'], $_POST['blog_slug']);


			//Delete all previous blog_category
			$cat1 = $catCtrl->deleteAllBlogCategories($_POST['blogId']);
			//Add category to blog_category
			$cat2 = $catCtrl->addBlogCategory($_POST['blogId'], $_POST['category_id']);
			echo $blog&$cat1&$cat2;

		break;

	case 'deleteBlog':

		//Delete pictures
		$picture = $blogCtrl->getPictureFromBlog($_POST['blogId']);
		if (unlink(implode('/', explode('\\', realpath('../'))) . substr($picture, 1))) {
			// Delete blog post
			$blog = $blogCtrl->deleteBlog($_POST['blogId']);

			$cat = $catCtrl->deleteAllBlogCategories($_POST['blogId']);

			echo $blog&$cat;
		}else
			return false;



		break;

	case 'createFileURL':
		if ($_FILES['image']['name']) {
            if (!$_FILES['image']['error']) {

            	$image = getPicture($_FILES["image"]);

                echo '/Pictures/Blog/' . $image['filename'];//url of image stored in server
            }
            else
            {
              echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['image']['error'];
            }
        }
		break;

	case 'deleteCmt':
		echo $cmt = $blogCtrl->deleteCmt($_POST['cmtId']);

		break;

}

// echo $blogCtrl->getLastId();
// echo
?>
