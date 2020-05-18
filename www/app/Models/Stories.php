<?php

/**
 * Model
 *
 * Stories Model
 */
class Stories
{
    private $dbm;
    public function __construct()
    {
        $this->dbm = new Database;
    }
    // Get all the stories with writer's names
    public function getStories()
    {
        $this->dbm->query('SELECT CONCAT(userFNAME, " ", userLNAME) AS userName, storyId AS storyId, idUser AS Writer, Name, Description, Content, imageName, Date 
                            FROM stories INNER JOIN users 
                            ON stories.Writer=users.idUser');
        if ($this->dbm->execute()) {
            return $this->dbm->resultSet();
        }
        return false;
    }
    // Insert stories
    public function addStories($addData)
    {
        $this->dbm->query('INSERT INTO stories (Writer, storyId, Name, Description, Content, imageName, Date) VALUES (:writer, :storyid, :name, :description, :content, :imagename, :date)');
        $this->dbm->bind(':writer', $addData['writer']);
        $this->dbm->bind(':storyid', rand(1, 100000));
        $this->dbm->bind(':name', $addData['name']);
        $this->dbm->bind(':description', $addData['description']);
        $this->dbm->bind(':content', $addData['content']);
        $this->dbm->bind(':imagename', $addData['imageName']);
        $this->dbm->bind(':date', $addData['date']);
        if ($this->dbm->execute()) {
            return true;
        }
        return false;
    }
    // Deletes user's story
    public function deleteStory($ID)
    {
        $this->dbm->query('DELETE FROM stories WHERE Writer=:userId AND storyId=:id');
        $this->dbm->bind(':userId', $_SESSION['user_id']);
        $this->dbm->bind(':id', $ID);
        if ($this->dbm->execute()) {
            return true;
        }
        return false;
    }
}
