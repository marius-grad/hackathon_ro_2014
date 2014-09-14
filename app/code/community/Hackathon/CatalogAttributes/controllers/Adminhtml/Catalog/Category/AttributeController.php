<?php
/**
 * Helper module class
 * @package Hackathon_CatalogAttributes
 */
class Hackathon_CatalogAttributes_Adminhtml_Catalog_Category_AttributeController 
    extends Mage_Adminhtml_Controller_Action
{
    /**
     * Index Action
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    
}