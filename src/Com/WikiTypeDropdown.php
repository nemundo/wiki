<?php


namespace Nemundo\Wiki\Com;


use Nemundo\Content\Data\ApplicationContentType\ApplicationContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Wiki\Application\WikiApplication;
use Nemundo\Wiki\Parameter\WikiPageParameter;
use Nemundo\Wiki\Site\Content\ContentAddSite;

class WikiTypeDropdown extends BootstrapSiteDropdown
{

    public $wikiId;


    public function getContent()
    {

        $reader = new ApplicationContentTypeReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->applicationId, (new WikiApplication())->applicationId);
        $reader->addOrder($reader->model->contentType->contentType);
        foreach ($reader->getData() as $wikiRow) {
            $site = clone(ContentAddSite::$site);
            $site->title = $wikiRow->contentType->contentType;
            $site->addParameter(new WikiPageParameter($this->wikiId));
            $site->addParameter((new ContentTypeParameter($wikiRow->contentTypeId)));
            $this->addSite($site);
        }

        return parent::getContent();

    }

}