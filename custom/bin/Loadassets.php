<?php
/**
 * Created by PhpStorm.
 * User: rpetrosjan
 * Date: 07/04/2017
 * Time: 16:31
 */

class LoadAssets extends Twig_Extension{
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter(
                'addsssests', array($this, 'AddAssests')
            ),
        );
    }
    public function AddAssests($typefile)
    {
        global  $assetsarrayfile;
        array_push($assetsarrayfile,$typefile);
    }
}