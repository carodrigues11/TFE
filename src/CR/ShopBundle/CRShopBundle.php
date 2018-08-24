<?php

namespace CR\ShopBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CRShopBundle extends Bundle
{

    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
