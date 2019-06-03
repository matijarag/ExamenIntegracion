<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
<div class="container">
        <h1>
                <strong>email</strong>: <?php echo e($email); ?>

            </h1>
    <h1>
        <strong>Contraseña</strong>: <?php echo e($pass); ?>

    </h1>
<a class="btn btn-success" href="../../home">Listo</a>
</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>