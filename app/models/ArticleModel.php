<?php

class ArticleModel
{
    public static function getTitle($pdo, $id)
    {
        $q = $pdo->prepare('
            SELECT title
            FROM articles
            WHERE id = :id
            ');
        $q->bindParam(':id', $id);
        $q->execute();
        $result = $q->fetch();

        return $result['title'];
    }

    public static function getContent($pdo, $id)
    {
        $q = $pdo->prepare('
            SELECT content
            FROM articles
            WHERE id = :id
            ');
        $q->bindParam(':id', $id);
        $q->execute();
        $result = $q->fetch();

        return $result['content'];
    }

    public static function getDate($pdo, $id)
    {
        $q = $pdo->prepare('
            SELECT timestamp
            FROM articles
            WHERE id = :id
            ');
        $q->bindParam(':id', $id);
        $q->execute();
        $result = $q->fetch();

        return date('d/m/Y', $result['timestamp']);
    }

    public static function getAuthor($pdo, $id)
    {
        $q = $pdo->prepare('
            SELECT author
            FROM articles
            WHERE id = :id
            ');
        $q->bindParam(':id', $id);
        $q->execute();
        $result = $q->fetch();

        return $result['author'];
    }

    public static function create($pdo, $title, $content, $author)
    {
        // Check if this article already exists
        $q = $pdo->prepare('
            SELECT title
            FROM articles
            WHERE title = :title
            ');
        $q->bindParam(':title', $title);
        $q->execute();

        $result = $q->fetch();

        if ($result['title'] == $title) {
            return '<span class="errors">Un article porte déjà ce nom.</span>';
        }

        $q->closeCursor();

        // If it doesn't exist
        $timestamp = time();

        $q = $pdo->prepare('
            INSERT INTO articles
            SET title = :title,
            author = :author,
            content = :content,
            timestamp = :timestamp,
            last_edit_date = :timestamp,
            last_edit_author = :author
            ');
        $q->bindParam(':title', $title);
        $q->bindParam(':author', $author);
        $q->bindParam(':content', $content);
        $q->bindParam(':timestamp', $timestamp);
        $q->execute();

        $q->closeCursor();
    }

    public static function edit($pdo, $id, $title, $content, $author)
    {
        $q = $pdo->prepare('
            UPDATE articles
            SET title = :title,
            content = :content,
            last_edit_date = :date,
            last_edit_author = :author
            WHERE id = :id
            ');
        $q->bindParam(':id', $id);
        $q->bindParam(':title', $title);
        $q->bindParam(':author', $author);
        $q->bindParam(':content', $content);
        $q->bindParam(':date', $timestamp);
        $q->execute();
    }

    public static function ShowLastArticles($pdo)
    {
        $q = $pdo->prepare('
            SELECT *
            FROM articles
            ORDER BY id DESC
            ');
        $q->execute();

        $articles = [];
        while ($results = $q->fetch())
        {
            array_push($articles, $results);
        }

        return $articles;
    }

    public static function exists($pdo, $id)
    {
        if ($id == '') {
            return false;
        }

        $q = $pdo->prepare('
            SELECT id
            FROM articles
            WHERE id = :id
            ');
        $q->bindParam(':id', $id);
        $q->execute();

        $result = $q->fetch();

        if ($result['id'] == $id) {
            return true;
        } else {
            return false;
        }
    }
}