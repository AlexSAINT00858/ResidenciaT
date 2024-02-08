<?php $__env->startSection('header'); ?>
    <img class="text-uppercase text-primary mb-1 logo" src="<?php echo e(asset('images/TECNM.png')); ?>" alt="Image">
    <h1 class="display-3 text-uppercase text-center mb-4">
        Bienvenido a <span class="text-primary">Emplea-T</span>
    </h1>
    <img class="text-uppercase text-primary mb-1 logo" src="<?php echo e(asset('images/ITT.png')); ?>" alt="Image">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <li class="nav-item">
        <a class="nav-link active btn-outline-light" aria-current="page" href="<?php echo e(route('dashboard')); ?>">Inicio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="<?php echo e(route('registerOffer')); ?>">Registrar Oferta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="<?php echo e(route('showHistory')); ?>">Historial</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-bg-light rounded p-2" role="button" data-bs-toggle="dropdown"
           aria-expanded="false"
           aria-current="page" href="">Empresas</a>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="<?php echo e(route('registerCompany')); ?>">Registrar empresa</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="<?php echo e(route('viewCompanies')); ?>">Ver empresas</a>
            </li>

        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-bg-light rounded p-2" role="button" data-bs-toggle="dropdown"
           aria-expanded="false"
           aria-current="page" href="">
            <?php echo e(Auth::user()->name); ?>

        </a>
        <ul class="dropdown-menu">
            <li>
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('profile.edit'),'class' => 'dropdown-item']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit')),'class' => 'dropdown-item']); ?>
                    <?php echo e(__('Profile')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'class' => 'dropdown-item','onclick' => 'event.preventDefault();
                                                    this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'class' => 'dropdown-item','onclick' => 'event.preventDefault();
                                                    this.closest(\'form\').submit();']); ?>
                        <?php echo e(__('Log Out')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                </form>
            </li>
        </ul>
    </li>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templetes.templete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jantonio/projectsLaravel/EMPLEATV2/resources/views/layouts/navigation.blade.php ENDPATH**/ ?>