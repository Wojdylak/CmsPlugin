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

use Tests\Sylius\CmsPlugin\Behat\Page\Admin\Template\CreatePage;
use Tests\Sylius\CmsPlugin\Behat\Page\Admin\Template\IndexPage;
use Tests\Sylius\CmsPlugin\Behat\Page\Admin\Template\UpdatePage;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->defaults()
        ->public();

    $services->set('sylius_cms.behat.page.admin.template.index', IndexPage::class)
        ->parent('sylius.behat.page.admin.crud.index')
        ->private()
        ->args(['sylius_cms_admin_template_index']);

    $services->set('sylius_cms.behat.page.admin.template.create', CreatePage::class)
        ->parent('sylius.behat.page.admin.crud.create')
        ->private()
        ->args(['sylius_cms_admin_template_create']);

    $services->set('sylius_cms.behat.page.admin.template.update', UpdatePage::class)
        ->parent('sylius.behat.page.admin.crud.update')
        ->private()
        ->args(['sylius_cms_admin_template_update']);
};
