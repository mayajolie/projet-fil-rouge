<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'form.type_extension.form.transformation_failure_handling' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/form/FormTypeExtensionInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/form/AbstractTypeExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/form/Extension/Core/Type/TransformationFailureExtension.php';

return $this->privates['form.type_extension.form.transformation_failure_handling'] = new \Symfony\Component\Form\Extension\Core\Type\TransformationFailureExtension(NULL);
