<?php

namespace Nemundo\Wiki\Page;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Parameter\WikiParameter;

class PrintPage extends BootstrapDocument  // AbstractTemplateDocument
{

    public function getContent()
    {

        $wikiParameter = new WikiParameter();

        $wikiId = $wikiParameter->getValue();
        $wikiType = new WikiPageContentType($wikiId);

        $title = new AdminTitle($this);
        $title->content = $wikiType->getSubject();

        $this->title =  $wikiType->getSubject();

        foreach ($wikiType->getChild() as $child) {
            $type = $child->getContentType();
            $type->getView($this);
        }

        return parent::getContent();

    }

}