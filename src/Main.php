<?php

include_once "../autoloader.php";

if (isset($_POST['post-form'])) {
    $commentData = $_POST['comment'];
    if (!empty($commentData)) {
        $comment = new Comment(null, $commentData);
        $result = $comment->save();
        echo $result;
        if ($result) {
            header("Location: ../");
        } else {
            header("Location: ../?e=fatal error");
        }
    } else {
        header("Location: ../?e=comment tidak boleh kosong");
    }
}

if (isset($_POST['form-comment'])) {
    $comment = $_POST['comment'];
    $id = $_POST['form-comment'];
    if (!empty($id) && !empty($comment)) {
        $oldComment = Comment::getComment($id);

        $oldComment->setCommentData($comment);
        $result = $oldComment->save();

        if ($result) {
            header("Location: ../");
        } else {
            header("Location: ../?e=fatal error");
        }
    } else {
        header("Location: ../?e=comment tidak boleh kosong");
    }
}

if (isset($_POST['comment-id'])) {
    $id = $_POST['comment-id'];
    if (!empty($id)) {
        $comment = Comment::getComment($id);
        $result = $comment->delete();

        if ($result) {
            header("Location: ../");
        } else {
            header("Location: ../?e=database error");
        }
    } else {
        header("Location: ../?e=fatal error");
    }
}