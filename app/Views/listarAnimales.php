<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
    <link rel="stylesheet" href="<?= base_url('public/styles/estilos.css') ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <header>
		<nav class="navbar navbar-expand-lg navbar-dark fondoPrincipal">
			<div class="container-fluid">
				<a class="navbar-brand fuente" href="#">
					<i class="fas fa-paw"></i>
					Animalandia
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="<?= site_url('/')?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('Productos')?>">Registro Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/registro/animales')?>">Registro Animales</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/producto/buscar') ?>">Productos</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link active" href="<?= site_url('/buscar/animales')?>">Animales</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

    <main>
        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-5 g-4">

                <?php foreach($animales as $animal):?>
                    <div class="col">
                        <div class="card h-100 p-3">
                            <img src="<?= $animal["foto"] ?>" class="card-img-top" alt="foto">
                            <div class="card-body">
                                <h5 class="card-title"><?= $animal["nombre"] ?></h5>
                                <h6><?= $animal["tipo"]?></h6>
                                <p class="card-text"></p>
                                <a data-bs-toggle="modal" data-bs-target="#confirmacion<?= $animal["id"]?>" href="#" class="btn btn-primary"><i class="far fa-trash-alt"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#editar<?= $animal["id"]?>" href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                        <section>
                            <div class="modal fade" id="confirmacion<?=$animal["id"]?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header fondoPrincipal text-white">
                                            <h5 class="modal-title">Casa Hogar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <p>¿esta seguro de eliminar este animal?</p>
                                           <p><?= $animal["id"]?></p>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="<?= site_url('/animal/eliminar/'.$animal["id"]) ?>" class="btn btn-danger">Aceptar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="modal fade" id="editar<?=$animal["id"]?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header fondoPrincipal text-white">
                                            <h5 class="modal-title">Casa Hogar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row">
                                               <div class="col-3">
                                                <img src="<?= $animal["foto"] ?>" alt="foto" class="img-fluid w-100" style="height:300px">
                                               </div>
                                               <div class="col-9">
                                                    <form action="<?= site_url('/animal/editar/'.$animal["id"]) ?>" method="POST">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nombre:</label>
                                                            <input type="text" class="form-control" name="nombre" value="<?= $animal["nombre"] ?>">
                                                            <label class="form-label">Edad:</label>
                                                            <input type="text" class="form-control" name="edad" value="<?= $animal["edad"] ?>">
                                                            <label class="form-label">Foto:</label>
                                                            <input type="text" class="form-control" name="foto" value="<?= $animal["foto"] ?>">
                                                            <label class="form-label">Descripcion:</label>
                                                            <input type="text" class="form-control" name="descripcion" value="<?= $animal["descripcion"] ?>">
                                                            <div class="mb-3">
                                                                <label class="form-label">Tipo de animal:</label>
                                                                <select class="form-select" name="tipo">
                                                                    <option value="perro" selected>Perro</option>
                                                                    <option value="gato">Gato</option>
                                                                    <option value="ave">Ave</option>
                                                                    <option value="caballo">Caballo</option>
                                                                    <option value="reptil">Reptil</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button class="btn boton" type="submit">Click Aquí</button>
                                                    </form>
                                               </div>
                                           </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
        
        <section>
		<?php if(session('mensaje')):?>
			<div class="modal fade" id="modal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header fondoPrincipal text-white">
							<h5 class="modal-title">Animalandia</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<div class="row d-flex justify-content-center">
								<div class="col-8">
									<h5><?= session('mensaje')?></h5>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>
	</section>
    </main>

    <footer class="fondoDos p-5 mt-5 position-absolute bottom-0 end-0">
		<div class="container-fluid">

		<div class="row">
			<div class="col-12 col-md-4">
				<h3 class="fw-bold">Horario de atención:</h3>
				<p>Lunes a viernes 7:00 am - 3:00 pm / Sábado: 7:00 am - 2:30 pm / Domingos y festivos 8:00 am - 3:00 pm</p>
				<br>
				<h3 class="fw-bold">Dirección:</h3>
				<p>Belén Altavista Calle 8A # 112-82 </p>
			</div>

			<div class="col-12 col-md-4">
				<h3 class="fw-bold">Ayudas:</h3>
				<p>Glosario / Correo remoto  /  Monitoreo y desempeño de uso del sitio web</p>
				<br>
				<h3 class="fw-bold">Protección de datos:</h3>
				<p>Protección de datos personales en el Municipio de Medellín </p>
			</div>

			<div class="col-12 col-md-4">
				<h1 class="fw-bold fuente"><span><i class="fas fa-paw"></i></span>ANIMALANDIA</h1>
				<br>
				<i class="fab fa-facebook fa-3x"></i>
				<i class="fab fa-instagram fa-3x"></i>
				<i class="fab fa-youtube fa-3x"></i>
				<br>
				<p class="mt-4">© 2021 / NIT: 890905211-1 / Código DANE: 05001 / Código Postal: 050015</p>
				
			</div>
		</div>

		</div>
	</footer>
    

    <script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>