<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Mis Ofertas')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <?php if(session('danger')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('danger')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 sectionCards">
                <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto container-fluid containerCards">
                    <?php $__currentLoopData = $offerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($offer->offerName): ?>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="<?php echo e(asset('images/trabajos.png')); ?>" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold fs-5"><?php echo e($offer->offerName); ?></h5>
                                        <hr class="border border-danger border-1 opacity-75">
                                        <p class="card-text"><?php echo e($offer->descriptionOffer); ?></p>
                                        <br>
                                        <p class="card-text">$<?php echo e($offer->salary); ?></p>
                                        <p class="card-text"><?php echo e($offer->email); ?></p>
                                        <p class="card-text"><?php echo e($offer->fecha_convertida); ?></p>
                                        <a href="/editOffer/<?php echo e($offer->fecha_convertida); ?>"
                                           class="btn btn-outline-primary btn-sm">Editar</a>
                                        <a href="/changeStateOfferWithData/<?php echo e($offer->fecha_convertida); ?>"
                                           class="btn btn-outline-secondary btn-sm deleteCard">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col" style="width: 50%; text-align: center">
                                <div class="card h-auto">
                                    <div class="image-container">
                                        <img src="<?php echo e(asset('images/OFERTA.png')); ?>" class="card-img imagen-ampliada"
                                             alt="Imagen" id="">
                                        <a href="/changeStateOfferWithOutData/<?php echo e($offer->fecha_convertida); ?>"
                                           class="btn btn-outline-secondary btn-sm deleteCard my-3">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/jantonio/projectsLaravel/EMPLEATV2/resources/views/dashboard.blade.php ENDPATH**/ ?>