<?php
/**
 * Helper module class
 * @package Hackathon_CatalogAttributes
 */
class Hackathon_CatalogAttributes_Adminhtml_Catalog_Category_AttributeController 
    extends Mage_Adminhtml_Controller_Action
{
    protected $_entityTypeId;

    public function preDispatch()
    {
        parent::preDispatch();
        $this->_entityTypeId = Mage::getModel('eav/entity')->setType(Mage_Catalog_Model_Category::ENTITY)->getTypeId();
    }

    protected function _initAction()
    {
        $this->_title($this->__('Catalog'))
             ->_title($this->__('Attributes'))
             ->_title($this->__('Manage Category Attributes'));

        $this->loadLayout()
            ->_setActiveMenu('catalog/categories_attributes')
            ->_addBreadcrumb(Mage::helper('catalogattribute')->__('Catalog'), 
                    Mage::helper('catalogattribute')->__('Catalog'))
            ->_addBreadcrumb(
                Mage::helper('catalogattribute')->__('Manage Catalog Attributes'),
                Mage::helper('catalogattribute')->__('Manage Catalog Attributes'))
        ;
        return $this;
    }

    /**
     * Index Action
     */
    public function indexAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('catalogattribute/adminhtml_catalog_category_attribute'))
            ->renderLayout();
    }
    
}