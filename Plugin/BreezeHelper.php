<?php

namespace Swissup\BreezeSetubridgePersonalization\Plugin;

class BreezeHelper
{
    public function afterGetExcludedUrls($subject, $result)
    {
        $result[] = '/personalization/';
        return $result;
    }
}
