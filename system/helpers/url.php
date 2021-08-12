<?php
    function linkCss($cssPath)
    {
        if(!empty($cssPath))
        {
            return "<link rel='stylesheet' href='".BASE_URL. '/'.$cssPath."'>";
        }
    }

    function linkJs($jsPath)
    {
        if(!empty($jsPath))
        {
            return "<script src='".BASE_URL. '/'.$jsPath."'></script>";
        }
    }
?>