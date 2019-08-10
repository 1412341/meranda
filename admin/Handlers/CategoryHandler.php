<?php

require_once('../Controllers/CategoryController.php');
// require_once('../Controllers/CategoryController.php');
require_once('../Models/Account.php');
session_start();

$action = $_POST['action'];
$account = $_SESSION['account'];

$catCtrl = new CategoryController();
// $catCtrl = new CategoryController();

function getPicture($fileUpload) {
	$destinationPath = implode('/', explode('\\', realpath('../'))) . '/Pictures/Category/';

    // if ($filename = "")
    // 	$pictureFileName = $fileUpload['name'];
    // else {
    	$ext = explode('.', $fileUpload['name']);
    	$pictureFileName = md5(rand(100, 200)) . '.' . $ext[1];
    // }

    $realPath = $destinationPath . $pictureFileName;

    move_uploaded_file($fileUpload["tmp_name"], $realPath);

    $result = [];
    $result['realpath'] = './Pictures/Category/' . $pictureFileName;
    $result['filename'] = $pictureFileName;

    return $result;
}

switch ($action) {
	//new
	case 'publishCategory':
		// print_r($_POST);

		$picture = getPicture($_FILES["picture"])['realpath'];

		// Add to blogpost
		$category = $catCtrl->publishCategory($_POST['category_title'], $picture, $_POST['category_slug']);

		echo $category;
		// echo  $blog;
		break;

	case 'updateCategory':

		// print_r($_POST);
		// print_r($_FILES);

		// $status = $catCtrl->getStatusOfBlog($_POST['blogId']);

		// if ($status == 'Published') {

			if ((count($_FILES) != 0) && ($_FILES["picture"]['name'])) {
				unlink(implode('/', explode('\\', realpath('../'))) . substr($_POST['prev_picture'],1));
				$picture = getPicture($_FILES["picture"])['realpath'];
			}
			else
				$picture = $_POST['prev_picture'];
			// Add to blogpost
			$category = $catCtrl->updateCategory($_POST['categoryId'], $_POST['category_title'], $picture, $_POST['category_slug']);

			echo $category;
		// }else {
			// $catCtrl->
		// }
		break;

	case 'deleteCategory':

		//Delete pictures
		$picture = $catCtrl->getPictureFromCategory($_POST['categoryId']);
		if (unlink(implode('/', explode('\\', realpath('../'))) . substr($picture, 1))) {
			// Delete blog post
			$category = $catCtrl->deleteCategory($_POST['categoryId']);

			// $cat = $catCtrl->deleteAllBlogCategories($_POST['blogId']);

			echo $category;
		}else
			return false;



		break;

}

// echo $catCtrl->getLastId();
// echo
?>
