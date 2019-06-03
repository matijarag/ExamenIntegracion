<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                            <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6>Paso 1</h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <h6>Paso 2</h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <h6>Paso 3</h6>
                                        </div>
                                    </div>
                                <div class="progress  col-sm-12">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                                </div>
                            </div>
                    </div>
    <?php echo csrf_field(); ?>
    <div class="table-responsive" style="height:500px">
        <table class="table">
        <thead>
            <th>hora inicio</th>
            <th>hora termino</th>
            <th>operador</th>
            <th>opciones</th>
        </thead>
            <?php $__currentLoopData = $horario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($horarios->disponibilidad != 0): ?>
                    <tbody>
                        <td><?php echo e($horarios->hora_inicio); ?></td>
                        <td><?php echo e($horarios ->hora_termino); ?></td>
                        <td><?php echo e($horarios->name); ?></td>
                        <td> 
<form method="POST" action="<?php echo e(route('fecha2.store')); ?>">
<?php echo csrf_field(); ?>
    <input type="hidden" value="<?php echo e($horarios->id_hor_dis); ?>" name="fecha" id="fecha"/>
        <button type="submit" class="btn btn-primary">crear</button>

</form>

                        </td>
                    </tbody>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
                </div>
                </div>
            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>