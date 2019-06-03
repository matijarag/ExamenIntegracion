<?php $__env->startSection('content'); ?>

<div class="container">
        <h1>
                <strong>Nombre</strong>: <?php echo e($nombre); ?>

            </h1>
    <h1>
        <strong>Contraseña</strong>: <?php echo e($pass); ?>

    </h1>
<a class="btn btn-success" href="../../home">Listo</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>