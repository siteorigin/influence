<?php

function influence_get_video(){
	global $influence_videos;
	$post_id = get_the_ID();

	if( empty( $influence_videos[$post_id] ) ) $influence_videos = array();

	if( isset($influence_videos[$post_id]) ) return $influence_videos[$post_id];

	$content = get_the_content();
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$content = trim($content);

	// Is the first line a video?
	list($line, $content) = explode("\n", $content, 2);

	if ( preg_match('/\<\s*(iframe|object|embed)/i', $line) ) {
		$influence_videos[$post_id] = strip_tags($line, '<iframe><object><embed>');
	}
	else {
		$influence_videos[$post_id] = false;
	}

	return $influence_videos[$post_id];
}

function influence_filter_video($content){
	list($line, $rest) = explode("\n", $content, 2);
	if ( preg_match('/\<\s*(iframe|object|embed)/i', $line) ) {
		return $rest;
	}
	else{
		return $content;
	}
}