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

    <table class="table table-bordered text-center" style="width: 80%; margin:auto">
        <tr class="table-dark">
            <th>id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>E-mail</th>
            <th>Trabajo</th>
            <th>Eliminar</th>
            <th>Almacenar</th>
        </tr>
        <?php $__currentLoopData = $dataJobApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="table-light">
                <td><?php echo e($data->idJobApplication); ?></td>
                <td><?php echo e($data->dataCandidate->nameCandidate); ?></td>
                <td><?php echo e($data->dataCandidate->lastName); ?></td>
                <td><?php echo e($data->dataCandidate->phoneNumberCandidate); ?></td>
                <td><?php echo e($data->dataCandidate->emailCandidate); ?></td>
                <td><?php echo e($data->dataCandidate->jobTrade); ?></td>
                <td><a href="<?php echo e(asset('resumes/'.$data->dataCandidate->resumeCandidate)); ?>" target="_blank"><img src="<?php echo e(asset('images/icon-pdf.png')); ?>" style="width: 40%; margin:auto" alt="pdf.jpg"></a></td>
                <td><a href="/deleteJobApplication/<?php echo e($data->idJobApplication); ?>/<?php echo e($data->idOffer); ?>"><img src="<?php echo e(asset('images/borrar.png')); ?>" alt="borrar" style="width: 25%; margin:auto"></a></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/jantonio/projectsLaravel/EMPLEATV2/resources/views/company/vacantes.blade.php ENDPATH**/ ?>