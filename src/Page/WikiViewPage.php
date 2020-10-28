<?php

namespace Nemundo\Wiki\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Parameter\WikiPageParameter;
use Nemundo\Wiki\Template\WikiTemplate;

class WikiViewPage extends WikiTemplate
{
    public function getContent()
    {

        $wikiParameter = new WikiPageParameter();

        $wikiId = $wikiParameter->getValue();
        $wikiType = new WikiPageContentType($wikiId);
        $wikiType->getView($this);

        return parent::getContent();

    }
}