<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerT1Jpxof\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerT1Jpxof/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerT1Jpxof.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerT1Jpxof\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerT1Jpxof\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'T1Jpxof',
    'container.build_id' => 'b756b78d',
    'container.build_time' => 1564166087,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerT1Jpxof');
