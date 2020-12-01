<?php


namespace Nemundo\Wiki\Content\Page;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Wiki\Data\WikiContent\WikiContentReader;

class WikiPageContentView extends AbstractContentView
{

    public function getContent()
    {

        $title = new AdminTitle($this);
        $title->content = $this->contentType->getSubject();

        //$this->title =  $wikiType->getSubject();

        $contentReader = new WikiContentReader();
        $contentReader->model->loadContent();
        $contentReader->model->content->loadContentType();
        $contentReader->filter->andEqual($contentReader->model->pageId, $this->contentType->getDataId());
        foreach ($contentReader->getData() as $contentRow) {
            $type = $contentRow->content->getContentType();
            $type->getDefaultView($this);
        }

        return parent::getContent();

    }

}