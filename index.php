<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          $messages = [
                                [
                                    'type' => 'text',
                                    'text' => 'ใหม่จร้า '.$text
                                ],
                                [
                                    'type' => 'text',
                                    'text' => 'จบแว่ว'
                                ]
                               
			];
          $data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
                        echo $post;
                        ?>
    </body>
</html>
