<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Nuevo contribuyente</h1></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>


						
	<section class="content">
		<div class="col-md-12 col-md-offset-2">
			<?php if(count($errors) > 0): ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php if(Session::has('success')): ?>
			<div class="alert alert-info">
				<?php echo e(Session::get('success')); ?>

			</div>
			<?php endif; ?>

			<div class="panel panel-default">
				
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="<?php echo e(route('contribuyentes.store')); ?>"  role="form">
							<?php echo e(csrf_field()); ?>

							
											
									<div class="form-group">
										<label for="razonSocial">Nombre o razón social</label>
										<input type="text" name="razonSocial" id="nombre" class="form-control input-sm" placeholder="Nombre o razón social">
									</div>
								
								
									<div class="form-group">
										<label for="RFC">RFC</label>
										<input type="text" name="RFC" id="RFC" minlength="13" maxlength="13" class="form-control input-sm" placeholder="Ingresa RFC">
									</div>
								
									<div class="form-group">
										<label for="correo_electronico">Correo electrónico</label>
										<input type="email" name="correo_Electronico" class="form-control input-sm" placeholder="Ingresa tu correo electrónico"></input>

										<input type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="id_usuario">
									</div>


							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Registrar" class="btn btn-success btn-block">
									
									<a href="<?php echo e(route('contribuyentes.index')); ?>" class="btn btn-info btn-block" >Ver contribuyentes</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
            
            


        </div>
    </div>
</div>
</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>