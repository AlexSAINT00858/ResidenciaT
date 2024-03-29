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
            <?php echo e(__('Historial')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="row row-cols-1 row-cols-md-4 g-4 mx-auto container-fluid containerCards">
                    <?php $__currentLoopData = $offerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col">
                            <div class="card h-100">

                                <img src="<?php echo e(asset('images/empresa.png')); ?>" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold fs-5"><?php echo e($offer->offerName); ?></h5>
                                    <hr class="border border-danger border-1 opacity-75">
                                    <p class="card-text"><?php echo e($offer->descriptionOffer); ?></p>
                                    <br>
                                    <p class="card-text">$<?php echo e($offer->salary); ?></p>
                                    <p class="card-text"><?php echo e($offer->publicationDate); ?></p>
                                    <p class="card-text">Fecha eliminacion</p>
                                    <br>
                                    <a href="/deleteOffer/<?php echo e($offer->idOffer); ?>"
                                       class="btn btn-outline-secondary btn-sm deleteCard">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/jantonio/projectsLaravel/EMPLEATV2/resources/views/admin/showHistory.blade.php ENDPATH**/ ?>
