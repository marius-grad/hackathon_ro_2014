<?php
/**
* Catalog Category Attribute Grid Block
* @author #mm14ro
* @package Hackathon
*/
class Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_Attribute_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('category_attribute_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('catalog')->__('Category Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('main', array(
            'label'     => Mage::helper('catalog')->__('Properties'),
            'title'     => Mage::helper('catalog')->__('Properties'),
            'content'   => $this->getLayout()->createBlock('catalogattribute/adminhtml_catalog_category_attribute_edit_tab_main')->toHtml(),
            'active'    => true
        ));

        $model = Mage::registry('entity_attribute');

        $this->addTab('labels', array(
            'label'     => Mage::helper('catalog')->__('Manage Label / Options'),
            'title'     => Mage::helper('catalog')->__('Manage Label / Options'),
            'content'   => $this->getLayout()->createBlock('catalogattribute/adminhtml_catalog_category_attribute_edit_tab_options')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }

}
