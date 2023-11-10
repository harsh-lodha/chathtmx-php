<?php
if( ! file_exists( "chats" ) ) {
    mkdir( "chats" );
}

$chat_id = uniqid();
date_default_timezone_set("Asia/Calcutta");
$name = "Chat ".date('m/d/Y h:i:s a', time());
$chat = [
    "name" => $name,
    "id" => $chat_id,
    "messages" => [],
];

file_put_contents(
    "chats/" . $chat_id . ".json",
    json_encode( $chat )
);

echo '<button hx-get="/load_chat.php?chat_id='.$chat_id.'" hx-target="main" hx-trigger="click, load" class="chat-'.$chat_id.'">' . htmlspecialchars( $chat["name"] ) . '</button>';