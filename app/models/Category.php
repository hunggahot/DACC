<?php

class Category{

    public static function getAll(){
        global $pdo;

        $stmt = $pdo->query('SELECT * FROM category');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($categoryid){
        global $pdo;

        $stmt = $pdo->prepare('SELECT * FROM category WHERE CategoryId = :categoryid');
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function create($categoryname, $categorydes){
        global $pdo;

        $sql = "INSERT INTO category (CategoryName, CategoryDes) VALUES (:categoryname, :categorydes)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':categoryname', $categoryname);
        $stmt->bindParam(':categorydes', $categorydes);

        return $stmt->execute();
    }

    public static function update($categoryid, $categoryname, $categorydes) {
        global $pdo;
        
        $sql = "UPDATE category SET CategoryName = :categoryname, CategoryDes = :categorydes WHERE CategoryId = :categoryid";
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindParam(':categoryid', $categoryid);
        $stmt->bindParam(':categoryname', $categoryname);
        $stmt->bindParam(':categorydes', $categorydes);
    
        return $stmt->execute();
      }

      public static function delete($categoryid) {
        global $pdo;

        $stmt = $pdo->prepare('DELETE FROM category WHERE CategoryId = :categoryid');
        $stmt->bindParam(':categoryid', $categoryid, PDO::PARAM_STR);

        return $stmt->execute();
      }
}