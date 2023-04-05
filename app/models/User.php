<?php

class User{

    public static function create($fullname, $username, $email, $password){
        global $pdo;

        $sql = "INSERT INTO user (FullName, UserName, Email, Password) VALUES (:fullname, :username, :email, :password)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        return $stmt->execute();
    }

    public static function find($username)
    {
      global $pdo;
  
      $stmt = $pdo->prepare('SELECT * FROM user WHERE UserName = :username');
      $stmt->bindParam(':username', $username);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function editAvatar($userId, $avatar)
    {
      global $pdo;
  
      $sql = "UPDATE user SET Avatar=:a where Id=:i";
      $stmt = $pdo->prepare($sql);
  
  
      $stmt->bindParam(':a', $avatar);
      $stmt->bindParam(':i', $userId);
  
      return $stmt->execute();
    }
}