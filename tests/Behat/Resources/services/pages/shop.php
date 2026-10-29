<?php

/*
 * This file is part of the Sylius CMS Plugin package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Tests\Sylius\CmsPlugin\Behat\Page\Shop\HomePage;
use Tests\Sylius\CmsPlugin\Behat\Page\Shop\Page\IndexPage;
use Tests\Sylius\CmsPlugin\Behat\Page\Shop\Page\ShowPage;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->defaults()
        ->public();

    $services->set('sylius_cms.behat.page.shop.home', HomePage::class)
        ->parent('sylius.behat.page.shop.home')
        ->private()
        ->args(['sylius_shop_homepage']);

    $services->set('sylius_cms.behat.page.shop.page.show', ShowPage::class)
        ->parent('sylius.behat.symfony_page')
        ->private();

    $services->set('sylius_cms.behat.page.shop.page.index', IndexPage::class)
        ->parent('sylius.behat.symfony_page')
        ->private();
};
