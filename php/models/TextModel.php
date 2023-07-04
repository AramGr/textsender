<?php

/**
 * Class TextModel
 */
class TextModel extends BaseModel
{
    /**
     * Adds text to database table
     *
     * @param array $data
     * @throws Exception
     */
    public function addText(array $data): void
    {
        $statement = self::$connection->prepare("INSERT INTO texts (text, session_id)
            VALUES (?, ?)");
        $statement->bind_param('ss', $text, $session_id);

        $text = $data['text'];
        $session_id = $data['session_id'];

        if ($statement->execute() !== true) {
            // Todo: implement error handling, separate error types
            throw new Exception('Failed to insert data');
        }
    }

    public function getLastTextBySession()
    {
        $statement = self::$connection->prepare('SELECT * FROM texts WHERE session_id = ? ORDER BY id DESC');
        $statement->bind_param('s',  $session_id);
        $session_id = session_id();
        $statement->execute();

        return $statement->get_result()->fetch_assoc();
    }
}