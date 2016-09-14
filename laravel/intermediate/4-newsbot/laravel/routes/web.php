<?php

use pimax\FbBotApp;
use pimax\Messages\Message;
use pimax\Messages\ImageMessage;
use pimax\UserProfile;
use pimax\Messages\MessageButton;
use pimax\Messages\StructuredMessage;
use pimax\Messages\MessageElement;
use pimax\Messages\MessageReceiptElement;
use pimax\Messages\Address;
use pimax\Messages\Summary;
use pimax\Messages\Adjustment;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
	dd(\App\Post::searched('mnb'));
});

Route::any('/hook', function () {
	Log::info('started');
	$verify_token = "DEVELOPER_SPECIFIED_TOKEN";
	$token = "TOKEN_FROM_APP_AUTH";
	$bot = new FbBotApp($token);
	if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' && $_REQUEST['hub_verify_token'] == $verify_token) {
		return $_REQUEST['hub_challenge'];
	} else {
		$data = json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
	    if (!empty($data['entry'][0]['messaging'])) {
	        foreach ($data['entry'][0]['messaging'] as $message) {
	            // Skipping delivery messages
	            if (!empty($message['delivery'])) {
	                continue;
	            }

	            $command = "";
	            // When bot receive message from user
	            if (!empty($message['message']['text'])) {
	                $command = $message['message']['text'];
	            // When bot receive button click from user
	            } else if (!empty($message['postback']['payload'])) {
	                $command = $message['postback']['payload'];
	            }

	            $command = mb_strtolower($command);

	            $commandWords = [
	            	'posts_latest' => ['shine medee', 'medee', 'shine', 'шинэ мэдээ', 'шинэ', 'мэдээ', 'posts_latest'],
	            	'posts_featured' => ['ontsloh medee', 'ontsloh', 'онцлох мэдээ', 'онцлох', 'posts_featured'],
	            	'hi' => ['snu', 'hello', 'sain uu', 'сайн уу', 'hi'],
	            	'help' => ['help', 'тусламж', 'tuslamj'],
	            	'menu' => ['menu', 'цэс'],
	            ];

	            $isMessageSent = false;

	            foreach ($commandWords as $key => $value) {
					$shortest = -1;
					$closest = null;

			    	foreach ($value as $word) {
			    		$lev = levenshtein($command, $word);
			    		if ($lev == 0) {
			    			$closest = $word;
			    			$shortest = 0;
			    			break;
			    		}

			    		if ($lev <= $shortest || $shortest < 0) {
			    			$closest  = $word;
					        $shortest = $lev;
					    }
					}

					if ($shortest >= 0 && $shortest <= 1) {
						if ($key == 'posts_latest') {
							$elements = [];
			            	foreach (\App\Post::latest() as $key => $value) {
			            		$elements[] =  new MessageElement($value->title, $value->host, $value->image, [
			            			new MessageButton(MessageButton::TYPE_WEB, 'дэлгэрэнгүй', $value->url)
			            		]);
			            	}
			            	$bot->send(new StructuredMessage($message['sender']['id'], StructuredMessage::TYPE_GENERIC, [ 'elements' => $elements ]));
			            	$isMessageSent = true;
						} else if ($key == 'posts_featured') {
							$elements = [];
			            	foreach (\App\Post::featured() as $key => $value) {
			            		$elements[] =  new MessageElement($value->title, $value->host, $value->image, [
			            			new MessageButton(MessageButton::TYPE_WEB, 'дэлгэрэнгүй', $value->url)
			            		]);
			            	}
			            	$bot->send(new StructuredMessage($message['sender']['id'], StructuredMessage::TYPE_GENERIC, [ 'elements' => $elements ]));
			            	$isMessageSent = true;
						} else if ($key == 'hi') {
							$options = [
								'shine medee',
								'medee',
								'shine',
								'шинэ мэдээ',
								'шинэ',
								'мэдээ',
								'ontsloh medee',
								'ontsloh',
								'онцлох мэдээ',
								'онцлох',
								'help',
								'тусламж',
								'tuslamj',
								'menu',
								'цэс',
							];
							$bot->send(new Message($message['sender']['id'], 'Сайн байна уу, та ямар төрлийн мэдээ мэдээлэл уншхийг хүсч байна? "'.$options[rand(0, count($options)-1)].'" гэж бичээд үзээрэй ;)'));
			            	$isMessageSent = true;
						} else if ($key == 'help') {
							$bot->send(new Message($message['sender']['id'], 'Та шинэ мэдээ хүлээн авахын тулд "шинэ", онцлох мэдээ хүлээн авахын тулд "онцлох" гэж бичнэ. Хэрвээ хайлт хийхийг хүсвэл түлхүүр үгээ оруулан мэдээлэл хүлээн авах боломжтой'));
			            	$isMessageSent = true;
						} else if ($key == 'menu') {
							$bot->send(new Message($message['sender']['id'], 'Цэсний сонголт зүүн доод хэсэгт идэвхижсэн байгаа :)'));
			            	$isMessageSent = true;
						}
					}
				}

				if (!$isMessageSent) {
					$elements = [];
					foreach (\App\Post::searched($command) as $key => $value) {
						$elements[] =  new MessageElement($value->title, $value->host, $value->image, [
							new MessageButton(MessageButton::TYPE_WEB, 'дэлгэрэнгүй', $value->url)
						]);
					}

					if (count($elements) > 0) {
						$bot->send(new Message($message['sender']['id'], '"'.$command.'" хайлтын үр дүн:'));
						$bot->send(new StructuredMessage($message['sender']['id'], StructuredMessage::TYPE_GENERIC, [ 'elements' => $elements ]));
					} else {
						$bot->send(new Message($message['sender']['id'], '"'.$command.'" мэдээ мэдээлэл олдсонгүй :('));
					}
				}
	        }
	    }
	}
});
