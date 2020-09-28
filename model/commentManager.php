<?php

require_once("model/manager.php");


class CommentManager extends Manager
{
    public function getComments($post_id) {
        $sql = 'SELECT id, post_id, author, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, report FROM comments WHERE post_id = ? ORDER BY id DESC';
        $Comments = $this->executerRequete($sql, array($post_id));
        return $Comments; 
    }

    public function getComment($comment_id) {
        $sql = 'SELECT id, post_id, author, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM comments WHERE id = ?';
        $comment = $this->executerRequete($sql, array($comment_id));
        return $comment->fetch(); 
    }

    public function addComment($post_id, $newComment, $author){
        $sql = 'INSERT INTO comments(post_id, author, content, date_creation) VALUES(?, ?, ?, NOW())';
        $addComment = $this->executerRequete($sql, array($post_id, $author, $newComment));
    }

    public function editComment($comment_id, $editComment){
        $sql = 'UPDATE comments SET content = ?, date_creation = NOW() WHERE id = ?';
        $editComment = $this->executerRequete($sql, array($editComment, $comment_id));
    }

    public function deleteComment($comment_id){
        $sql = 'DELETE FROM comments WHERE id = ?';
        $deleteComment = $this->executerRequete($sql, array($comment_id));
    }

    public function deletePostComment($post_id){
        $sql = 'DELETE FROM comments WHERE post_id = ?';
        $deletePostComment = $this->executerRequete($sql, array($post_id));
    }

    public function reportComment($comment_id, $report){
        $sql = 'UPDATE comments SET report = ? WHERE id = ?';
        $reportComment = $this->executerRequete($sql, array($report, $comment_id));
    }

    public function getReportComment(){
        $sql = 'SELECT id, content,report, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM comments WHERE report > 0 ORDER BY report DESC';
        $getReportComment = $this->executerRequete($sql);
        return $getReportComment;
    }

    public function restoreReport($comment_id){
        $sql = 'UPDATE comments SET report = 0, date_creation = NOW() WHERE id = ?';
        $reportComment = $this->executerRequete($sql, array($comment_id));
    }

}