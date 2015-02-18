<?php

/**
 * Category form.
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryForm extends BaseCategoryForm
{
  public function configure()
  {
	//Following code will remove Required validators from these fields.
	unset($this->validatorSchema['created_at']);
	unset($this->validatorSchema['updated_at']);
	unset($this->validatorSchema['root_id']);
	unset($this->validatorSchema['lft']);
	unset($this->validatorSchema['rgt']);
	unset($this->validatorSchema['level']);
	unset($this->validatorSchema['reviews_list']);
	unset($this->validatorSchema['type']);
	unset($this->validatorSchema['offer']);
	unset($this->validatorSchema['demand']);
	unset($this->validatorSchema['association_surveys_list']);

	//following code will remove fields from form
	unset($this->widgetSchema['created_at']);
	unset($this->widgetSchema['updated_at']);
	unset($this->widgetSchema['root_id']);
	unset($this->widgetSchema['lft']);
	unset($this->widgetSchema['rgt']);
	unset($this->widgetSchema['level']);
	unset($this->widgetSchema['reviews_list']);
	unset($this->widgetSchema['type']);
	unset($this->widgetSchema['offer']);
	unset($this->widgetSchema['demand']);
	unset($this->widgetSchema['association_surveys_list']);
	  

    // create a new widget to represent this category's "parent"
    $this->setWidget('category_id', new sfWidgetFormDoctrineChoiceNestedSet(array(
      'model'     => 'Category',
      'add_empty' => true,
    )));

    // if the current category has a parent, make it the default choice
    if ($this->getObject()->getNode()->hasParent())
    {
      $this->setDefault('category_id', $this->getObject()->getNode()->getParent()->getId());
    }
    
    // set labels of fields
    $this->widgetSchema->setLabels(array(
      'name'   => 'Category',
      'category_id' => 'Parent category',
    ));
    
    
    // set a validator for parent which prevents a category being moved to one of its own descendants
    $this->setValidator('category_id', new sfValidatorDoctrineChoiceNestedSet(array(
      'required' => false,
      'model'    => 'Category',
      'node'     => $this->getObject(),
    )));
    $this->getValidator('category_id')->setMessage('node', 'A category cannot be made a descendent of itself.');
	  
  }

  
    /**
   * Updates and saves the current object. Overrides the parent method
   * by treating the record as a node in the nested set and updating
   * the tree accordingly.
   *
   * @param Doctrine_Connection $con An optional connection parameter
   */
  public function doSave($con = null)
  {
    // save the record itself
    parent::doSave($con);
    // if a parent has been specified, add/move this node to be the child of that node
    if ($this->getValue('category_id'))
    {
      $parent = Doctrine::getTable('Category')->findOneById($this->getValue('category_id'));
      if ($this->isNew())
      {
        $this->getObject()->getNode()->insertAsLastChildOf($parent);
      }
      else
      {
        $this->getObject()->getNode()->moveAsLastChildOf($parent);
      }
    }
    // if no parent was selected, add/move this node to be a new root in the tree
    else
    {
      $categoryTree = Doctrine::getTable('Category')->getTree();
      if ($this->isNew())
      {
        $categoryTree->createRoot($this->getObject());
      }
      else
      {
        $this->getObject()->getNode()->makeRoot($this->getObject()->getId());
      }
    }

  }
}
