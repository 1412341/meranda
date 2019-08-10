<meta charset="utf-8"/>
<?php

require_once('../Controllers/AccountController.php');
require_once('../Models/Account.php');
session_start();

$action = $_REQUEST['action'];

$accountCtrl = new AccountController();

switch ($action) {
  case 'Login':
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $account = $accountCtrl->checkLogin($username, $password);

        if ($account == -1) {
          $_SESSION['error'] = 'Your email/password are invalid.';
        } else if ($account == -2) {
          $_SESSION['error'] = 'Your account does not exist.';
        } else{
            $_SESSION['account'] = $account;

        }
        header('Location: ../');

        break;

  case 'Logout':
        session_start();
        session_unset();
        session_destroy(oid);

        // header("Location: ../");
        break;
  default:
    echo "failed";
    break;
}


?>
