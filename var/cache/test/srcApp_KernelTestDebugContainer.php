<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerRYEPP5Q\srcApp_KernelTestDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerRYEPP5Q/srcApp_KernelTestDebugContainer.php') {
    touch(__DIR__.'/ContainerRYEPP5Q.legacy');

    return;
}

if (!\class_exists(srcApp_KernelTestDebugContainer::class, false)) {
    \class_alias(\ContainerRYEPP5Q\srcApp_KernelTestDebugContainer::class, srcApp_KernelTestDebugContainer::class, false);
}

return new \ContainerRYEPP5Q\srcApp_KernelTestDebugContainer([
    'container.build_hash' => 'RYEPP5Q',
    'container.build_id' => 'c99c7216',
    'container.build_time' => 1564478686,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerRYEPP5Q');
