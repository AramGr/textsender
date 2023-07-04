<?php

class IndexController extends BaseController
{

    /**
     * controller entrypoint for url '/'
     */
    public function index()
    {
        $text_service = new TextService();

        $last_inserted_text = $text_service->get_last_inserted_text();

        $this->data['last_inserted_text'] = ($last_inserted_text['text'] ?? '');

        $this->render('main');
    }
}