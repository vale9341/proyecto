<?php $__env->startSection('content'); ?>


<style type="text/css">
  .table {
    border-top: 2px solid #ccc;
  }
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Lista de Contribuyentes</h1></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <section class="content">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            
                            <div class="pull-right">
                              <div class="btn-group">
                                <a href="<?php echo e(route('home')); ?>" class="btn btn-info" >Añadir contribuyente</a>
                              </div>
                            </div>
                            <br>
                            <div class="table-container">
                              <table id="mytable" class="table table-bordred table-striped">
                               <thead>
                                 <th>Razon social</th>
                                 <th>RFC</th>
                                 <th>Correo electrónico</th>
                                 <th>Editar</th>
                                 <th>Eliminar</th>
                               </thead>
                               <tbody>

                                <?php if($contribuyentes->count()): ?>  
                                <?php $__currentLoopData = $contribuyentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contribuyente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                <tr>
                                  <td><?php echo e($contribuyente->razonSocial); ?></td>
                                  <td><?php echo e($contribuyente->RFC); ?></td>
                                  <td><?php echo e($contribuyente->correo_Electronico); ?></td>
                                  <td><a class="btn btn-warning btn-xs" href="<?php echo e(action('contribuyenteController@edit', $contribuyente->id)); ?>" >Editar</a></td>
                                  <td>
                                    <form action="<?php echo e(action('contribuyenteController@destroy', $contribuyente->id)); ?>" method="post">
                                     <?php echo e(csrf_field()); ?>

                                     <input name="_method" type="hidden" value="DELETE">

                                     <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                                   </form>
                                   </td>
                                 </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                 <?php else: ?>
                                 <tr>
                                  <td colspan="8">No hay registro !!</td>
                                </tr>
                                <?php endif; ?>
                              </tbody>

                            </table>
                          </div>
                        </div>
                        <?php echo e($contribuyentes->links()); ?>

                      </div>
                    </div>
                  </section>

            
            </div>
        </div>
    </div>
</div>
</div>
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>