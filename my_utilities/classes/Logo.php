<?php



class Logo extends HTML
{
    public $attributes;   //holds the html attributes for the "img" tag

    /*
     * purpose:constructor for Logo object
     * $attributes[array]: html attributes to be added to the html "img" tag
     */
    public function __construct(array $attributes = [])
    {
       $this->attributes = $attributes;
    }

    /*
     * purpose: returns html code for an "img" tag within a "div" element
     * $div_attributes[array]: an array containing the html attributes to be added to the "div" tag
     */
    public function print_div_logo(array $div_attributes = [])
    {
        return $this->insert_div($this->insert_img($this->attributes), $div_attributes);
    }
}