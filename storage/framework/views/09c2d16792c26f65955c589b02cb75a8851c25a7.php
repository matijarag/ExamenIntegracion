<?php $__env->startSection('content'); ?>

<form method="POST" action="<?php echo e(route('fecha2.store')); ?>">
        <select class="form-control" id="fecha" name="fecha">
                <option selected disabled>Selecciona una hora</option>
            <?php $__currentLoopData = $horario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($horarios->disponibilidad != 0): ?>
                    <option value="<?php echo e($horarios->id_hor_dis); ?>"><?php echo e($horarios->hora_inicio); ?>-<?php echo e($horarios ->hora_termino); ?> <?php echo e($horarios->name); ?></option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>