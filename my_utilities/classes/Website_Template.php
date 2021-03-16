<?php


/*
 * This class is designed for website details that involve the content header and footer, which can often remain consistent for
 * a majority of a website. Website_Template is created with the idea that the website template is changeable for situations like
 * displaying a different screen after login or during a unique page of the website.
 */
class Website_Template
{
    public $content_header;

    public $content_footer;

    public $main_style;

    public $main_js;

    public $webpages;
    /*
     * $content_header: $content_header object
     * $content_footer: $content_footer object
     * $webpages[array]: An associative array where key:[page_title] and value:[webpage object]
     */
    public function __construct(Content_Header $content_header, Content_Footer $content_footer, array $webpages)
    {
        $this->content_header = $content_header;
        $this->content_footer = $content_footer;
        $this->webpages = $webpages;
    }

    public function set_content_header(Content_Header $content_header)
    {
        $this->content_header = $content_header;
    }

    public function set_content_footer(Content_Footer $content_footer)
    {
        $this->content_footer = $content_footer;
    }

    public function set_webpages(array $webpages)
    {
        unset($this->webpages);
        $this->webpages = $webpages;
    }

    public function set_main_stylesheet(string $html)
    {
        $this->main_style = $html;
    }

    public function set_main_js(string $html)
    {
        $this->main_js = $html;
    }

    public function print_content_header()
    {
        $this->content_header->print_header();
    }

    public function print_content_footer()
    {
        $this->content_footer->print_footer();
    }

    public function get_webpage(string $page_title)
    {
        return $this->webpages[$page_title];
    }

    public function print_main_stylesheet()
    {
        if($this->main_style)
            echo $this->main_style;
    }

    public function print_main_js()
    {
        if($this->main_js)
            echo $this->main_js;
    }

}