<?php

class Post
{
    public static function getAll()
    {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM post');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($postid)
    {
        global $pdo;

        $stmt = $pdo->prepare('SELECT * FROM post WHERE PostId = :postid');
        $stmt->bindParam(':postid', $postid);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($userid, $categoryid, $posttitle, $postdes, $posttime)
    {
        global $pdo;

        $sql = "INSERT INTO post (UserId, CategoryId, PostTitle, PostDes, PostTime) VALUES (:userid, :categoryid, :posttitle, :postdes, :posttime)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':categoryid', $categoryid);
        $stmt->bindParam(':posttitle', $posttitle);
        $stmt->bindParam(':postdes', $postdes);
        $stmt->bindParam(':posttime', $posttime);

        return $stmt->execute();
    }

    public static function update($postid, $userid, $categoryid, $posttitle, $postdes, $posttime)
    {
        global $pdo;

        $sql = "UPDATE post SET UserId = :userid, CategoryId = :categoryid, PostTitle = :posttile, PostDes = :postdes, PostTime = :posttime WHERE PostId = :postid";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':postid', $postid);
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':categoryid', $categoryid);
        $stmt->bindParam(':posttitle', $posttitle);
        $stmt->bindParam(':postdes', $postdes);
        $stmt->bindParam(':posttime', $posttime);

        return $stmt->execute();
    }

    public static function delete($postid)
    {
        global $pdo;

        $stmt = $pdo->prepare('DELETE FROM post WHERE PostId = :postid');
        $stmt->bindParam(':postid', $postid, PDO::PARAM_STR);
        return $stmt->execute();
    }
}