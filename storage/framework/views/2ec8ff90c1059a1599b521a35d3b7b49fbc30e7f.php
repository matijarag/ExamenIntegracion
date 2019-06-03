<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
    
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="height:500px;">
                            <table class="table" >
                                <thead>
                                    <th>hora inicio</th>
                                    <th>hora termino</th>
                                    <th>Seleccionar</th>
                                </thead>
                            <form action="<?php echo e(route('EliminarModulo.store')); ?>" method="POST" id="1">
                                    <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <td><?php echo e($modulo->hora_inicio); ?></td>
                                <td><?php echo e($modulo->hora_termino); ?></td>
                                <td><input type="checkbox" form="1" name="horaDel[]" value="<?php echo e($modulo->id_hor_dis); ?>"/></td>
                            </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                        <button type="submit" form="1" class="btn btn-danger">Eliminar todos</button>
                        </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>