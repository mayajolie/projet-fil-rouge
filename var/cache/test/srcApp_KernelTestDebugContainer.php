<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerKrg4gcf\srcApp_KernelTestDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerKrg4gcf/srcApp_KernelTestDebugContainer.php') {
    touch(__DIR__.'/ContainerKrg4gcf.legacy');

    return;
}

if (!\class_exists(srcApp_KernelTestDebugContainer::class, false)) {
    \class_alias(\ContainerKrg4gcf\srcApp_KernelTestDebugContainer::class, srcApp_KernelTestDebugContainer::class, false);
}

return new \ContainerKrg4gcf\srcApp_KernelTestDebugContainer([
    'container.build_hash' => 'Krg4gcf',
    'container.build_id' => '238a8c5a',
    'container.build_time' => 1564482616,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerKrg4gcf');