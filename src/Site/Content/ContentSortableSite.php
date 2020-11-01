<?php


namespace Nemundo\Wiki\Site\Content;


use Nemundo\Content\Data\Tree\TreeUpdate;
use Nemundo\Db\DbConfig;
use Nemundo\Package\JqueryUi\Sortable\AbstractSortableSite;
use Nemundo\Wiki\Data\WikiContent\WikiContentUpdate;


class ContentSortableSite extends AbstractSortableSite
{

    /**
     * @var ContentSortableSite
     */
    public static $site;

    protected function loadSite()
    {

        ContentSortableSite::$site = $this;

    }


    public function loadContent()
    {

       // DbConfig::$sqlDebug=true;

        $itemOrder = 0;
        foreach ($this->getItemOrderList() as $value) {

            $update= new WikiContentUpdate();
            $update->itemOrder=$itemOrder;
            $update->updateById($value);

            $itemOrder++;

        }

    }

}