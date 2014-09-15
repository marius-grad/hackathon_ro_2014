<?php
/**
* Catalog Category Attribute Grid Block
* @author #mm14ro
* @package Hackathon
*/
class Hackathon_CatalogAttributes_Block_Adminhtml_Catalog_Category_Attribute_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array('id' => 'edit_form', 'action' => $this->getUrl('adminhtml/catalog_category_attribute/save'), 'method' => 'post'));
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }

}
