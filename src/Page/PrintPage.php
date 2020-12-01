<?php

namespace Nemundo\Wiki\Page;

use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Parameter\WikiPageParameter;

class PrintPage extends BootstrapDocument  // AbstractTemplateDocument
{

    public function getContent()
    {

        $wikiParameter = new WikiPageParameter();

        $wikiId = $wikiParameter->getValue();
        $wikiType = new WikiPageContentType($wikiId);
        $wikiType->getDefaultView($this);


        /*
        $title = new AdminTitle($this);
        $title->content = $wikiType->getSubject();

        $this->title =  $wikiType->getSubject();

        $contentReader=new WikiContentReader();
        $contentReader->model->loadContent();
        $contentReader->model->content->loadContentType();
        $contentReader->filter->andEqual($contentReader->model->pageId, $wikiId);
        foreach ($contentReader->getData() as $contentRow) {

            $type = $contentRow->content->getContentType();
            $type->getView($this);

        }*/


        return parent::getContent();

    }

}