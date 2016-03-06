<?php

class CommentModel
{
    public static function create($pdo, $id, $username, $comment, $timestamp)
    {
        $q = $pdo->prepare('
            INSERT INTO comments
            SET article_id = :id,
            author = :username,
            content = :comment,
            edited_content = :comment,
            timestamp = :timestamp,
            edit_timestamp = :timestamp
            ');
        $q->bindParam(':id', $id);
        $q->bindParam(':username', $username);
        $q->bindParam(':comment', $comment);
        $q->bindParam(':timestamp', $timestamp);
        $q->execute();
    }

    public static function edit($pdo, $id, $content, $timestamp)
    {
        $q = $pdo->prepare('
            UPDATE comments
            SET content = :content,
            timestamp = :timestamp
            WHERE id = :id
        ');
        $q->bindParam(':id', $id);
        $q->bindParam(':content', $content);
        $q->bindParam(':timestamp', $timestamp);
        $q->execute();
    }

    public static function showComments($pdo, $article_id)
    {
        $q = $pdo->prepare('
            SELECT *
            FROM comments
            WHERE article_id = :article_id
            ORDER BY id DESC
            ');
        $q->bindParam(':article_id', $article_id);
        $q->execute();

        $comments = [];
        while ($results = $q->fetch()) {
            array_push($comments, $results);
        }

        return $comments;
    }

    public static function showAllComments($pdo)
    {
        $q = $pdo->prepare('
            SELECT *
            FROM comments
            ORDER BY id DESC
            ');
        $q->execute();

        $comments = [];
        while ($results = $q->fetch()) {
            array_push($comments, $results);
        }

        return $comments;
    }

    public static function noComment($pdo, $article_id)
    {
        if ($article_id == '') {
            return true;
        }

        $q = $pdo->prepare('
            SELECT article_id
            FROM comments
            WHERE article_id = :article_id
            ');
        $q->bindParam(':article_id', $article_id);
        $q->execute();

        $result = $q->fetch();

        if ($result['article_id'] == $article_id) {
            return false;
        } else {
            return true;
        }
    }

    public static function getAuthor($pdo, $id)
    {
        $q = $pdo->prepare('
            SELECT author
            FROM comments
            WHERE id = :id
            ');
        $q->bindParam(':id', $id);
        $q->execute();

        $result = $q->fetch();
        return $result['author'];
    }

    public static function getContent($pdo, $id)
    {
        $q = $pdo->prepare('
            SELECT content
            FROM comments
            WHERE id = :id
            ');
        $q->bindParam(':id', $id);
        $q->execute();

        $result = $q->fetch();
        return $result['content'];
    }

    public static function exists($pdo, $id)
    {
        if ($id == '') {
            return false;
        }

        $q = $pdo->prepare('
            SELECT id
            FROM comments
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

    public static function delete($pdo, $id)
    {
        $q = $pdo->prepare('DELETE from comments WHERE id = :id');
        $q->bindParam(':id', $id);
        $q->execute();
    }
}