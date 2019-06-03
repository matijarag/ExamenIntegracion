<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" href="#usu_nrom" role="tab" data-toggle="tab">crear usuario normal</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#cre_mod_y_hor" role="tab" data-toggle="tab">crear modulos y horarios</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#tom_hor" role="tab" data-toggle="tab">tomar hora</a>
                            </li>
                          </ul>
                          
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active <!-- fade-->" id="usu_nrom">
                                <div class="container col-md-12">
                                    <Form class="form-horizontal" method="POST" action="<?php echo e(route('usu_norm.store')); ?>">
                                        <?php echo csrf_field(); ?>
                                            <div class="form-group row">
                                                <label class="col-md-2 text-md-right col-form-label" for="rut">Rut</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="rut" placeholder="ingrese rut" required>
                                                </div>
    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 text-md-right col-form-label" for="nombre">Nombre</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="nombre" placeholder="ingrese nombre" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 text-md-right col-form-label" for="email">Email</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="email" name="email" placeholder="ingrese email" required>
                                                </div>
    
                                            </div>
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    </Form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane <!-- fade-->" id="cre_mod_y_hor">
                                <div class="container">
                                    <form class="form-horizontal" method="POST" action="<?php echo e(route('modulos.store')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 text-md-right col-form-label" for="hora_inicio_turno">hora inicio turno</label>
                                            <div class="col-md-8">
                                                <input type="month" name="mes" min="2018-<?php echo e($MesActual); ?>" max="2018-<?php echo e($MesActual + 1); ?>">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label class="col-md-3 text-md-right col-form-label" for="hora_inicio_turno">hora inicio turno</label>
                                            <div class="col-md-8">
                                                <input type="time" name="hora_inicio_turno">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label class="col-md-3 text-md-right col-form-label" for="hora_termino_turno">hora termino turno</label>
                                            <div class="col-md-8">
                                                <input type="time" name="hora_termino_turno">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 text-md-right col-form-label" for="hora_inicio_almuerzo">hora inicio almuerzo</label>
                                            <div class="col-md-8">
                                                 <input type="time" name="hora_inicio_almuerzo">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label class="col-md-3 text-md-right col-form-label" for="hora_termino_almuerzo">hora termino almuerzo</label>
                                            <div class="col-md-8">
                                                <input type="time" name="hora_termino_almuerzo">
                                            </div>
                                        </div> 
                                        <button type="submit" class="btn btn-susccess">crear</button>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane <!-- fade-->" id="tom_hor">tomar hora</div>
                          </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>