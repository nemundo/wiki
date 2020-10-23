<?php

namespace Nemundo\Wiki\Page;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Inline\Span;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Data\WikiContent\WikiContentReader;
use Nemundo\Wiki\Parameter\WikiPageParameter;

class PrintPage extends BootstrapDocument  // AbstractTemplateDocument
{

    public function getContent()
    {

        $wikiParameter = new WikiPageParameter();

        $wikiId = $wikiParameter->getValue();
        $wikiType = new WikiPageContentType($wikiId);

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

        }


        /*
        foreach ($wikiType->getChild() as $child) {
            $type = $child->getContentType();
            $type->getView($this);
        }*/

        return parent::getContent();

    }

}