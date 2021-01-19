<?php

require_once 'Repository.php';
require_once __DIR__ . "/../models/Note.php";

class NotesRepository extends Repository
{
    public function addNote(Note $note)
    {
        $stmt = $this->database->connect()->prepare(
            'Insert INTO notes (user_id,title, note_type, content, last_open)
        VALUES (?,?,?,?,?)'
        );
        $stmt->execute([
            $note->getUserId(),
            $note->getTitle(),
            $note->getNoteType(),
            $note->getContent(),
            $note->getLastOpen()
        ]);
    }

    public function removeNote(int $id){
        $stmt = $this->database->connect()->prepare(
            'DELETE FROM notes WHERE id=?;
        ');
        $stmt->execute([$id]);
    }

    public function updateNote(Note $note)
    {
        $stmt = $this->database->connect()->prepare(
            'UPDATE notes SET title=?, content=?, last_open=? WHERE id=?');
        $stmt->execute([
            $note->getTitle(),
            $note->getContent(),
            $note->getLastOpen(),
            $note->getId()
            ]);
    }

    public function getNote(int $id): ?Note
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM notes WHERE id=?;
        ');
        $stmt->execute([
            $id
        ]);
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($notes as $note) {
            $result[] = new Note(
                $note['user_id'],
                $note['note_type'],
                $note['title'],
                $note['content'],
                $note['last_open'],
                $note['id']
            );
        }
        return $result[0];
    }

    public function getNotesByType(string $type, int $user_id): array
    {
        $result = [];


        $stmt = $this->database->connect()->prepare('
            SELECT * FROM notes WHERE note_type=? AND user_id=? ORDER BY title DESC ;
        ');
        $stmt->execute([
            $type,
            $user_id
        ]);
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notes as $note) {
            $result[] = new Note(
                $note['user_id'],
                $note['note_type'],
                $note['title'],
                $note['content'],
                $note['last_open'],
                $note['id']
            );
        }
        return $result;
    }

    public function getNotes(int $user_id): array
    {
        $result = [];


        $stmt = $this->database->connect()->prepare('
            SELECT * FROM notes WHERE user_id=? ORDER BY last_open DESC;
        ');
        $stmt->execute([
            $user_id
        ]);
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notes as $note) {
            $result[] = new Note(
                $note['user_id'],
                $note['note_type'],
                $note['title'],
                $note['content'],
                $note['last_open'],
                $note['id']
            );
        }
        return $result;
    }

    public function getNewNote(int $user_id): int {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM notes WHERE user_id= :userId ORDER BY id DESC 
        ');
        $stmt->bindParam(':userId',$user_id,PDO::PARAM_INT);
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($notes as $note) {
            $result[] = new Note(
                $note['user_id'],
                $note['note_type'],
                $note['title'],
                $note['content'],
                $note['last_open'],
                $note['id']
            );
        }
        $tmp = $result[0]->getId();
        setcookie("test3",$tmp,time()+86400,"/");
        return $tmp;
    }

    public function getNotesByTitle(string $searchString, int $user_id) {

        $searchString = substr($searchString,1,-1);
        $searchString = '%' . strtolower($searchString) . '%';
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM notes WHERE user_id= :userId AND LOWER(title) LIKE :string 
        ');
        $stmt->bindParam(':string',$searchString,PDO::PARAM_STR);
        $stmt->bindParam(':userId',$user_id,PDO::PARAM_INT);
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $notes;

    }
}