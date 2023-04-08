<?php

class Comment
{
    public static function getAll()
    {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM comment');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($commentid)
    {
        global $pdo;

        $stmt = $pdo->prepare('SELECT * FROM comment WHERE CommentId = :commentid');
        $stmt->bindParam(':commentid', $commentid);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($userid, $postid, $comment, $datetime)
    {
        global $pdo;

        $sql = "INSERT INTO comment (UserId, PostId, Comment, DateTime) VALUES (:userid, :postid, :comment, :datetime)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':postid', $postid);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':datetime', $datetime);

        return $stmt->execute();
    }

    public static function delete($commentid)
    {
        global $pdo;

        $stmt = $pdo->prepare('DELETE FROM comment WHERE CommentId = :commentid');
        $stmt->bindParam(':commentid', $commentid, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public static function update($commentid, $userid, $postid, $comment, $datetime)
    {
        global $pdo;

        $sql = "UPDATE comment SET UserId = :userid, PostId = :postid, Comment = :comment  WHERE CommentId = :commentid";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':commentid', $commentid);
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':postid', $postid);
        $stmt->bindParam(':comment', $comment);

        return $stmt->execute();
    }
}