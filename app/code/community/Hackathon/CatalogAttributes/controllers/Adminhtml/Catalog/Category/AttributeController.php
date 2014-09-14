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
    
    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('attribute_id');
        $model = Mage::getModel('catalog/resource_eav_attribute')
            ->setEntityTypeId($this->_entityTypeId);
        if ($id) {
            $model->load($id);

            if (! $model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('catalogattribute')->__('This attribute no longer exists'));
                $this->_redirect('*/*/');
                return;
            }

            // entity type check
            if ($model->getEntityTypeId() != $this->_entityTypeId) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('catalogattribute')->__('This attribute cannot be edited.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // set entered data if was error when we do save
        $data = Mage::getSingleton('adminhtml/session')->getAttributeData(true);
        if (! empty($data)) {
            $model->addData($data);
        }

        Mage::register('entity_attribute', $model);

        $this->_initAction();

        $this->_title($id ? $model->getName() : $this->__('New Attribute'));

        $item = $id ? Mage::helper('catalogattribute')->__('Edit Catalog Attribute')
                    : Mage::helper('catalogattribute')->__('New Catalog Attribute');

        $this->_addBreadcrumb($item, $item);

        $this->getLayout()->getBlock('attribute_edit_js');

        $this->renderLayout();

    }
}