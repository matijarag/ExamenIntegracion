<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">   
                    <div class="container">
                        <div class="table-responsive" style="height:500px;">
                            <table class="table">
                                <thead>
                                    <th>Fecha</th>
                                    <th>Seleccionar</th>
                                    <th>Opcion</th>
                                </thead>
                                <form action="<?php echo e(route('eliminarHoras.store')); ?>" method="POST" id="1">
                                    <?php echo csrf_field(); ?>
                                    <?php $__currentLoopData = $hordis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <td><?php echo e($horas->fecha_hor_dis); ?></td>
                                        <td><input type="checkbox" form="1" name="horaDel[]" value="<?php echo e($horas->fecha_hor_dis); ?>" style="horizontal-align: center;"/></td>
                                        <td>
                                            <form action="<?php echo e(route('SeleccionarModulo.store')); ?>" method="POST" id="2">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" value="<?php echo e($horas->fecha_hor_dis); ?>" form="2" name="fecha" id="fecha"/>
                                                <input type="hidden" value="<?php echo e($id_usu); ?>" name="id_usu" form="2" id="id_usu"/>
                                                <button type="submit" class="btn btn-success" form="2">Editar</button>
                                            </form>
                                        </td>
                                    </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" value="<?php echo e($id_usu); ?>" name="id_usu" form="1" id="id_usu"/>
                                <button type="submit" form="1" class="btn btn-danger">Eliminar todos</button>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>