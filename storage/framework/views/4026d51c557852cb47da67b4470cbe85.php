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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row row-cols-1 row-cols-md-4 g-4 mx-auto container-fluid containerCards">
                        <?php $__currentLoopData = $offerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col" >
                                <div class="card h-100">
                                    
                                    <img src="<?php echo e(asset('images/empresa.png')); ?>" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold fs-5"><?php echo e($offer->offerName); ?></h5>
                                        <hr class="border border-danger border-1 opacity-75">
                                        <p class="card-text"><?php echo e($offer->descriptionOffer); ?></p>
                                        <br>
                                        <p class="card-text">$<?php echo e($offer->salary); ?></p>
                                        <p class="card-text"><?php echo e($offer->publicationDate); ?></p>
                                        <br>
                                        <a href="/editOffer/<?php echo e($offer->idOffer); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                                        <a href="/deleteOffer/<?php echo e($offer->idOffer); ?>" class="btn btn-outline-secondary btn-sm deleteCard">Eliminar</a>
                                        <a href="/getCandidatesByOffer/<?php echo e($offer->idOffer); ?>" class="btn btn-outline-success btn-sm">Ver vacantes</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
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
<?php /**PATH /home/jantonio/projectsLaravel/EmpleaTV2/resources/views/dashboard.blade.php ENDPATH**/ ?>