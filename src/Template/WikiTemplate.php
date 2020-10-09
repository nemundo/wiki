<?php


namespace Nemundo\Wiki\Template;


use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Wiki\Com\WikiNavigation;

class WikiTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();
        new WikiNavigation($this);

    }

}