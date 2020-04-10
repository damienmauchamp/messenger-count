<?php

/**
 * Only execute if your .json file is divided in multiple parts.
 * This will merge them all in one file
 */

$files = [];
foreach(glob('message_*.json') as $file) {
	if (preg_match('/.*_(\d)\.json$/', $file)) {
		$file = preg_replace('/(.*)_(\d)(\.json)$/', '$1_0$2$3', $file);
	}
	$files[] = $file;
}
sort($files);

$data = [
	'participants' => [],
	'messages' => [],
	'title' => [],
	'is_still_participant' => [],
	'thread_type' => [],
	'thread_path' => [],
];

$messages = [];
foreach ($files as $i => $file) {
	$file_name = preg_replace('/(_)0(\d)/', '$1$2', $file);
	$content = json_decode(file_get_contents(__DIR__ . "/{$file_name}"), true);

	if ($i === 0) {
		$data['participants'] = $content['participants'];
		$data['title'] = $content['title'];
		$data['is_still_participant'] = $content['is_still_participant'];
		$data['thread_type'] = $content['thread_type'];
		$data['thread_path'] = $content['thread_path'];

		$messages = $content['messages'];
	}

	$messages = array_merge($messages, $content['messages']);
}
$data['messages'] = $messages;

file_put_contents(__DIR__ . '/message.json', json_encode($data));

// print_r($files);