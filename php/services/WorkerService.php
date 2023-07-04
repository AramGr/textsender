<?php

/**
 * Todo: expand service and load them with ServiceFactory, all services must implement from Service interface
 * Todo: implement RabbitMQ to add messages and process with queue handler. Create queue handler.
 *
 * Class WorkerService
 */
class WorkerService
{
    private $valid_actions = [
        'send_text_added_email',
        'send_text_added_sms',
    ];

    /**
     * submits a message to RabbitMQ that will be handled later asynchronously
     *
     * @param string $action
     */
    public function submitMessage(string $action): void
    {
        // Todo: validate if action exist
        // Todo: submit message to RabbitMQ
    }

    /**
     * Queue worker will call this method
     *
     * @param array $parameters
     */
    public function sendTextAddedEmail(array $parameters): void
    {
        try {
            // Todo: validate parameters and pass separately
            Email::send(...$parameters);
        } catch (Exception $e) {
            // Todo: log exception
        }

    }

    /**
     * Queue worker will call this method
     *
     * @param array $parameters
     */
    public function sendTextAddedSms(array $parameters): void
    {
        try {
            // Todo: validate parameters and pass separately
            Sms::send(...$parameters);
        } catch (Exception $e) {
            // Todo: log exception
        }
    }

}