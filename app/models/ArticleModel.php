<?php

class ArticleModel
{
    public static function getContent($pdo, $title)
    {
        $q = $pdo->prepare('
            SELECT content
            FROM articles
            WHERE title = :title
            ');
        $q->bindParam(':title', $title);
        $q->execute();
        $result = $q->fetch();

        return $result['content'];
    }

    public static function getDate($pdo, $title)
    {
        $q = $pdo->prepare('
            SELECT timestamp
            FROM articles
            WHERE title = :title
            ');
        $q->bindParam(':title', $title);
        $q->execute();
        $result = $q->fetch();

        return date('d/m/Y', $result['timestamp']);
    }

    public static function getAuthor($pdo, $title)
    {
        $q = $pdo->prepare('
            SELECT author
            FROM articles
            WHERE title = :title
            ');
        $q->bindParam(':title', $title);
        $q->execute();
        $result = $q->fetch();

        return $result['author'];
    }
}