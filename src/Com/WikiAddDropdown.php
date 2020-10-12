<?php


namespace Nemundo\Wiki\Com;


use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Wiki\Data\Wiki\WikiReader;
use Nemundo\Wiki\Parameter\WikiParameter;
use Nemundo\Wiki\Site\WikiAddSite;
use Nemundo\Content\Parameter\DataParameter;

class WikiAddDropdown extends BootstrapSiteDropdown
{

    public $dataId;

    public function getContent()
    {

        $reader = new WikiReader();
        foreach ($reader->getData() as $wikiRow) {
            $site=clone(WikiAddSite::$site);
            $site->title=$wikiRow->title;
            $site->addParameter(new WikiParameter($wikiRow->id));
            $site->addParameter(new DataParameter($this->dataId));
            $this->addSite($site);
        }


        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}