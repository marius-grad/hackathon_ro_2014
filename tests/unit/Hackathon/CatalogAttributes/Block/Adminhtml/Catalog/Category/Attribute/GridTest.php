<?php
class Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_Attribute_GridTest extends PHPUnit_Framework_TestCase
{
    protected $_class;

    public function setUp()
    {
        $this->_class = Mage::app()->getLayout()->createBlock('catalogattribute/adminhtml_catalog_category_attribute_grid');
    }

    public function _prepareCollectionTest()
    {
        $r = new ReflectionClass('Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_Attribute_Grid');
        $m = $r->getMethod('_prepareColumns');
        $m->setAccessible(true);
        $result = $m->invoke($this->_class,'Yes');

        $this->assertEquals('expected output',$result);
    }

}