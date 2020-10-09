<?php

namespace Nemundo\Wiki\Site;

use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Wiki\Parameter\WikiParameter;
use Nemundo\Content\Data\Tree\TreeDelete;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Type\TreeContentType;
use Nemundo\Content\Writer\TreeContentWriter;
use Nemundo\Core\Http\Url\UrlReferer;
use Schleuniger\Content\Abschluss\AbschlussProcessStatus;

class ContentRemoveSite extends AbstractDeleteIconSite
{

    /**
     * @var ContentDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Remove Content';
        $this->url = 'content-remove';
        ContentRemoveSite::$site = $this;
    }

    public function loadContent()
    {


        $type = (new ContentParameter())->getContentType();
        $type->removeFromParent();

        /*
        $type=new TreeContentType((new ContentParameter())->getValue());
        $type->parentId= (new WikiParameter())->getValue();
        $type->removeFromParent();


        /*
        $delete = new TreeDelete();
        $delete->filter->orEqual($delete->model->parentId, (new WikiParameter())->getValue());
        $delete->filter->orEqual($delete->model->childId,(new ContentParameter())->getValue());
        $delete->delete();

        $type=new AbschlussWorkflowStatus();
        $type->removeFromParent()*/


/*
       $writer= new TreeContentWriter();
       $writer->r

        $item = new TreeItem();
        $item->dataId = (new ContentParameter())->getValue();
        $item->parentId = (new WikiParameter())->getValue();
        $item->removeTree();*/

        (new UrlReferer())->redirect();

    }
}