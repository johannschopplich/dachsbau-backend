<?php

class BadgerPage extends \Kirby\Cms\Page
{
    public function cover()
    {
        return $this->content()->cover()->toFile() ?? $this->image();
    }
}