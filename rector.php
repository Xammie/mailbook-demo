<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php85\Rector\Property\AddOverrideAttributeToOverriddenPropertiesRector;

return RectorConfig::configure()
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        typeDeclarations: true,
        phpunitCodeQuality: true,
    )
    ->withPhpSets()
    ->withPaths([
        __DIR__.'/app',
        __DIR__.'/config',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ])
    ->withSkip([
        AddOverrideAttributeToOverriddenPropertiesRector::class,
    ])
    ->withRootFiles();
