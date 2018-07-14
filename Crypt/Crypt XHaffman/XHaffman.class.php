<?php
// ----------------------------------------------------------------------------
// XHaffman_class
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------


/*****************************************************
 * COPYRIGHT NOTICE
 * Copyright (c) 2011, &#33406;&#20811;&#35270;&#22270;
 * All rights reserved
 *
 * @file XHaffmanSec.class.php
 * @brief X&#21704;&#24343;&#26364;&#30721;&#21152;&#23494;&#31867;
 * &#26412;PHP&#31867;&#23454;&#29616;&#20102;&#20197;&#21704;&#24343;&#26364;&#32534;&#30721;&#24418;&#24335;&#23545;&#25991;&#26412;&#36827;&#34892;&#21152;&#23494;&#21450;&#35299;&#23494;&#12290;
 * &#20351;&#29992;&#26041;&#27861;
 * $xhaff = new XHaffman();
 * $text_1 = $xhaff->Encode("&#26126;&#25991;", "&#23494;&#38053;"); ///< &#21152;&#23494;
 * $text_2 = $xhaff->Decode("&#23494;&#25991;", "&#23494;&#38053;"); ///< &#35299;&#23494;
 *
 * @version 1.0
 * @author XadillaX
 * @date 2011-1-13
 * @web http://www.xcoder.in
 *
 * &#20462;&#35746;&#35828;&#26126;&#65306;&#26368;&#21021;&#29256;&#26412;
 *****************************************************/
define("COPY_CONSTRUCT", "-65535");
define("NO_NODE", "-65535");
define("NO_POS", "-65535");
class HTNode {
    var $data = 0;
    var $lc = NO_NODE, $rc = NO_NODE;
    var $w = 0;
    var $pos = 0;
    public function __construct($_d, $_w, $_pos = NO_POS, $_l = NO_NODE, $_r = NO_NODE) {
        $this->data = $_d;              
        $this->w = $_w;
        $this->lc = $_l;
        $this->rc = $_r;
        $this->pos = $_pos;
    }
};

function HTNodeCmp(HTNode $a, HTNode $b) {
    return $a->w < $b->w;
}

class XHaffman {
    /** &#26435;&#20540;&#20174;Lolita&#23567;&#35828;&#20013;&#25277;&#26679;&#21462;&#20986; */
    var $ch = array(
            10, 32, 33, 37, 40, 41, 44, 45, 46, 48,
            49, 50, 51, 52, 53, 54, 55, 56, 57, 58,
            59, 63, 65, 66, 67, 68, 69, 70, 71, 72,
            73, 74, 75, 76, 77, 78, 79, 80, 81, 82,
            83, 84, 85, 86, 87, 88, 89, 90, 91, 93,
            97, 98, 99, 100, 101, 102, 103, 104, 105, 106,
            107, 108, 109, 110, 111, 112, 113, 114, 115, 116,
            117, 118, 119, 120, 121, 122, 123, 161, 164, 166,
            168, 170, 173, 174, 175, 176, 177, 180, 186,
            95
    );

    var $fnum = array(
            2970, 99537, 265, 1, 496, 494, 9032, 1185, 5064, 108,
            180, 132, 99, 105, 82, 64, 62, 77, 126, 296,
            556, 548, 818, 443, 543, 435, 225, 271, 260, 797,
            3487, 158, 50, 1053, 589, 498, 332, 316, 61, 276,
            724, 855, 54, 293, 543, 11, 185, 11, 25, 26,
            42416, 7856, 12699, 23670, 61127, 10229, 10651, 27912, 32809, 510,
            4475, 23812, 13993, 34096, 38387, 9619, 500, 30592, 30504, 42377,
            14571, 4790, 11114, 769, 10394, 611, 1, 4397, 12, 71,
            117, 1234, 81, 5, 852, 1116, 1109, 1, 3,
            5000
    );

    var $root = NULL;
    var $nodes = array();
    var $_nodes = array();
    var $decode_arr = array();
    var $encode_arr = array();

    /**
     * &#21019;&#24314;&#21704;&#24343;&#26364;&#26641;
     */
    private function __CreateHT() {
        $len = count($this->nodes);
        $_len = 0;

        while($len > 1) {
            /** &#23545;&#32467;&#28857;&#25490;&#24207;&#24182;&#21462;&#20986;&#26435;&#20540;&#26368;&#23567;&#30340;&#20004;&#20010;&#33410;&#28857; */
            usort($this->nodes, "HTNodeCmp");
            $lmin = $this->nodes[$len - 1];
            $rmin = $this->nodes[$len - 2];

            /** &#33509;&#27492;&#33410;&#28857;&#26410;&#35760;&#24405;&#65292;&#21017;&#22312;_nodes&#20013;&#35760;&#24405; */
            if($lmin->pos == NO_POS) {
                $lmin->pos = $_len;
                $this->_nodes[$_len] = $lmin;
                $_len++;
            }
            if($rmin->pos == NO_POS) {
                $rmin->pos = $_len;
                $this->_nodes[$_len] = $rmin;
                $_len++;
            }

            /** &#21512;&#24182;&#20004;&#20010;&#33410;&#28857;&#65292;&#24182;&#23558;&#26032;&#33410;&#28857;&#25918;&#20837;&#25968;&#32452; */
            $this->_nodes[$_len] = new HTNode(0, $lmin->w + $rmin->w, $_len, $lmin->pos, $rmin->pos);
            $_len++;

            unset($this->nodes[$len - 1]);
            unset($this->nodes[$len - 2]);
            $len--;
            $this->nodes[$len - 1] = $this->_nodes[$_len - 1];
        }

        /** &#26681;&#33410;&#28857; */
        $this->root = $this->nodes[0];
    }

    /**
     * &#21019;&#24314;&#21704;&#24343;&#26364;&#32534;&#30721;
     */
    private function __CreateHTCode($pos, $num) {
        if($pos == NO_POS) return;

        $node = $this->_nodes[$pos];
        if($node->data != 0) {
            $this->decode_arr[strval($num)] = $node->data;
            $this->encode_arr[$node->data] = $num;
        }

        $this->__CreateHTCode($node->lc, $num << 1);
        $this->__CreateHTCode($node->rc, ($num << 1) + 1);
    }

    public function __construct() {
        /** &#26500;&#36896;&#20989;&#25968; */
        $len = count($this->fnum);

        /** &#29031;&#26435;&#20540;&#35774;&#32622;&#32467;&#28857; */
        for($i = 0; $i < $len; $i++)
            $this->nodes[$i] = new HTNode($this->ch[$i], (int)($this->fnum[$i]));

        /** &#26410;&#35774;&#32622;&#30340;&#32534;&#30721;&#20197;4000&#20026;&#26435;&#20540; */
        for($i = 1; $i < 256; $i++)
            if(!in_array($i, $this->ch))
                $this->nodes[$len++] = new HTNode($i, 4000);

        /** &#21019;&#24314;Haffman&#32534;&#30721; */
        $this->__CreateHT();
        $this->__CreateHTCode($this->root->pos, 1);
    }

    /**
     * &#35299;&#23494;&#20989;&#25968;
     * @param  $str
     * @param  $key
     * @return  &#26126;&#25991;
     * &#23558;&#23494;&#25991;$str&#20197;&#23494;&#38053;$key&#35299;&#23494;&#65292;&#36820;&#22238;&#26126;&#25991;
     */
    public function Decode($str, $key) {
        $comlen = strlen($str);
        $klen = strlen($key);
        $decode = "";
        $decode_arr = array();

        for($i = 0; $i < $comlen; $i++)
            $str[$i] = chr(ord($str[$i]) ^ ord($key[$i % $klen]));

        $str = gzuncompress($str);

        $decode_arr = explode("#", $str);
        $len = count($decode_arr);
        for($i = 0; $i < $len; $i++) {
            $type = $decode_arr[$i][0];
            $haff = intval(substr($decode_arr[$i], 1, strlen($decode_arr[$i]) - 1));
            $haff ^= ord($key[$i % $klen]);
            if(array_key_exists(strval($haff), $this->decode_arr))
                $ch = $this->decode_arr[strval($haff)];
            else $ch = $haff;

            //echo $ch . " ";
            $decode .= chr($ch);
        }

        return $decode;
    }

    /**
     * &#21152;&#23494;&#20989;&#25968;
     * @param  $str
     * @param  $key
     * @return  &#23494;&#25991;
     * &#23558;$str&#20197;$key&#20026;&#23494;&#38053;&#36827;&#34892;&#21152;&#23494;&#65292;&#36820;&#22238;&#21152;&#23494;&#20018;
     */
    public function Encode($str, $key) {
        $len = strlen($str);
        $klen = strlen($key);
        $encode_arr = array();
        for($i = 0; $i < $len; $i++) {
            $asc = ord($str[$i]);
            if(array_key_exists($asc, $this->encode_arr)) {
                $haff = $this->encode_arr[$asc];
                $haff ^= ord($key[$i % $klen]);
                $encode_arr[$i] = "1" . $haff;
            }
            else {
                $haff = $asc;
                $haff ^= ord($key[$i % klen]);
                $encode_arr[$i] = "2" . $haff;
            }

        }

        $text = implode("#", $encode_arr);
        $text = gzcompress($text, 9);
        $comlen = strlen($text);
        for($i = 0; $i < $comlen; $i++)
            $text[$i] = chr(ord($text[$i]) ^ ord($key[$i % $klen]));
            return $text;
        }
}

//$h = new XHaffman(); //$text = $h->Encode("&#30340;&#21457;&#29983;&#21152;&#25289;&#20811;&#22235;&#35867;&#27861;&#21152;&#25289;&#20811;", "12345");
//
//echo $h->Decode($text, "12345");
?>




