<?php
/**
* Catalog Category Attribute Grid Block
* @author #mm14ro
* @package Hackathon
*/
class Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_Attribute_Grid extends Mage_Eav_Block_Adminhtml_Attribute_Grid_Abstract
{
    /**
     * Prepare category attributes grid collection object
     *
     * @return Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_Attribute_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('catalog/category_attribute_collection')
            ->addFieldToFilter('is_user_defined',1)
        ;
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare category attributes grid columns
     *
     * @return Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_Attribute_Grid
     */
    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        $this->addColumnAfter('is_visible', array(
            'header'=>Mage::helper('catalog')->__('Visible'),
            'sortable'=>true,
            'index'=>'is_visible_on_front',
            'type' => 'options',
            'options' => array(
                '1' => Mage::helper('catalog')->__('Yes'),
                '0' => Mage::helper('catalog')->__('No'),
            ),
            'align' => 'center',
        ), 'frontend_label');

        $this->addColumnAfter('is_global', array(
            'header'=>Mage::helper('catalog')->__('Scope'),
            'sortable'=>true,
            'index'=>'is_global',
            'type' => 'options',
            'options' => array(
                Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE =>Mage::helper('catalog')->__('Store View'),
                Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE =>Mage::helper('catalog')->__('Website'),
                Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL =>Mage::helper('catalog')->__('Global'),
            ),
            'align' => 'center',
        ), 'is_visible');

        return $this;
    }
}