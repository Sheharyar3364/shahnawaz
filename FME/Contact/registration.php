<?php

declare(strict_types= 1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    type: ComponentRegistrar::MODULE,
    componentName: 'FME_Contact',
    path: __DIR__,
    );
