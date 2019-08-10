<?php
    require_once('../Models/Account.php');
    require_once('../Models/Database.php');

    /**
    *
    */
    class AccountController
{
  private $db;

  function __construct()  {
    $this->db = new Database();
  }

  /**
  * Check login function
  * Parameter: email and password
  * Return: error string when invalid input, return Account object otherwise
  */
  function checkLogin($username, $password) {
      $sql = "SELECT username, displayedName, password FROM meranda_account WHERE username='$username'";

      $result = $this->db->executeQueryGetOne($sql);

      if (empty($result)) {
        $error = "Account does not exist.";
        return -2;
      } else {
        if ($result['password'] != $password) {
          echo $result['password'] . " >< $password <br/>";
          $error = "Password is not correct.";
          return -1;
        } else {
          $id = $result['id'];
          $username = $result['username'];
          $displayedName = $result['displayedName'];
          $password = $result['password'];
          $avatar = $result['avatar'];

          $account = new Account($id, $username, $displayedName, $password, $avatar);
          return $account;
        }
      }
  }

  function getById($id){
      $sql = "SELECT * FROM `meranda_account` WHERE `id` = ".$id;
      $result = $this->db->executeQueryGetOne($sql);
      if (empty($result)) {
        print("No account found!");
      } else {
        $id = $result['id'];
        $username = $result['username'];
        $password = $result['password'];
        $avatar = $result['avatar'];

        $account = new Account($id, $username, $password, $avatar);
        return $account;
      }
    }
}

?>
