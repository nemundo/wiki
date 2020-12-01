<?php

namespace Nemundo\Wiki\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Parameter\WikiPageParameter;
use Nemundo\Wiki\Site\WikiSite;

class WikiEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $wikiParameter = new WikiPageParameter();
        $wikiId = (new WikiPageParameter())->getValue();

        $type = new WikiPageContentType($wikiId);
        $form = $type->getDefaultForm($this);
        $form->redirectSite = clone(WikiSite::$site);
        $form->redirectSite->addParameter($wikiParameter);

        return parent::getContent();

    }
}