<?php
require("text_generation.php");

$chat = json_decode(
    file_get_contents( "chats/" . basename( $_GET['chat-id'] ) . ".json" ),
    true,
);

$message = end( $chat["messages"] )["content"];
$response = generateTextFromFlaskAPI( $message );

$chat['messages'][] = [
    "role" => "assistant",
    "content" => $response,
];

file_put_contents(
    "chats/". basename( $_GET['chat-id']). ".json",
    json_encode($chat),
);

//print out the response of AI
echo '<div class="assistant message" hx-get="/create_title.php?chat_id='
.nl2br(htmlspecialchars($_GET['chat-id'])).'"hx-target=".chat-'
.htmlspecialchars($_GET['chat-id']).'">'.nl2br(htmlspecialchars( $response)).'</div';