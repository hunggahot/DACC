<?php

class Image
{
    public static function getAll()
    {
        global $pdo;

        $stmt = $pdo->query('SELECT * FROM image');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($imageid)
    {
        global $pdo;

        $stmt = $pdo->prepare('SELECT * FROM image WHERE ImageId = :imageid');
        $stmt->bindParam(':imageid', $imageid);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($postid, $imagepath)
    {
        global $pdo;

        $sql = "INSERT INTO image (PostId, ImagePath) VALUES (:postid, :imagepath)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':postid', $postid);
        $stmt->bindParam(':imagepath', $imagepath);

        return $stmt->execute();
    }

    public static function update($imageid, $postid, $imagepath)
    {
        global $pdo;

        $sql = "UPDATE category SET PostId = :postid, ImagePath = :imagepath WHERE ImageId = :imageid";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':imageid', $imageid);
        $stmt->bindParam(':postid', $postid);
        $stmt->bindParam(':imagepath', $imagepath);

        return $stmt->execute();
    }

    public static function delete($imageid)
    {
        global $pdo;

        $stmt = $pdo->prepare('DELETE FROM image WHERE ImageId = :imageid');
        $stmt->bindParam(':imageid', $imageid, PDO::PARAM_STR);

        return $stmt->execute();

    }
}