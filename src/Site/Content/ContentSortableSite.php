<?php


namespace Nemundo\Wiki\Site\Content;


use Nemundo\Core\Debug\Debug;
use Nemundo\Package\JqueryUi\Sortable\AbstractSortableSite;
use Nemundo\Process\Cms\Data\Cms\CmsUpdate;
use Nemundo\Wiki\Data\WikiContent\WikiContentUpdate;

class ContentSortableSite extends AbstractSortableSite
{

    /**
     * @var ContentSortableSite
     */
    public static $site;

    protected function loadSite()
    {
        // TODO: Implement loadSite() method.
      ContentSortableSite::$site=$this;

    }


    public function loadContent()
    {

        $itemOrder = 0;
        foreach ($this->getItemOrderList() as $value) {


            $update= new WikiContentUpdate();
            $update->itemOrder=$itemOrder;
            $update->updateById($value);


            (new Debug())->write($value);

            //foreach ($_POST['item'] as $value) {

                /*$data =  new ProjektPhaseUpdate();
                $data->itemOrder = $itemOrder;
                $data->updateById($value);*/

                $itemOrder++;


        }


        // TODO: Implement loadContent() method.
    }

}