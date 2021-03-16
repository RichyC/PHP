<?php
require_once('myUtilities/Page_Content.php');
require_once('myUtilities/Software_TesterV1.php');
require_once('myUtilities/Content_Header.php');
require_once('myUtilities/Logo.php');
require_once('myUtilities/Navigation_Menu.php');

$tester = new myUtilities\Software_TesterV1();
$page_content = new myUtilities\Page_Content();
$logo = new myUtilities\Logo(["src" => "myWebpage/color_logo_black.svg", "alt" => "The logo for CSRichy"]);
$nav_menu = new myUtilities\Navigation_Menu(["Home" => "#", "About Me" => "#", "Services" => "#", "Blog" => "#"]);
$header = new myUtilities\Content_Header([$nav_menu->print_ul_menu(), $logo->print_div_logo(['id' => 'logo'])]);


$attrsTest1 = ["id" => "thisID"];
$attrsTest2 = ["id" => "thisID", "class" => "thisClass"];
$attrsTest3 =  ["id" => "thisID", "required" => TRUE];
$attrsTest4 =  ["id" => "thisID", "hidden" => TRUE];
$attrsTest5 =  ["id" => "thisID", "class" => "thisClass", "required" => TRUE];
$attrsTest6 =  ["id" => "thisID", "class" => "thisClass", "hidden" => TRUE];

$tester->compare_strings(trim($page_content->as_attr($attrsTest1)), "id = 'thisID'", TRUE);
$tester->compare_strings(trim($page_content->as_attr($attrsTest3)), "id = 'thisID' required", TRUE);
$tester->compare_strings(trim($page_content->as_attr($attrsTest4)), "id = 'thisID' hidden", TRUE);
$tester->compare_strings(trim($page_content->as_attr($attrsTest2)), "id = 'thisID' class = 'thisClass'", TRUE);
$tester->compare_strings(trim($page_content->as_attr($attrsTest5)), "id = 'thisID' class = 'thisClass' required", TRUE);
$tester->compare_strings(trim($page_content->as_attr($attrsTest6)), "id = 'thisID' class = 'thisClass' hidden", TRUE);

$tester->compare_strings($page_content->insert_tag("p", $attrsTest1, "This is the paragraph content"), "<p id = 'thisID'>This is the paragraph content</p>", TRUE);
$tester->compare_strings($page_content->insert_tag("input", $attrsTest1), "<input id = 'thisID'/>", TRUE);
$tester->compare_strings($page_content->insert_tag("input", $attrsTest2), "<input id = 'thisID' class = 'thisClass'/>", TRUE);
$tester->compare_strings($page_content->insert_tag("input", $attrsTest3), "<input id = 'thisID' required/>", TRUE);
$tester->compare_strings($page_content->insert_tag("input", $attrsTest4), "<input id = 'thisID' hidden/>", TRUE);
$tester->compare_strings($page_content->insert_tag("input", $attrsTest5), "<input id = 'thisID' class = 'thisClass' required/>", TRUE);
$tester->compare_strings($page_content->insert_tag("input", $attrsTest6), "<input id = 'thisID' class = 'thisClass' hidden/>", TRUE);

$tester->verify_html($page_content->insert_a("This link", ["href" => "index.php?p=this_link"]), "<a href = 'CSRichy-Webpage-V2/index.php?p=this_link'>This link</a>");
$tester->verify_html($page_content->insert_aside("This Aside", [ "id" => "aside"]), "<aside id = 'aside'>This Aside</aside>");
$tester->verify_html($page_content->insert_u("This u element", ["id" => "u"]), "<u id = 'u'>This u element</u>");
$tester->verify_html($page_content->insert_table("td", ["id" => "table"]), "<table id = 'table'>td</table>");
$tester->compare_ints(1, 1, TRUE);
$tester->compare_ints(2 + 3, 5, TRUE);
$tester->compare_floats(1.92, 1.92,TRUE,2);
$tester->compare_floats(1.9, 1.9, TRUE,1);
$tester->compare_floats(1.923, 1.923, TRUE,3);
$tester->compare_floats(1.334, 1.456, FALSE, 2);

echo $header->use_tab(FALSE, $header->child_level)."Hi\n";
$header->add_tab();
echo $header->use_tab(FALSE, $header->child_level)."Hi\n";
$header->add_tab();
echo $header->use_tab(FALSE, $header->child_level)."Hi\n";
$header->add_tab();
echo $header->use_tab(TRUE, $header->child_level)."Hi\n";
echo $header->use_tab(TRUE, $header->child_level)."Hi\n";
echo $header->use_tab(TRUE, $header->child_level)."Hi\n";
echo $header->use_tab(TRUE, $header->child_level)."Hi\n";

$tester->verify_html($logo->print_div_logo(["id" => "logo"]), "<div id = 'logo'><img src = 'CSRichy-Webpage-V2/color_logo_black.svg' alt = 'The logo for CSRichy'/></div>");
$tester->verify_html($nav_menu->print_ul_menu(array("id" => "navigation-menu"), []), "<nav>
            <ul id = 'navigation-menu'>
                <li><a href = '#'><h2>Home</h2></a></li><!-- 
             --><li><a href = '#'><h2>About Me</h2></a></li><!--
             --><li><a href = '#'><h2>Services</h2></a></li><!--
             --><li><a href = '#'><h2>Blog</h2></a></li>
            </ul>
        </nav>");

$tester->verify_html($logo->print_div_logo(["id"=>"photo"]), "<div id = 'photo'><img src = 'CSRichy-Webpage-V2/color_logo_black.svg' alt = 'The logo for CSRichy'/></div>");

$tester->run_tests();






