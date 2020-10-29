<?php

namespace Nemundo\Wiki\Page;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Process\Tree\Type\TreeTypeTrait;

class ContentViewPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $parameter=new ContentParameter();
        $parameter->contentTypeCheck=false;
        $contentType = $parameter->getContentType();
        $contentType->getView($this);

        $table1 = new AdminLabelValueTable($this);
        $table1->addLabelValue('Subject', $contentType->getSubject());

        /*if ($contentType->isObjectOfTrait(TreeTypeTrait::class)) {
            $table1->addLabelYesNoValue('Has Parent', $contentType->hasParent());
            $table1->addLabelValue('Child Count', $contentType->getChildCount());
            $table1->addLabelValue('Parent Count', $contentType->getParentCount());
        }*/

        $table1->addLabelValue('Content Type Class', $contentType->getClassName());
        $table1->addLabelValue('Content Type Id', $contentType->typeId);


        $table1->addLabelValue('Content Id', $contentType->getContentId());
        $table1->addLabelValue('Data Id', $contentType->getDataId());


        //$table1->addLabelValue($contentReader->model->dateTime->label, $contentRow->dateTime->getShortDateTimeWithSecondLeadingZeroFormat());
        //$table1->addLabelValue($contentReader->model->user->label, $contentRow->user->displayName);




        return parent::getContent();

    }

}