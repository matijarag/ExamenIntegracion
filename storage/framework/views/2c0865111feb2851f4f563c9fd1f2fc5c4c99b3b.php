<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hora</title>
    <link rel="stylesheet" href="css/administrativo.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" href="dist/jquery-clockpicker.min.css">
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light justify-content-between">

            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="imagenes/logo.png" width="250"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link">
                            <?php echo e(Auth::user()->name); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

            <?php echo $__env->yieldContent('content'); ?>
            <section>
                <footer class="fixed-bottom">
                    <div class="footer-copyright text-center py-3">© 2018 DuocUC :
                        <a href="http://www.duoc.cl">Duoc.cl</a>
                    </div>
                </footer>
            </section>
            <script src="js/validarut.js"></script>
            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                crossorigin="anonymous"></script>
            <script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                crossorigin="anonymous">
            </script>
        
            <script src="dist/bootstrap-clockpicker.min.js"></script>
            <script src="dist/jquery-clockpicker.min.js"></script>
        
            <script type="text/javascript">
                $('.clockpicker').clockpicker();
            </script>
        </body>
        
        </html>
