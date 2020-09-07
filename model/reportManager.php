<?php
require_once("model/manager.php");


class ReportManager extends Manager
{
    public function reportComment($comment_id, $reportReason, $report_author)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO reportComment(comment_id, report_author, report_reason, date_reporting) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($comment_id, $report_author, $reportReason));
        return $affectedLines;
    }
}