<div class="container-data row mx-auto container-fluid" style="background:white">
    <center class="row">
        <div class="encabezado col">
            <?php echo $__env->yieldContent('header'); ?>
        </div>
    </center>
    <!-- Inicio Menu -->
    <nav class="navbar navbar-expand-sm" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarText">
                <ul class="nav nav-underline                                                                                                                             ">
                    <?php echo $__env->yieldContent('menu'); ?>
                </ul>
                <span class="navbar-text"></span>
            </div>
        </div>
    </nav>
    <!-- Fin Menu -->
    <section class="row">
        <?php echo $__env->yieldContent('contenido'); ?>
    </section>
</div>
<?php /**PATH C:\Users\Alejandro\Desktop\empla\EMPLEATV2\resources\views/templetes/templete.blade.php ENDPATH**/ ?>