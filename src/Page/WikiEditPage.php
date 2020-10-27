<?php

namespace Nemundo\Wiki\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Parameter\WikiPageParameter;

class WikiEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $wikiId = (new WikiPageParameter())->getValue();

        $type= new WikiPageContentType($wikiId);
        $form=$type->getForm($this);





        return parent::getContent();
    }
}