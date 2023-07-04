<?php

/**
 * Todo: expand service and load them with ServiceFactory, all services must implement from Service interface
 *
 * Class TextService
 */
class TextService
{
    /**
     * @param string $text
     * @throws Exception
     */
    public function add_text(string $text)
    {
        TextModel::create()->addText(['text' => $text, 'session_id' => session_id()]);
    }

    public function get_last_inserted_text()
    {
        return TextModel::create()->getLastTextBySession();
    }

}