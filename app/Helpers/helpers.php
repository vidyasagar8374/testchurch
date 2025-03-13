<?php
    if (!function_exists('getYoutubeIdFromUrl')) {
        function getYoutubeIdFromUrl($url) {
            $pattern = '%^
                (?:https?://)?     # Optional scheme. Either http or https
                (?:www\.)?         # Optional www subdomain
                (?:                # Group host alternatives
                  youtu\.be/       # Either youtu.be,
                | youtube\.com     # or youtube.com
                  (?:              # Group path alternatives
                    /embed/        # Either /embed/
                  | /v/            # or /v/
                  | /watch\?v=     # or /watch?v=
                  | /watch\?.+&v=  # or /watch?other_param&v=
                  )                # End path alternatives.
                )                  # End host alternatives.
                ([\w-]{11})        # Allow 11 characters for the video id.
                (?:\S+)?           # Allow extra stuff up to end (and ignore it).
                $%x';
    
            preg_match($pattern, $url, $matches);
    
            return isset($matches[1]) ? $matches[1] : false;
        }
    }

?>