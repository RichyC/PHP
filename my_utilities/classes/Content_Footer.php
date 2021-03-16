<?php

//TODO: Review, upgrade, and overall create this class

class Content_Footer
{
    public $footer_content = [];

    public function __construct(string $footer = "")
    {
        $this->footer = $footer;
    }

    public function add_to_footer(string $html)
    {
        $this->footer_content[] = $html;
    }

    public function print_footer()
    {
        foreach($this->footer_content AS $html_line)
            echo "$html_line\n";
    }
}