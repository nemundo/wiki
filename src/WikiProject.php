<?php


namespace Nemundo\Wiki;


use Nemundo\Project\AbstractProject;

class WikiProject extends AbstractProject
{

    protected function loadProject()
    {

        $this->project = 'Wiki';
        $this->projectName = 'wiki';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;

    }

}