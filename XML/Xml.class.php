<?php
// ----------------------------------------------------------------------------
// Xml_class_php
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------

/**
 * XML
 *            
 */
class XML
{
    protected $_sXml = '';

    /**
     * Constructor
     *
     * @param string $sVersion
     * @param string $sEncoding
     */
    public function __construct($sVersion='1.0', $sEncoding='iso-8859-1')
    {
        $this->_sXml .= '<?xml version="'.$sVersion.'" encoding="'.$sEncoding.'" ?>';
    }

    /**
     * Devuelve el contenido XML como un string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->_sXml ;
    }
    /**
     * Devuelve un string con todo el XML
     *
     * @return string
     */
    public function render()
    {
        echo $this->__toString();

    }
}
?>

