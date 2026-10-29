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

use Sylius\Behat\Service\Helper\AutocompleteHelperInterface;
use Tests\Sylius\CmsPlugin\Behat\Page\Admin\Page\CreatePage;
use Tests\Sylius\CmsPlugin\Behat\Page\Admin\Page\IndexPage;
use Tests\Sylius\CmsPlugin\Behat\Page\Admin\Page\UpdatePage;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->defaults()
        ->public();

    $services->set('sylius_cms.behat.page.admin.page.index', IndexPage::class)
        ->parent('sylius.behat.page.admin.crud.index')
        ->private()
        ->args(['sylius_cms_admin_page_index']);

    $services->set('sylius_cms.behat.page.admin.page.create', CreatePage::class)
        ->parent('sylius.behat.page.admin.crud.create')
        ->private()
        ->args([
            'sylius_cms_admin_page_create',
            service(AutocompleteHelperInterface::class),
        ]);

    $services->set('sylius_cms.behat.page.admin.page.update', UpdatePage::class)
        ->parent('sylius.behat.page.admin.crud.update')
        ->private()
        ->args([
            'sylius_cms_admin_page_update',
            service(AutocompleteHelperInterface::class),
        ]);
};
