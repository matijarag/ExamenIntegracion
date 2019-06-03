<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Admision especial
                </div>
                

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                          <?php if(Auth::user()->id_tipo_usuario == 2): ?>
                            <div class="table">
                                <table>
                                    <thead>
                                        <th>hora inicio</th>
                                        <th>alumno</th>
                                        <th>observaciones</th>
                                        <th>opciones</th>
                                    </thead>
                                    <?php $__currentLoopData = $horarioDis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <td><?php echo e($fecha->fecha_hor_dis); ?></td>
                                        <td><?php echo e($fecha->name); ?></td>
                                        <form action="<?php echo e(route('cita.store')); ?>" method="POST"></form>
                                        <td></td>
                                        <td></td>
                                    </form>
                                    </tbody>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                            <?php endif; ?>
                            <?php if(Auth::user()->id_tipo_usuario == 1): ?>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Crear Modulos</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Crear Usuario</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Modificar horarios</a>
                                    </li>
                                  </ul>
                                  
                                <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="container">
                                            <form class="form-horizontal" method="POST" action="<?php echo e(route('modulos.store')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_inicio_turno">hora inicio turno</label>
                                                    <div class="col-md-8">
                                                        <input type="month" class="form-control form-control-1 input-sm from" name="mes" min="2018-<?php echo e($MesActual); ?>" max="2018-<?php echo e($MesActual + 1); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="id_usu">Usuario turno</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="id_usu" id="id_usu">
                                                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($users->id_usu); ?>"><?php echo e($users->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>    
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_inicio_turno">hora inicio turno</label>
                                                    <div  class="input-group clockpicker col-md-8">
                                                        <input type="time" name="hora_inicio_turno" class="form-control" value="00:00">
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_termino_turno">hora termino turno</label>
                                                    <div class="input-group clockpicker col-md-8">
                                                        <input type="time" name="hora_termino_turno" class="form-control" value="00:00">
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_inicio_almuerzo">hora inicio almuerzo</label>
                                                    <div class="input-group clockpicker col-md-8">
                                                        <input type="time" name="hora_inicio_almuerzo" class="form-control" value="00:00">
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_termino_almuerzo">hora termino almuerzo</label>
                                                    <div class="input-group clockpicker col-md-8">
                                                        <input type="time" name="hora_termino_almuerzo" class="form-control" value="00:00">
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                    </div>
                                                </div> 
                                                <button type="submit" class="btn btn-primary">crear</button>
                                            </form>
                                        </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="container">
                                                    <form method="POST" action="<?php echo e(route('admin.store')); ?>">
                                                            <?php echo csrf_field(); ?>

                                                            <div class="form-group row">
                                                                <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nombre')); ?></label>

                                                                <div class="col-md-6">
                                                                    <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                                                    <?php if($errors->has('name')): ?>
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail')); ?></label>

                                                                <div class="col-md-6">
                                                                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                                                    <?php if($errors->has('email')): ?>
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="tipo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Tipo usuario')); ?></label>
                                                                <div class="col-md-6">
                                                                    <select class="form-control" id="tipo" name="tipo">
                                                                            <option selected disabled>Selecciona un tipo de usuario</option>
                                                                        <?php $__currentLoopData = $tipo_usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($tipo->descripcion_tip_usu != 'alumno'): ?>
                                                                            <option value="<?php echo e($tipo->id_tip_usu); ?>"><?php echo e($tipo->descripcion_tip_usu); ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Contraseña')); ?></label>

                                                                <div class="col-md-6">
                                                                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                                                    <?php if($errors->has('password')): ?>
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirmacion contraseña')); ?></label>

                                                                <div class="col-md-6">
                                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-6 offset-md-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        <?php echo e(__('Registrar')); ?>

                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <div class="contatiner">
                                                <form action="<?php echo e(route('HorasDisponibles.store')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 text-md-right col-form-label" for="id_usu">Usuario turno</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="id_usu" id="id_usu">
                                                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($users->id_usu); ?>"><?php echo e($users->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>    
                                                    </div> 
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                <?php echo e(__('Modificar')); ?>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            <?php endif; ?>
                            <?php if(Auth::user()->id_tipo_usuario == 3): ?>
                                    <div class="container">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h6>Paso 1</h6>
                                                </div>
                                                <div class="col-sm">
                                                    <h6>Paso 2</h6>
                                                </div>
                                                <div class="col-sm">
                                                    <h6>Paso 3</h6>
                                                </div>
                                            </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>
                                        </div>
                                    </div>
                                <form method="POST" action="<?php echo e(route('fecha.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                        <select class="form-control" id="fecha" name="fecha">
                                                <option selected disabled>Selecciona una fecha</option>
                                            <?php $__currentLoopData = $horario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($horarios->disponibilidad != 0): ?>
                                                    <?php if($var != $horarios->fecha_hor_dis): ?>
                                                        <option value="<?php echo e($horarios->fecha_hor_dis); ?>"><?php echo e($horarios->fecha_hor_dis); ?></option>
                                                    <?php endif; ?>
                                                    
                                                    <?php 
                                                    $var = $horarios->fecha_hor_dis;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <button type="submit" class="btn btn-primary">crear</button>
                                </form>
                          <?php endif; ?>
                          <?php if(Auth::user()->id_tipo_usuario == 4): ?>
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active <!-- fade-->" id="menu1">
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
                            </div>
                            <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>