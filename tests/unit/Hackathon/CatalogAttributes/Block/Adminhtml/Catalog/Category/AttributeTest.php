<?php
//require_once 'PHPUnit/Framework.php';
class Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_AttributeTest extends PHPUnit_Framework_TestCase
{
    protected $_class;

    public function setUp()
    {
        $this->_class = Mage::app()->getLayout()->createBlock('catalogattribute/adminhtml_catalog_category_attribute');
    }


    public function testSomeClass()
    {
        $this->assertInstanceOf('Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_Attribute',$this->_class);
    }

}