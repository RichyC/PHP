<?php
/*
 * Richy Eduardo Castro
 */
/*
 * hyperlink : string, string or boolean -> HTML code for a hyperlink
 * $URL : the url the hyperlink will redirect to
 * $linkTxt : a string which will be clicked on to redirect towards the $URL. If false, the $URL itself will be the link
 * hyperlink creates a hyperlink to $url through the text specified in $linktxt. If no $linktxt is provided
 * , the $url itself will be the linktxt
 *
 */
function hyperlink($url, $linkTxt = false)
{
    if($linkTxt === false)
    {
        return "<a href='".$url."'>".$url."</a>\n";
    }
    else
    {
        return "<a href='".$url."'>".$linkTxt."</a>\n";
    }
}

/*
 * thumbnail : file, number -> HTML code for a thumbnail that will be a link to another webpage.
 * $imageFile : a directory to where a an image is located
 * $width : a number to set the size of an image
 * thumbnail returns an image specified by $imageFile and with a width specified by $width. The image itself
 * will be a link to the image-file that holds it.
 *
 */
function thumbnail($imageFile, $width)
{
    return hyperlink($imageFile,"<img src='".$imageFile."' alt='HTML code image' height='200' width='".$width."'>");
}

/*
 * pluralize takes a number as $count and a noun as $noun and returns the two with the noun in its correct plural form
 */
function pluralize($count, $noun)
{
    if($count == 1)
        return strval($count)." ".$noun."\n";
    elseif(substr($noun, strlen($noun)-1) == "y" and
        (substr($noun, strlen($noun)-2, 1) !== "a") and
        (substr($noun, strlen($noun)-2, 1) !== "A") and
        (substr($noun, strlen($noun)-2, 1) !== "e") and
        (substr($noun, strlen($noun)-2, 1) !== "E") and
        (substr($noun, strlen($noun)-2, 1) !== "i") and
        (substr($noun, strlen($noun)-2, 1) !== "I") and
        (substr($noun, strlen($noun)-2, 1) !== "o") and
        (substr($noun, strlen($noun)-2, 1) !== "O") and
        (substr($noun, strlen($noun)-2, 1) !== "u") and
        (substr($noun, strlen($noun)-2, 1) !== "U")
    )
        return strval($count)." ".substr($noun, 0, strlen($noun)-1)."ies\n";
    elseif(substr($noun, strlen($noun)-1) == "y")
        return strval($count)." ".$noun."s\n";
    elseif(substr($noun, strlen($noun)-2) == "on")
        return strval($count)." ".substr($noun, 0, strlen($noun)-2)."a\n";
    elseif(substr($noun, strlen($noun)-1) == "x"
    || substr($noun, strlen($noun)-2) == "sh"
    || substr($noun, strlen($noun)- 2) == "ss"
    || substr($noun, strlen($noun)- 2) == "ch")
        return strval($count). " ".$noun."es\n";
    else
        return strval($count)." ".$noun."s\n";
}

/*
 * test : ANY , ANY -> void
 * test determines if $var1 and $var2 have equal values through the "===" operator
 * returns "Test has failed" if $var1 !== $var2
 * returns "." if $var1 === $var2
 */

function test($var1, $var2, $printDot = true, $decide = false)
{
    //This function must be tested more thoroughly
   if($decide)
    {
        trim($var1);
        trim($var2);
        preg_replace('/\s+/', ' ', $var1);
        preg_replace('/\s+/', ' ', $var2);
    }
 if($var1 === $var2)
 {
     if ($printDot)
         echo ".\n";
 }
 else
     echo "Test has failed\n";
}

/*
 * asRow : numeric string array, boolean -> String
 * asRow takes a string array as a argument and returns an HTML formatted string to create a row for a table element
 * first index of array is a <th> element, while the following elements are <td>
 */

function asRow($stringArray, $useTh = true)
{
    $passedFirstArrayIndex = false;
    $returnString = "<tr>\n";
    if($useTh)
        foreach($stringArray AS $columnValue)
        {
            if(($columnValue === $stringArray[0]) && !$passedFirstArrayIndex)
            {
                $returnString .= "  <th>$columnValue</th>\n";
                $passedFirstArrayIndex = true;
            }
            else
                $returnString .= "  <td>$columnValue</td>\n";
        }
    else
        foreach($stringArray AS $columnValue)
            $returnString .= "  <td>$columnValue</td>\n";

    $returnString .= "</tr>\n";

    return $returnString;
}

/*
 * asAttrs : string [] -> string
 * asAttrs takes a string array as a parameter/argument and returns an HTML formatted string to print attributes for an
 * HTML element
 */
function asAttrs($attrArray)
{
    $returnString="";

    foreach($attrArray AS $attrName => $attrValue)
        $returnString .= "$attrName='$attrValue' ";

    return $returnString;
}

/*
 * dropdown : string, string[] -> string
 * Dropdown takes in a parameter for a name attribute and an array containing all choices and value attributes for
 * a dropdown menu to be returned in HTML formatting
 */
function dropdown($nameAttribute, $valuesArray, $defaultMessage = true)
{
    $returnString = "<select name='$nameAttribute' required>\n";
    if($defaultMessage)
    {
        $returnString .= "  <option value='' selected disabled hidden>select one</option>\n";
    }
    foreach($valuesArray AS $value)
        $returnString .= "  <option value='$value'>$value</option>\n";

    $returnString .= "</select>\n";

    return $returnString;

}

/*
 *radioTableRow: string, string [] -> string
 * radioTableRow takes in a string and a string array as input, returning HTML code to build a table row with the first column as the
 * first parameter and the rest of the columns having radio buttons pertaining to the string array. The radio buttons will return the value of
 * each string in the array
 */
function radioTableRow($rowName, $buttonArray, $tableName = false)
{
    $radioColumns="";

    if(count($buttonArray) === 0)
        $buttonArray = array("");

    foreach($buttonArray AS $buttonValue)
    {
        if(!$tableName)
            $radioColumns .=  "  <td><input " . asAttrs(array("type" => "radio", "name" => $rowName, "value" => $buttonValue)) . "required /></td>\n";
        else
            $radioColumns .= "  <td><input " . asAttrs(array("type" => "radio", "name" => $tableName."[".$rowName."]", "value" => $buttonValue)) . "required /></td>\n";
    }

    return "  <tr>\n  <th>$rowName</th>\n".$radioColumns."  </tr>\n";
}

/*
 * emptyArrayHandler: string[] -> string[]
 * emptyArrayHandler is a helper function for radioTable function. Returns an array with two empty strings if table headers is true.
 * Returns an array with a single empty string if table headers is false
 */
function arrayFilter($array, $tableHeader)
{
    if(count($array) === 0 && $tableHeader)
        return array("","");
    elseif(count($array) === 0)
        return array("");
    elseif($tableHeader)
    {
        array_unshift($array, "");
        return $array;
    }
    else
        return $array;
}

/*
 * radioTable: string, string[], string[] -> string
 * radioTable takes in a table name, table headers, and row information respectively to return HTML code creating a Table corresponding to the parameters provided
 *
 */
function radioTable($tableName, $tableHeaders, $tableRows, $tableGroupName = false)
{

    $tableHeadersHTML = "";
    $tableRowsHTML = "";

    foreach(arrayFilter($tableHeaders, true) AS $tableHeading)
        $tableHeadersHTML .= "<th>$tableHeading</th>\n  ";

    if(!$tableGroupName)
        foreach(arrayFilter($tableRows, false) AS $tableRow)
            $tableRowsHTML .= radioTableRow($tableRow, arrayFilter($tableHeaders, false));
    else
        foreach(arrayFilter($tableRows, false) AS $tableRow)
            $tableRowsHTML .= radioTableRow($tableRow, arrayFilter($tableHeaders, false), $tableName);



    return "<table name='$tableName'>\n  <tr>\n  ".$tableHeadersHTML."</tr>\n".$tableRowsHTML."</table>\n";
}

/*
 * The following functions will be for filtration,retrieval, and postage of elements within the $_POST array
 */

/*
 * filterSearch: array, key, defaultValue -> ANY
 * $array: an array to traverse through during the search for a key
 * $key: a key to search for during the traversal of the array
 * $defaultValue: the value that will be returned if no key exists within the array
 * filterSearch will return a value based on whether an array has an element that matches the key
 * If no element matches the key, the default value will be returned
 * (function was created when referencing Dr. Barland's solution to hw03)
 */
function filterSearch($array, $key, $defaultValue = null)
{
    return (array_key_exists($key, $array) ? $_POST[$key] : $defaultValue);
}

/*
 * getPostElement: key, defaultValue -> ANY
 * $key: the element matching the key to search for within the array
 * $defaultValue: if no element matches the key, this defualt value will be returned
 * getPostElement will return a value based on whether an array has an element that matches the key
 * If no element matches the key, the default value will be returned
 * (function was created when referencing Dr. Barland's solution to hw03)
 */
function getPostElement($key, $defaultValue = "")
{
    return filterSearch($_POST, $key, $defaultValue);
}

/*
 * printRawString: $str -> string
 * $str: a string of any kind will be returned without the side effects of strings complying to the HTML language
 * and being rendered as HTML code
 * printRawString will take hmtl code and present it as a raw string
 * (function was created when referencing Dr. Barland's solution to hw03)
 */
function printRawString($str)
{
    return nl2br(htmlspecialchars($str,ENT_QUOTES/*|ENT_HTML5  (php 5.4.0) */));
}

/* Return an element of $_POST, sanitized as html (or, $dflt if the key isn't in $_POST).
* (function was created when referencing Dr. Barland's hw03 solution)
*/

function post2html($indx, $defaultValue='')
{
    return printRawString(getPostElement($indx,$defaultValue));
}



?>
