<?php


namespace Nemundo\Wiki\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Data\Wiki\WikiReader;

class WikiCleanScript extends AbstractConsoleScript
{

  protected function loadScript()
  {
      $this->scriptName='wiki-clean';
  }

  public function run()
  {

      $reader=new WikiReader();
      foreach ($reader->getData() as $wikiRow) {


          (new WikiPageContentType($wikiRow->id))->deleteType();

      }


  }

}