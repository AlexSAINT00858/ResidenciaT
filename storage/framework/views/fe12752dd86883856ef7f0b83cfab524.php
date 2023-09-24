<div class="container-data row mx-auto container-fluid" style="background:white">
    <center class="row">
        <div class="encabezado col">
            <?php echo $__env->yieldContent('header'); ?>
        </div>
    </center>
    <!-- Inicio Menu -->
    <center class="row">
        <nav class="col">
            <div id="menu"> 
                <ul class="menup"> 
                    <?php echo $__env->yieldContent('menu'); ?>
                </ul>
            </div>
        </nav>
    </center>
    <!-- Fin Menu -->
    <section class="row">
        <?php echo $__env->yieldContent('contenido'); ?>
    </section>
</div><?php /**PATH C:\Users\Alejandro\Desktop\empleat\EMPLEATV2\resources\views/templetes/templete.blade.php ENDPATH**/ ?>