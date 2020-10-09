<?php


namespace Nemundo\Wiki\Type;


use Nemundo\Wiki\Data\WikiType\WikiTypeReader;
use Nemundo\Content\Collection\AbstractContentTypeCollection;


class WikiContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        $wikiTypeReader = new WikiTypeReader();
        $wikiTypeReader->model->loadContentType();
        $wikiTypeReader->addOrder($wikiTypeReader->model->contentType->contentType);
        foreach ($wikiTypeReader->getData() as $wikiTypeRow) {
            $contentType = $wikiTypeRow->contentType->getContentType();
            $this->addContentType($contentType);
        }

    }

}