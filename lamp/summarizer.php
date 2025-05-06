<?php 
	function respond( $data = array(), $code = 200 ) {
		
		if ( ! is_array( $data ) ) {
			$data = array( 'message' => $data );
		}

		http_response_code( $code );
		header('Content-Type: application/json');

		echo json_encode( array_merge( $data, array( 'success' => $code === 200 ) ) );

		exit;
	}

	if ( empty( $_POST['text_content'] ) ) {
		respond( 'Empty content can not be summarized!' );
	}

	$config = include __DIR__ . '/env.php';
	$apiKey = $config['ChatGPT_KEY'];

		
	$apiUrl = 'https://api.openai.com/v1/chat/completions';

	$systemPrompt = "You are a professional content summarizer, always return summary output in detailed html format, not simple texts or markdown format. Analyze the given content and return a summary in basic html format must, without enclosing with any wrapper. Show main points as per the content type. Such as if it is a job post, the key points will be Salary, Location, Deadline, Requirements, Company, Summary etc. Do not use h1-h6 tags.";

	$userPrompt = "Here are the texts:" . PHP_EOL . $_POST['text_content'];
	$data = [
		'model' => 'gpt-3.5-turbo-0125',
		'messages' => [
			['role' => 'system', 'content' => $systemPrompt],
			['role' => 'user', 'content' => $userPrompt]
		],
		'temperature' => 0.5,
		'max_tokens' => 300
	];

	$headers = [
		'Content-Type: application/json',
		'Authorization: ' . "Bearer $apiKey"
	];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $apiUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$response = curl_exec($ch);

	if ( curl_errno( $ch ) ) {
		respond( curl_error( $ch ), 503 );
	}
	
	$result = json_decode($response, true);
	$output = $result['choices'][0]['message']['content'] ?? 'Parsing error!';

	respond( array( 'summary_html' => $output ) );
?>