<?php
namespace Nemundo\Wiki\Application;
use Nemundo\App\Application\Type\AbstractApplication;
class WikiApplication extends AbstractApplication {
protected function loadApplication() {
$this->application = 'Wiki';
$this->applicationId = '177607b1-b7aa-4da6-92e9-da4e162a2362';
}
}