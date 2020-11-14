<?php

include_once "../autoloader.php";

class Comment {
    private $id;
    private $commentData;
    private $db;

    public static function getComment($id) {
        $db = new Database();
        $conn = $db->connect();

        $query = "SELECT * FROM comments WHERE id=".$id;
        $results = $conn->query($query);
        $comment = $results->fetch_assoc();
        $conn->close();
        
        $commentObj = new Comment($comment['id'], $comment['comment']);
        return $commentObj;
    }

    public function __construct($id, $commentData) {
        $this->id = $id;
        $this->commentData = $commentData;
        $this->db = new Database();
    }

    public function save() {
        if ($this->id == null) {
            return $this->insertComment();
        } else {
            return $this->updateComment();
        }
    }

    public function setCommentData($commentData) {
        $this->commentData = $commentData;
    }

    public function delete() {
        $conn = $this->db->connect();
        $query = "DELETE FROM comments WHERE id=".$this->id;
        $result = $conn->query($query);
        $conn->close();
        
        return $result;
    }

    private function insertComment() {
        $conn = $this->db->connect();
        $query = "INSERT INTO comments (comment) VALUES (\"".$this->commentData."\")";
        $result = $conn->query($query);
        $conn->close();
        
        return $result;
    }

    

    private function updateComment() {
        $conn = $this->db->connect();
        $query = 'UPDATE comments SET comment="'.$this->commentData.'" WHERE id='.$this->id;
        $result = $conn->query($query);
        $conn->close();

        return $result;
    }
}