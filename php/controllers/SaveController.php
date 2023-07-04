<?php

/**
 * Class SaveController
 */
class SaveController extends BaseController
{
    /**
     * controller entrypoint for url '/save'
     */
    public function save()
    {
        $text = $_POST['text'];

        // Todo: move this to middlewares when is ready also handle exception instead of redirecting
        $csrf = $_POST['csrf_token'];
        if (!CSRF::validateCSRFToken($csrf)) {
            header('Location: /');
            exit;
        }

        $text_service = new TextService();

        try {
            $text_service->add_text($text);
        } catch (Throwable $e) {
            // Todo: log exception for further investigation and generate error page
            // Todo: separate possible error cases and handle separately
        }

        $worker = new WorkerService();
        $worker->submitMessage('send_text_added_email');
        $worker->submitMessage('send_text_added_sms');

        header('Location: /');
    }
}