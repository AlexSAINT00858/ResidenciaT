<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLEA-T</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
</head>
<body>

<?php $__env->startSection('header'); ?>
    <img class="text-uppercase text-primary mb-1 logo" src="<?php echo e(asset('images/TECNM.png')); ?>" alt="Image">
    <h1 class="display-3 text-uppercase text-center mb-4">
        Bienvenido a <span class="text-primary">Emplea-T</span>
    </h1>
    <img class="text-uppercase text-primary mb-1 logo" src="<?php echo e(asset('images/ITT.png')); ?>" alt="Image">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    <li class="nav-item">
        <a class="nav-link active btn-outline-light" aria-current="page" href="/">Inicio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="<?php echo e(route('login')); ?>">Iniciar Sesión</a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('danger')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('danger')); ?>

        </div>
    <?php endif; ?>
    <!-- Carousel -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="<?php echo e(asset('images/ing-administracion.jpg')); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="<?php echo e(asset('images/ing-biomedica.jpg')); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/ing-civil.jpg')); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/ing-electromecanica.jpg')); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/ing-mecatronica.jpg')); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/ing-sc.jpg')); ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 sectionCards">
                <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto container-fluid containerCards">
                    <?php $__currentLoopData = $offerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($offer->offerName): ?>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="<?php echo e(asset('imagesCompanies/'.$offer->logo)); ?>" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold fs-5"><?php echo e($offer->offerName); ?></h5>
                                        <hr class="border border-danger border-1 opacity-75">
                                        <p class="card-text"><?php echo e($offer->descriptionOffer); ?></p>
                                        <br>
                                        <p class="card-text">$<?php echo e($offer->salary); ?></p>
                                        <p class="card-text"><?php echo e($offer->email); ?></p>
                                        <p class="card-text"><?php echo e($offer->fecha_convertida); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col" style="width: 50%">
                                <div class="card h-auto">
                                    <div class="image-container">
                                        <img src="<?php echo e(asset('imagesOfferts/'.$offer->offerImage)); ?>" class="card-img imagen-ampliada"
                                             alt="Imagen" id="">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/appWelcome.js')); ?>"></script>
</body>
</html>

<?php echo $__env->make('templetes.templete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alejandro\Desktop\empla\EMPLEATV2\resources\views/welcome.blade.php ENDPATH**/ ?>