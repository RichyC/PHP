<?php

//TODO: review and test all of the methods
//TODO: Extend class with a form object
//TODO: Extend class with a list object
//TODO: Extend class with a section object
//TODO: Identify any other possible extensions that can be convenient for software development

class HTML
{
   use code_spacer;
   public function __construct()
   {

   }

   /*
    * purpose: applies attributes to html elements
    * input: $attr_array - an associative array where the key values are the attribute names and the values are the attribute values
    * precondition: must be valid attribute names and valid attribute values
    */
    public function as_attr(array $attr_array)
    {
        if(count($attr_array) > 0) {
            $attributes = "";
            $booleanAttribute = FALSE;

            foreach ($attr_array as $attr_name => $attr_value) {
                if ($attr_name === "required" || $attr_name === "hidden") {
                    $booleanAttribute = TRUE;
                    continue;
                } else
                    $attributes .= " $attr_name = '$attr_value'";
            }

            $attributes = trim($attributes);

            if ($booleanAttribute)
                return (array_key_exists("required", $attr_array)) ? " ".$attributes .= " required" : " ".$attributes .= " hidden";
            else
                return " ".$attributes;
        }
    }

    /*
     * purpose: return an html tag ready to structure the html page
     * input:
     *      $tag_name: the name of the html tag to be printed
     *      $attr: an associative array where the key is the attribute name and the value is the attribute value
     *      $content: the content within the html tag; if it is an empty string, the html tag will be self closing
     * output: a valid html tag string
     * precondition: must be a valid html tag
     */
    public function insert_tag(string $tag_name, array $attr = [], $content = "")
    {
        return ($content !== "") ? "<$tag_name".$this->as_attr($attr).">$content</$tag_name>" : "<$tag_name".$this->as_attr($attr)."/>";
    }

    public function insert_a($content, array $attr = [])
    {
        return $this->insert_tag("a", $attr, $content);
    }

    public function insert_abbr($content, array $attr = [])
    {
        return $this->insert_tag("abbr", $attr, $content);
    }

    public function insert_address($content, array $attr = [])
    {
        return $this->insert_tag("address", $attr, $content);
    }

    public function insert_area(array $attr = [])
    {
        return $this->insert_tag("area", $attr);
    }

    public function insert_article($content, array $attr = [])
    {
        return $this->insert_tag("article", $attr, $content);
    }

    public function insert_aside($content, array $attr = [])
    {
        return $this->insert_tag("aside", $attr, $content);
    }

    public function insert_audio($content, array $attr = [])
    {
        return $this->insert_tag("audio", $attr, $content);
    }

    public function insert_b($content, array $attr = [])
    {
        return $this->insert_tag("b", $attr, $content);
    }

    public function insert_blockquote($content, array $attr = [])
    {
        return $this->insert_tag("blockquote", $attr, $content);
    }

    public function insert_linebreak()
    {
        return $this->insert_tag("br", []);
    }

    public function insert_button($content, array $attr = [])
    {
        return $this->insert_tag("button", $attr, $content);
    }

    public function insert_canvas($content = "", array $attr = [])
    {
        return $this->insert_tag("canvas", $attr, $content);
    }

    public function insert_caption($content, array $attr = [])
    {
        return $this->insert_tag("caption", $attr, $content);
    }

    public function insert_cite($content, array $attr = [])
    {
        return $this->insert_tag("cite", $attr, $content);
    }

    public function insert_code($content, array $attr = [])
    {
        return $this->insert_tag("code", $attr, $content);
    }

    public function insert_col(array $attr = [])
    {
        return $this->insert_tag("col", $attr);
    }

    public function insert_colgroup($content, array $attr = [])
    {
        return $this->insert_tag("colgroup", $attr, $content);
    }

    public function insert_data($content, array $attr = [])
    {
        return $this->insert_tag("data", $attr, $content);
    }

    public function insert_datalist($content, array $attr = [])
    {
        return $this->insert_tag("datalist", $attr, $content);
    }

    public function insert_dd($content, array $attr = [])
    {
        return $this->insert_tag("dd", $attr, $content);
    }

    public function insert_del($content, array $attr = [])
    {
        return $this->insert_tag("del", $attr, $content);
    }

    public function insert_details($content, array $attr = [])
    {
        return $this->insert_tag("details", $attr, $content);
    }

    public function insert_dfn($content, array $attr = [])
    {
        return $this->insert_tag("dfn", $attr, $content);
    }

    public function insert_dialog($content, array $attr = [])
    {
        return $this->insert_tag("dialog", $attr, $content);
    }

    public function insert_div($content, array $attr = [])
    {
        return $this->insert_tag("div", $attr, $content);
    }

    public function insert_dl($content, array $attr = [])
    {
        return $this->insert_tag("dl", $attr, $content);
    }

    public function insert_dt($content, array $attr = [])
    {
        return $this->insert_tag("dt", $attr, $content);
    }

    public function insert_em($content, array $attr = [])
    {
        return $this->insert_tag("em", $attr, $content);
    }

    public function insert_embed($content, array $attr = [])
    {
        return $this->insert_tag("embed", $attr, $content);
    }

    public function insert_fieldset($content, array $attr = [])
    {
        return $this->insert_tag("fieldset", $attr, $content);
    }

    public function insert_figcaption($content, array $attr = [])
    {
        return $this->insert_tag("figcaption", $attr, $content);
    }

    public function insert_figure($content, array $attr = [])
    {
        return $this->insert_tag("figure", $attr, $content);
    }

    public function insert_form($content, array $attr = [])
    {
        return $this->insert_tag("form", $attr, $content);
    }

    public function insert_font($content, array $attr = [])
    {
        return $this->insert_tag("font", $attr, $content);
    }

    public function insert_h1($content, array $attr = [])
    {
        return $this->insert_tag("h1", $attr, $content);
    }

    public function insert_h2($content, array $attr = [])
    {
        return $this->insert_tag("h2", $attr, $content);
    }

    public function insert_h3($content, array $attr = [])
    {
        return $this->insert_tag("h3", $attr, $content);
    }

    public function insert_h4($content, array $attr = [])
    {
        return $this->insert_tag("h4", $attr, $content);
    }

    public function insert_h5($content, array $attr = [])
    {
        return $this->insert_tag("h5", $attr, $content);
    }

    public function insert_h6($content, array $attr = [])
    {
        return $this->insert_tag("h6", $attr, $content);
    }

    public function insert_img(array $attr = [], $content = "")
    {
        return $this->insert_tag("img", $attr, $content);
    }

    public function insert_input(array $attr = [])
    {
        return $this->insert_tag("input", $attr);
    }

    public function insert_ins($content, array $attr = [])
    {
        return $this->insert_tag("ins", $attr, $content);
    }

    public function insert_label($content, array $attr = [])
    {
        return $this->insert_tag("label", $attr, $content);
    }

    public function insert_legend($content, array $attr = [])
    {
        return $this->insert_tag("legend", $attr, $content);
    }

    public function insert_link(array $attr)
    {
        return $this->insert_tag("link", $attr);
    }

    public function insert_main($content, array $attr = [])
    {
        return $this->insert_tag("main", $attr, $content);
    }

    public function insert_map($content, array $attr = [])
    {
        return $this->insert_tag("map", $attr, $content);
    }

    public function insert_mark($content, array $attr = [])
    {
        return $this->insert_tag("mark", $attr, $content);
    }

    public function insert_nav($content, array $attr = [])
    {
        return $this->insert_tag("nav", $attr, $content);
    }

    public function insert_noscript($content, array $attr = [])
    {
        return $this->insert_tag("noscript", $attr, $content);
    }

    public function insert_object($content, array $attr = [])
    {
        return $this->insert_tag("object", $attr, $content);
    }

    public function insert_ol($content, array $attr = [])
    {
        return $this->insert_tag("ol", $attr, $content);
    }

    public function insert_optgroup($content, array $attr = [])
    {
        return $this->insert_tag("optgroup", $attr, $content);
    }

    public function insert_option(array $attr = [])
    {
        return $this->insert_tag("option", $attr);
    }

    public function insert_output($content, array $attr = [])
    {
        return $this->insert_tag("output", $attr, $content);
    }

    public function insert_p($content, array $attr = [])
    {
        return $this->insert_tag("p", $attr, $content);
    }

    public function insert_param($content, array $attr = [])
    {
        return $this->insert_tag("param", $attr, $content);
    }

    public function insert_picture($content, array $attr = [])
    {
        return $this->insert_tag("picture", $attr, $content);
    }

    public function insert_pre($content, array $attr = [])
    {
        return $this->insert_tag("pre", $attr, $content);
    }

    public function insert_progress($content, array $attr = [])
    {
        return $this->insert_tag("progress", $attr, $content);
    }

    public function insert_q($content, array $attr = [])
    {
        return $this->insert_tag("q", $attr, $content);
    }

    public function insert_s($content, array $attr = [])
    {
        return $this->insert_tag("s", $attr, $content);
    }

    public function insert_section($content, array $attr = [])
    {
        return $this->insert_tag("section", $attr, $content);
    }

    public function insert_strong($content, array $attr = [])
    {
        return $this->insert_tag("strong", $attr, $content);
    }

    public function insert_style($content, array $attr = [])
    {
        return $this->insert_tag("style", $attr, $content);
    }

    public function insert_stylesheet(string $stylesheet_path)
    {
        return $this->insert_link(["rel" => "stylesheet", "href" => $stylesheet_path]);
    }

    public function insert_sub($content, array $attr = [])
    {
        return $this->insert_tag("sub", $attr, $content);
    }

    public function insert_sup($content, array $attr = [])
    {
        return $this->insert_tag("sup", $attr, $content);
    }

    public function insert_svg($content, array $attr = [])
    {
        return $this->insert_tag("svg", $attr, $content);
    }

    public function insert_table($content, array $attr = [])
    {
        return $this->insert_tag("table", $attr, $content);
    }

    public function insert_tbody($content, array $attr = [])
    {
        return $this->insert_tag("tbody", $attr, $content);
    }

    public function insert_td($content, array $attr = [])
    {
        return $this->insert_tag("td", $attr, $content);
    }

    public function insert_template($content, array $attr = [])
    {
        return $this->insert_tag("template", $attr, $content);
    }

    public function insert_textarea($content, array $attr = [])
    {
        return $this->insert_tag("textarea", $attr, $content);
    }

    public function insert_tfoot($content, array $attr = [])
    {
        return $this->insert_tag("tfoot", $attr, $content);
    }

    public function insert_th($content, array $attr = [])
    {
        return $this->insert_tag("th", $attr, $content);
    }

    public function insert_thead($content, array $attr = [])
    {
        return $this->insert_tag("thead", $attr, $content);
    }

    public function insert_time($content, array $attr = [])
    {
        return $this->insert_tag("time", $attr, $content);
    }

    public function insert_tr($content, array $attr = [])
    {
        return $this->insert_tag("tr", $attr, $content);
    }

    public function insert_track($content, array $attr = [])
    {
        return $this->insert_tag("track", $attr, $content);
    }

    public function insert_u($content, array $attr = [])
    {
        return $this->insert_tag("u", $attr, $content);
    }

    public function insert_ul($content, array $attr = [])
    {
        return $this->insert_tag("ul", $attr, $content);
    }

    public function insert_video($content, array $attr = [])
    {
        return $this->insert_tag("video", $attr, $content);
    }

    public function insert_script(string $script_path)
    {
        return "<script src = '$this->main_js'></script>.PHP_EOL";
    }
    /***************************************************************/
    //FORM HTML BEGINS
    public function add_legend(string $title, array $attr)
    {
        return $this->insert_legend($title, $attr);
    }

    public function add_button($content, array $attr)
    {
        return $this->insert_button($content, $attr);
    }

    public function add_input(array $attr)
    {
        return $this->insert_input($attr);
    }

    public function add_textfield(array $attributes = [])
    {

        if($attributes !== []) $attrs = array_merge(["type" => "text"], $attributes); else $attrs = ["type" => "text"];
        return $this->insert_input($attrs);
    }

    public function add_textarea(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "textarea"], $attributes); else $attrs = ["type" => "textarea"];
        return $this->insert_input($attrs);
    }

    public function add_search_field(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "search"], $attributes); else $attrs = ["type" => "search"];
        return $this->insert_input($attrs);
    }

    public function add_email_field(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "email"], $attributes); else $attrs = ["type" => "email"];
        return $this->insert_input($attrs);
    }

    public function add_tel_field(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "tel"], $attributes); else $attrs = ["type" => "tel"];
        return $this->insert_input($attrs);
    }

    public function add_url_field(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "url"], $attributes); else $attrs = ["type" => "url"];
        return $this->insert_input($attrs);
    }

    public function add_submit(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "submit"], $attributes); else $attrs = ["type" => "submit"];
        return $this->insert_input($attrs);
    }

    public function add_reset(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "reset"], $attributes); else $attrs = ["type" => "reset"];
        return $this->insert_input($attrs);
    }

    public function add_tf_options(string $list_name, array $options, array $text_field_attrs = [])
    {
        $option_list = "";
        $this->add_tab();
        foreach($options AS $option)
        {
            ($option !== end($options)) ? $option_list .= $this->use_tab(FALSE, $this->tab_spacing).$this->insert_option(["value" => $option])."\n" : $option_list .= $this->use_tab(TRUE, $this->tab_spacing).$this->insert_option(["value" => $option])."\n";
        }

        $datalist = $this->use_tab(FALSE, $this->tab_spacing).$this->insert_datalist($option_list, ["id" => $list_name]);

        $attrs = array_merge($text_field_attrs, ["list" => $list_name]);

        $input_with_options = $this->use_tab(FALSE, $this->tab_spacing).$this->add_textfield($attrs);

        return $datalist."\n".$input_with_options;

    }

    public function add_label($content, array $attr)
    {
        return $this->insert_label($content, $attr);
    }

    public function add_radio(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "radio"], $attributes); else $attrs = ["type" => "radio"];
        return $this->insert_input($attrs);
    }

    public function add_checkbox(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "check"], $attributes); else $attrs = ["type" => "check"];
        return $this->insert_input($attrs);
    }

    public function add_file_input(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "file"], $attributes); else $attrs = ["type" => "file"];
        return $this->insert_input($attrs);
    }

    public function add_hidden(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "hidden"], $attributes); else $attrs = ["type" => "hidden"];
        return $this->insert_input($attrs);
    }

    public function add_password_field(array $attributes = [])
    {
        if($attributes !== []) $attrs = array_merge(["type" => "password"], $attributes); else $attrs = ["type" => "password"];
        return $this->insert_input($attrs);
    }
    //FORM HTML ENDS
    /*****************************************************************/

}