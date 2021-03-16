<?php
function autoloader($class_name)
{
    require('my_utilities/classes/'.$class_name.'.php');
}
spl_autoload_register('autoloader');
ob_start();
$html_coder = new HTML();
$footer_content = $html_coder->insert_h3("CSRichy");
$section_header = $html_coder->use_tab(FALSE, $html_coder->child_level).$html_coder->insert_h2("SECTION")."\n";
$section_paragraph = $html_coder->use_tab(TRUE, $html_coder->child_level).$html_coder->insert_p("This is the paragraph to this particular section. The content will be displayed in this section")."\n".$html_coder->use_tab(FALSE, $html_coder->child_level);
$section = $html_coder->insert_div("\n".$section_header.$section_paragraph, ["id" => "section"])."\n";
$page_content = new Page_Content([$html_coder->use_tab(FALSE, $html_coder->child_level).$section]);
$home_header = new Page_Header("CSRichy");
$nav_menu = new Navigation_Menu(["Home" => "index.php?p='Home'", "Contact" => "index.php?p='Contact'"]);
$logo = new Logo(["src" => "../myWebpage/color_logo_black.svg", "style" => "width: 100px; height: 200px"]);
$content_header = new Content_Header([$nav_menu->print_ul_menu(["id" => "navigation-menu"]), $logo->print_div_logo(["id" => "logo"])]);
$content_footer = new Content_Footer($footer_content);
$home_page = new Webpage($home_header, $page_content);
$webpages = ["Home" => $home_page];
$website = new Website_Template($content_header, $content_footer, $webpages);
$webpage = $website->get_webpage("Home");
include('header.inc.html');
include('content.inc.html');
include('footer.inc.html');
ob_end_flush();


