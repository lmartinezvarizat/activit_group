<?php

    class Uri extends Fuel\Core\Uri {

        public function __construct($uri = NULL) {
            if ($uri === NULL) {
                $uri = static::detect();
            }
            $this->uri = trim($uri, '/');
            $this->segments = explode('/', $this->uri);
            $this->detect_language();
        }

        public function detect_language() {
            if(!count($this->segments)) return false;
                $first = $this->segments[0];
                $languages = Config::get('languages');
                if(in_array($first,$languages)) {
                    array_shift($this->segments);
                    $this->uri = implode('/',$this->segments);
                    Config::set('language',$first);
                }
        }
    }