<?php
/**
* Catalog Category Attribute Block
* @author #mm14ro
* @package Hackathon
*/
class Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_Attribute extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'catalogattribute';
        $this->_controller = 'adminhtml_catalog_category_attribute';
        $this->_headerText = Mage::helper('catalogattribute')->__('Manage Category Attributes');
        $this->_addButtonLabel = Mage::helper('catalogattribute')->__('Add New Attribute');
        parent::__construct();
    }

}
