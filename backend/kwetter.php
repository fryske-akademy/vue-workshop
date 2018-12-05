<?php

// Where to store messages
define("MESSAGES_FILE", "kwetter_messages/messages.json");

$messages = [];
if (file_exists(MESSAGES_FILE))
    $messages = json_decode(file_get_contents(MESSAGES_FILE));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Post a new message
    $message = [
        "message" => $_POST['message'],
        "user" => $_POST['user'],
        "time" => $_POST['time']
    ];
    array_push($messages, $message);

    // Write the new messages file
    file_put_contents(MESSAGES_FILE, json_encode($messages, JSON_PRETTY_PRINT));

}

// Return the messages so far
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
print json_encode($messages);

?>