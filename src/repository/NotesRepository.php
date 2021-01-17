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
            SELECT * FROM notes WHERE id=? GROUP BY id;
        ');
        $stmt->execute([
            $id
        ]);
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($notes as $note) {
            $result[] = new Note(
                $note['user_id'],
                $note['title'],
                $note['note_type'],
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
            SELECT * FROM notes WHERE note_type=? AND user_id=?;
        ');
        $stmt->execute([
            $type,
            $user_id
        ]);
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notes as $note) {
            $result[] = new Note(
                $note['user_id'],
                $note['title'],
                $note['note_type'],
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
            SELECT * FROM notes WHERE user_id=? ORDER BY last_open;
        ');
        $stmt->execute([
            $user_id
        ]);
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notes as $note) {
            $result[] = new Note(
                $note['user_id'],
                $note['title'],
                $note['note_type'],
                $note['content'],
                $note['last_open'],
                $note['id']
            );
        }
        return $result;
    }
}