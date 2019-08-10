<?php  
    /**
    * 
    */
    class Account 
{
  public  $id;
  public  $username;
  public  $displayedName;
  public  $password;
  public  $avatar;

  function Account($id, $username, $displayedName, $password, $avatar)  {
      $this->id = $id;
      $this->username = $username;
      $this->displayedName = $displayedName;
      $this->password = $password;
      $this->avatar = $avatar;
  }

  function setUsername($username) {
    $this->username = $username;
  }

  function getUsername() {
    return $this->username;
  }

  function setDisplayedName($displayedName) {
    $this->username = $displayedName;
  }

  function getDisplayedName() {
    return $this->displayedName;
  }

  function setPassword($password) {
    $this->password = $password;
  }

  function getPassword() {
    return $this->password;
  }

  function setAvatar($avatar) {
    $this->avatar = $avatar;
  }

  function getAvatar() {
    return $this->avatar;
  }
}
?>