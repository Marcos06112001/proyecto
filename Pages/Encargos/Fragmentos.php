<?php 

function contenedorPrincipal(){
    $correo = $_SESSION["correoGlobal"];
    require_once "../../include/functions/recoge.php";
    require_once "../../DAL/usuarios.php";
    try{
        $usuario = ObtenerUnUsuarios($correo);
    }catch(Exception $e){
        $usuario = null;

    }
               
    
    ?>
        <section id="Encargos" class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pr-0">
                        <div class="card" style="height: 100%;" >

                            <div class="card-body" >

                                <h4 class="text-center">Haz tu Pedido!</h4>
                                <div class="mt-5" style="padding-left: 15%;padding-right: 15%">

                                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1500">
                                                <img src="https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000021Mario01.jpg?alt=media&token=2575c7a8-48a9-4453-b58a-acd9862baf27" class="d-block w-100" alt="..."/>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1500">
                                                <img src="https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000013Bowser.jpg?alt=media&token=ce808209-4d7c-4dfb-896e-04ff5160d2e9" class="d-block w-100" alt="..."/>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1500">
                                                <img src="https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000017Heyhey01.jpg?alt=media&token=5cc22daa-f038-44fd-9ebe-a9dcc42f181f" class="d-block w-100" alt="..."/>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1500">
                                                <img src="https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000010Pulseras01.jpg?alt=media&token=07fe4532-1c45-48da-9877-e0aa132634a6" class="d-block w-100" alt="..."/>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div> 
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col-6 pl-0">
                        <div class="card" >
                            <div class="card-header text-center" style="background-color: #FFD5BB;">
                                <h4>Pide tu encargo aqui mismo!</h4>
                            </div>
                            <form action="Index.php" method="POST" class="was-validated" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="m-5">
                                        <div class="mb-3">
                                            <label  for="txtNombre">Nombre del encargo:</label>
                                            <input type="text" disabled="disabled" class="form-control" value="<?php if(!is_null($usuario)){ echo $usuario['NOMBRE'] . ' ' . $usuario['APELLIDO_1'] . ' ' . $usuario['APELLIDO_2']; } ?>" name="nombre" style="border-radius: 20px;"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="txtDesc">Descripcion del Encargo</label>
                                            <textarea class="form-control" name="desc" style="border-radius: 20px; height: 75px"> </textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label  for="txtNombre">Tamaño:</label>
                                            <select name="tamano" style="border-radius: 20px;">
                                                <option value="0">5 a 15 cm</option>
                                                <option value="1">15cm a 25cm</option>
                                                <option value="2">25cm a 35cm</option>
                                                <option value="3">35+ cm</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label  for="txtNombre">Ejemplo:</label>
                                                    <center>
                                                        <label for="inputImagen" class="agregarFotoPerf" style="cursor: pointer; display: block; background-size: cover; width: 150px; height: 133px;background-image: url('../../img/agregarImg.png');">
                                                            <img id="blah" src="#" style="max-width:100%; max-height:100%; display: none;" />
                                                        </label>
                                                        <input type="file" onchange="readURL(this);" id="inputImagen" name="imagen" style="display:none;" />
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label>
                                                        <input type="checkbox" id="toggleCheckbox" name="indEntrega"> Desea entrega?
                                                    </label>

                                                    <iframe id="googleMapsFrame"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15719.048169091202!2d-84.04027628395998!3d9.953745916310238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e46fb1e4c2dd%3A0xa8ea851c3ab1d546!2sAuto%20Mercado%20%E2%80%A2%20Goicoechea!5e0!3m2!1ses!2scr!4v1702598969863!5m2!1ses!2scr" width="400" height="300" style="border:0;display:none" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        
                                                    <script>
                                                        function toggleGoogleMaps() {
                                                            var googleMapsFrame = document.getElementById('googleMapsFrame');
                                                            var toggleCheckbox = document.getElementById('toggleCheckbox');

                                                           
                                                            googleMapsFrame.style.display = toggleCheckbox.checked ? 'block' : 'none';
                                                        }

                                                        document.getElementById('toggleCheckbox').addEventListener('change', toggleGoogleMaps);
                                                    </script>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="text-center">
                                        <button class="btn-Proyecto btn-success btn" type="submit"> <i class="fas fa-add"></i>  Guardar</button>
                                    </div>
                                </div>
                            </form>




                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php }        
 ?>
       