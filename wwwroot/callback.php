<?php // callback.php
define("LINE_MESSAGING_API_CHANNEL_SECRET", '7f0058cce2e68b02d58d9f909f2c27da');
define("LINE_MESSAGING_API_CHANNEL_TOKEN", 'HQovaDzjjVf69u+Tea0aLHw481ctpJmHmibhotCwwizg47ly57r8gjcTPQpDETHLAVta/Uy1DZezHAQQgrjBFr17e1fjhmwiffD1lUhFmTfRFYo/6P8NAQOeBfBulttd9e8W0LtQir8HKYgEPEFvkQdB04t89/1O/w1cDnyilFU=');

require __DIR__."/../vendor/autoload.php";

$bot = new \LINE\LINEBot(
    new \LINE\LINEBot\HTTPClient\CurlHTTPClient(LINE_MESSAGING_API_CHANNEL_TOKEN),
    ['channelSecret' => LINE_MESSAGING_API_CHANNEL_SECRET]
);

$signature = $_SERVER["HTTP_".\LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$body = file_get_contents("php://input");

$events = $bot->parseEventRequest($body, $signature);

foreach ($events as $event) {
    if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {
        $reply_token = $event->getReplyToken();
        $text = $event->getText();
        $bot->replyText($reply_token, $text." great ok");
    }
}

echo "OK";