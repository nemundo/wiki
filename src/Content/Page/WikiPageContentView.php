<?php


namespace Nemundo\Wiki\Content\Page;


use Nemundo\Process\Cms\Com\Container\CmsContainer;
use Nemundo\Process\Cms\Com\Container\CmsEditorContainer;
use Nemundo\Content\View\AbstractContentView;

class WikiPageContentView extends AbstractContentView
{

    public function getContent()
    {

        $container = new CmsContainer($this);
        $container->contentType = $this->contentType;

        return parent::getContent();

    }

}