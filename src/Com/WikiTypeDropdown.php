<?php


namespace Nemundo\Wiki\Com;


use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Wiki\Data\Wiki\WikiReader;
use Nemundo\Wiki\Data\WikiType\WikiTypeReader;
use Nemundo\Wiki\Parameter\WikiParameter;
use Nemundo\Wiki\Site\Content\ContentAddSite;

class WikiTypeDropdown extends BootstrapSiteDropdown
{

    //public $dataId;

    public $wikiId;


    public function getContent()
    {

        $reader = new WikiTypeReader();
        $reader->model->loadContentType();
        foreach ($reader->getData() as $wikiRow) {

            $site=clone(ContentAddSite::$site);
            $site->title=$wikiRow->contentType->contentType;
            $site->addParameter(new WikiParameter($this->wikiId));
            //$site->addParameter(new DataParameter($this->dataId));
            $site->addParameter((new ContentTypeParameter($wikiRow->contentTypeId)));
            $this->addSite($site);

        }

        return parent::getContent();

    }

}