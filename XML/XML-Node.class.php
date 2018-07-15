<?php
// ----------------------------------------------------------------------------
// Xml_class
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


/************************************************************************
Example:
************************************************************************/


$xml = new XML('artikel.xml');
$xml->print_nodes();



/***********************************************************************
Script
***********************************************************************/
<?php

# This script formats a xml file according to some rules. These rules
# are processed in the function that xml_set_character_data_handler
# defines. We have to remember, in which element we are, and furthermore,
# which ancestor elements the current element has.

class Node {
    var $name;
    var $attributes;
    var $ancestors = "/"
    var $data;
    var $type;

    function Node($tree) {
        $this->name = array_pop($tree);
        $this->ancestors .= implode("/", $tree);
    }

    function add_data($value) {
        $this->data .= ' '.$value;
    }

    function get_type() {
        if (strlen($this->data) > 0) {
            return "with CDATA"
        } else {
            return "without CDATA"
        }
    }

    function level() {
        if ($this->ancestors == "/") return 0;
      if (preg_match_all("/(\/{1})/", $this->ancestors, $result,PREG_PATTERN_ORDER)) {
        return (count($result[0]));
      } else {
        return 0;
        }
    }

    function has_attributes() {
        return (is_array($this->attributes));
    }

    function print_name() {
        return "$this->name";
    }

    function is_child($node) {
        $result = preg_match("/^$ancestors/", $node->ancestors, $match);
        if ($node->ancestors == $this->ancestors) $result = false;
        return $result;
    }
}

class XML {
    var $file;
    var $tree = array();
    var $nodes = array();
    var $PIs;
    var $format_body = "font-family:Verdana;font-size:10pt;"
    var $format_bracket = "color:blue;"
    var $format_element = "font-family:Verdana;font-weight:bold;font-size:10pt;"
    var $format_attribute = "font-family:Courier;font-size:10pt;"
    var $format_data = "font-size:12pt;"
    var $format_attribute_name = "color:#444444;"
    var $format_attribute_value = "font-family:Courier;font-size:10pt;color:red;"
    var $format_blanks = "   "

    function XML($filename) {
        $this->file = $filename;
        $xml_parser = xml_parser_create();
        xml_set_object($xml_parser,&$this);
        xml_set_element_handler($xml_parser, "startElement", "endElement");
        xml_set_character_data_handler($xml_parser, "characterData");
        xml_set_processing_instruction_handler ($xml_parser, "process_instruction");
                # Why should one want to use case-folding with XML? XML is case-sensitiv, I think this is nonsense
        xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, false);

        if (!($fp = @fopen($this->file, "r"))) {
            die(print("Couldn't open file: $this->file\n"));
        }

        while ($data = fread($fp, 4096)) {
          if (!xml_parse($xml_parser, $data, feof($fp))) {
            die(sprintf("XML error: %s at line %d\n",
              xml_error_string(xml_get_error_code($xml_parser)),
              xml_get_current_line_number($xml_parser)));
          }
        }
    }

    function startElement($parser, $name, $attribs) {
        # Adding the additional element to the tree, including attributes
        $this->tree[] = $name;

        $node = new Node($this->tree);
        while (list($k, $v) = each($attribs)) {
            $node->attributes[$k] = $v;
      }
        $this->nodes[] = $node;
    }

    function endElement($parser, $name) {
        # Adding a new element, describing the end of the tag
        # But only, if the Tag has CDATA in it!

        # Check
        if (count($this->nodes) >= 1) {
            $prev_node = $this->nodes[count($this->nodes)-1];
            if (strlen($prev_node->data) > 0 || $prev_node->name != $name) {
                $this->tree[count($this->tree)-1] = "/".$this->tree[count($this->tree)-1];
                $this->nodes[] = new Node($this->tree, NULL);
            } else {
                # Adding a slash to the end of the prev_node
                $prev_node->name = $prev_node->name."/"
                $this->nodes[count($this->nodes)-1]->name = $this->nodes[count($this->nodes)-1]->name."/"
            }
        }

        # Removing the element from the tree
        array_pop($this->tree);
    }

    function characterData($parser, $data) {
        $data = ltrim($data);
        if ($data != "") $this->nodes[count($this->nodes)-1]->add_data($data);
    }

    function process_instruction($parser, $target, $data) {
        if (preg_match("/xml:stylesheet/", $target, $match) && preg_match("/type=\"text\/xsl\"/", $data, $match)) {
            preg_match("/href=\"(.+)\"/i", $data, $this->PIs);
#            print "<b>found xls pi: $PIs[1]</b><br>\n"
        }
    }

    function print_nodes() {
        # Printing the header
        print "<html><head><title>".$this->nodes[0]->name."</title></head>"
        print "<body style=\"".$this->format_body."\">\n"

        # Printing the XML  Data
        for ($i = 0; $i < count($this->nodes); $i++) {
            $node = $this->nodes[$i];

            # Checking: Empty element
            if ($node->name[strlen($node->name)-1] == "/") {
                $end_char = "/"
                $node->name = substr($node->name, 0, strlen($node->name)-1);
            } else {
                $end_char = ""
            }

            # Writing whitespaces, but only if it's _no_ closing element that follows
            # directly on it's opening element
            if (!("/".$this->nodes[$i-1]->name == $node->name)) {
                for ($j = 0; $j < $node->level(); $j++) echo $this->format_blanks;
            }
            echo "<span style=\"".$this->format_bracket."\"><</span><span style=\"".$this->format_element."\">".$node->name."</span>"
            if ($node->has_attributes()) {
                $keys = array_keys($node->attributes);
                for ($j = 0; $j < count($keys); $j++) {
                    printf(" <span style=\"%s\">%s=\"</span><span style=\"%s\">%s</span><span style=\"%s\">\"</span>", $this->format_attribute_name, $keys[$j], $this->format_attribute_value, $node->attributes[$keys[$j]], $this->format_attribute_name);
                }
                echo " "
            }

            echo "<span style=\"".$this->format_element."\">$end_char</span><span style=\"".$this->format_bracket."\">></span>"

            if (strlen($node->data) > 0) echo "<span style=\"".$this->format_data."\">".ltrim($node->data)."</span>"
            else echo "<br>\n"
        }

        # Printing the footer
        print "</body></html>\n"
    }
}

