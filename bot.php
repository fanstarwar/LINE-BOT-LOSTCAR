<?php
$access_token = 'd7OaMOaXTNklWdlypLrtO6vNUaBRvfs6TD+71BFkpDAwEgKyfhuBi3RIWuz5lzXX12nTbsnkHkvi9lgVn2Chxq4D3lBJ05EKskXWmkf3PFoSLRrec417XYwUKI3kr3mXQbi/agjbA/I9EqumRfepwwdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
                        /*
			$messages =[ 
                                [
                                    'type' => 'text',
                                    'text' => 'ใหม่จร้า '.$text
                                ],
                                [
                                    'type' => 'image',
                                    'originalContentUrl' => 'https://upload.wikimedia.org/wikipedia/en/1/13/Logo_of_NAM_Sixteenth_Summit.jpg',
                                    'previewImageUrl' =>'https://upload.wikimedia.org/wikipedia/en/1/13/Logo_of_NAM_Sixteenth_Summit.jpg'
                                    
                                ]
                               
			];
                        */
                        
                        $messages =[ 
                                [
                                    'type' => 'text',
                                    'text' => 'ข้อความที่ท่านส่งมา '.$text
                                ],
                                [
                                    'type' => 'text',
                                    'text' => 'ขอบคุณสำหรับการทดสอบ'
                                ]
                        ];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => $messages,
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "17.52";
?>
