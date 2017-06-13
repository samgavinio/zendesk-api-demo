<?php

require __DIR__ . '/vendor/autoload.php';

$subdomain = "subdomain";
$username = "subdomain@example.com";
$token = "your-api-token";

$client = new Zendesk\API\HttpClient($subdomain);
$client->setAuth('basic', [
    'username' => $username,
    'token' => $token,
]);

/**
 * Create a new ticket
 */
$ticket = $client->tickets()->create([
    'subject' => 'My printer is on fire',
    'comment' => [
        'body' => 'The smoke is very colorful',
    ],
    'priority' => 'normal'
]);
echo 'Created ticket ' . $ticket->ticket->id . ' with priority: ' . $ticket->ticket->priority . PHP_EOL;

/**
 * Update the ticket
 */
$ticket = $client->tickets()->update($ticket->ticket->id,[
    'priority' => 'high'
]);
echo 'Update ticket ' . $ticket->ticket->id . ' with priority: ' . $ticket->ticket->priority . PHP_EOL;

/**
 * Delete the ticket
 */
$client->tickets()->delete($ticket->ticket->id);
echo 'Deleted ticket ' . $ticket->ticket->id . PHP_EOL;

/**
 * Let's try fetching a deleted ticket, this should return a 404 response
 */
try {
    $client->tickets()->find($ticket->ticket->id);
} catch (\Zendesk\API\Exceptions\ApiResponseException $e) {
    echo $e->getMessage() . PHP_EOL;
}
