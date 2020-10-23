<?php


namespace Nemundo\Wiki\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Data\Wiki\WikiReader;
use Nemundo\Wiki\Data\WikiCollection;
use Nemundo\Wiki\Install\WikiInstall;

class WikiCleanScript extends AbstractConsoleScript
{

  protected function loadScript()
  {
      $this->scriptName='wiki-clean';
  }

  public function run()
  {

      (new ModelCollectionSetup())->removeCollection(new WikiCollection());
      (new WikiInstall())->install();


      /*
      $reader=new WikiReader();
      foreach ($reader->getData() as $wikiRow) {


          (new WikiPageContentType($wikiRow->id))->deleteType();

      }*/


  }

}