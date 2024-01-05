<?php
include("../../bd.php");
if ($_POST) {
    // Recepionamos los valores del formulario
    $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";
    $descripcionMedicamentos = (isset($_POST['descripcionMedicamentos'])) ? $_POST['descripcionMedicamentos'] : "";
    $lote_Medicamentos = (isset($_POST['lote_Medicamentos'])) ? $_POST['lote_Medicamentos'] : "";
    $cantidadMedicamentso = (isset($_POST['cantidadMedicamentso'])) ? $_POST['cantidadMedicamentso'] : "";
    $precioCompraMedicamentos = (isset($_POST['precioCompraMedicamentos'])) ? $_POST['precioCompraMedicamentos'] : "";
    $precioVentaMedicamentos = (isset($_POST['precioVentaMedicamentos'])) ? $_POST['precioVentaMedicamentos'] : "";
    $estadoMedicamentos = (isset($_POST['estadoMedicamentos'])) ? $_POST['estadoMedicamentos'] : "";
    $proveedorMedicamentos = (isset($_POST['proveedorMedicamentos'])) ? $_POST['proveedorMedicamentos'] : "";
    $categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : "";
    $fecha_ingreso = (isset($_POST['fecha_ingreso'])) ? $_POST['fecha_ingreso'] : "";
    $fecha_vencimiento = (isset($_POST['fecha_vencimiento'])) ? $_POST['fecha_vencimiento'] : "";
    $unidad_medida = (isset($_POST['unidad_medida'])) ? $_POST['unidad_medida'] : "";
    $numero_estanteria = (isset($_POST['numero_estanteria'])) ? $_POST['numero_estanteria'] : "";
    $nivel_estanteria = (isset($_POST['nivel_estanteria'])) ? $_POST['nivel_estanteria'] : "";
    $posicion_estanteria = (isset($_POST['posicion_estanteria'])) ? $_POST['posicion_estanteria'] : "";

    $fecha_imagen = new DateTime();
    $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : "";

    $tmp_imagen = $_FILES["imagen"]["tmp_name"];

    if ($tmp_imagen != "") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/medicamentos/" . $nombre_archivo_imagen);
    }

    $sentencia = $conexion->prepare("INSERT INTO `medicamentos` (`ID`, `imagen`,  `descripcionMedicamentos`, `lote_Medicamentos`, `cantidadMedicamentso`, `precioCompraMedicamentos`,`precioVentaMedicamentos`, `estadoMedicamentos`, `proveedorMedicamentos`, `categoria`, `fecha_ingreso`,`fecha_vencimiento`, `unidad_medida`, `numero_estanteria`, `nivel_estanteria`, `posicion_estanteria` ) VALUES 
(NULL, :imagen, :descripcionMedicamentos, :lote_Medicamentos, :cantidadMedicamentso, :precioCompraMedicamentos,  :precioVentaMedicamentos, :estadoMedicamentos, :proveedorMedicamentos, :categoria, :fecha_ingreso,  :fecha_vencimiento, :unidad_medida, :numero_estanteria, :nivel_estanteria, :posicion_estanteria);");

    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
    $sentencia->bindParam(":descripcionMedicamentos", $descripcionMedicamentos);
    $sentencia->bindParam(":lote_Medicamentos", $lote_Medicamentos);
    $sentencia->bindParam(":cantidadMedicamentso", $cantidadMedicamentso);
    $sentencia->bindParam(":precioCompraMedicamentos", $precioCompraMedicamentos);
    $sentencia->bindParam(":precioVentaMedicamentos", $precioVentaMedicamentos);
    $sentencia->bindParam(":estadoMedicamentos", $estadoMedicamentos);
    $sentencia->bindParam(":proveedorMedicamentos", $proveedorMedicamentos);
    $sentencia->bindParam(":categoria", $categoria);
    $sentencia->bindParam(":fecha_ingreso", $fecha_ingreso);
    $sentencia->bindParam(":fecha_vencimiento", $fecha_vencimiento);
    $sentencia->bindParam(":unidad_medida", $unidad_medida);
    $sentencia->bindParam(":numero_estanteria", $numero_estanteria);
    $sentencia->bindParam(":nivel_estanteria", $nivel_estanteria);
    $sentencia->bindParam(":posicion_estanteria", $posicion_estanteria);
    $sentencia->execute();
    $mensaje = "Registro agregado con éxito.";
    header("Location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>



<div class="card">
    <div class="card-header">
        Crear Medicamentos 
    </div>
    <div class="card-body">
  

  <form action=""enctype="multipart/form-data" method="post">


  <div class="mb-3">
    <label for="descripcionMedicamentos" class="form-label">Descripcion del Medicamento</label>
    <input type="text" class="form-control" name="descripcionMedicamentos" id="descripcionMedicamentos" aria-describedby="helpId" placeholder="Descripcion del Medicamento" onblur="verificarMedicamentoExistente()">
    <div id="mensajeMedicamentoExistente" class="text-danger"></div>
</div>

<script>
function verificarMedicamentoExistente() {
    var descripcionMedicamento = document.getElementById("descripcionMedicamentos").value;
    if (descripcionMedicamento) {
        $.ajax({
            type: "POST",
            url: "verificar_medicamento_existente.php", // Crea un archivo PHP para manejar la verificación en el servidor.
            data: {
                descripcionMedicamento: descripcionMedicamento
            },
            success: function(response) {
                if (response === "existe") {
                    document.getElementById("mensajeMedicamentoExistente").innerHTML = "El medicamento ya existe. Se actualizará la cantidad.";
                } else {
                    document.getElementById("mensajeMedicamentoExistente").innerHTML = "";
                }
            }
        });
    }
}
</script>
  

<div class="mb-3">
  <label for="lote_Medicamentos" class="form-label">Lote Medicamento</label>
  <input type="text"
    class="form-control" name="lote_Medicamentos" id="lote_Medicamentos" aria-describedby="helpId" placeholder="Lote Medicamento">

</div>


<div class="mb-3">
    <label for="cantidadMedicamentso" class="form-label">Cantidad Medicamento</label>
    <input type="number" step="0.01" class="form-control" name="cantidadMedicamentso" id="cantidadMedicamentso" aria-describedby="helpId" placeholder="Cantidad Medicamento" min="0" oninput="validarNumero(this)">
</div>

<script>
function validarNumero(input) {
    // Elimina caracteres no numéricos y números negativos
    input.value = input.value.replace(/[^0-9.]/g, '');
    
    // Asegúrate de que no se ingresen múltiples puntos decimales
    var decimalCount = (input.value.match(/\./g) || []).length;
    if (decimalCount > 1) {
        input.value = input.value.slice(0, input.value.lastIndexOf('.'));
    }
}
</script>



<div class="mb-3">
    <label for="precioCompraMedicamentos" class="form-label">Precio Compra Medicamento</label>
    <input type="number" step="0.01" class="form-control" name="precioCompraMedicamentos" id="precioCompraMedicamentos" aria-describedby="helpId" placeholder="Precio Compra Medicamento" min="0" oninput="validarNumero(this)">
</div>

<script>
function validarNumero(input) {
    // Elimina caracteres no numéricos y números negativos
    input.value = input.value.replace(/[^0-9.]/g, '');
    
    // Asegúrate de que no se ingresen múltiples puntos decimales
    var decimalCount = (input.value.match(/\./g) || []).length;
    if (decimalCount > 1) {
        input.value = input.value.slice(0, input.value.lastIndexOf('.'));
    }
}
</script>


<div class="mb-3">
    <label for="precioVentaMedicamentos" class="form-label">Precio Venta Medicamento</label>
    <input type="number" step="0.01" class="form-control" name="precioVentaMedicamentos" id="precioVentaMedicamentos" aria-describedby="helpId" placeholder="Precio Venta Medicamento" min="0" onblur="validarPrecioVenta(this)">
</div>

<script>
function validarPrecioVenta(input) {
    // Elimina caracteres no numéricos y números negativos
    input.value = input.value.replace(/[^0-9.]/g, '');
  
    // Asegura que no se ingresen múltiples puntos decimales
    var decimalCount = (input.value.match(/\./g) || []).length;
    if (decimalCount > 1) {
        input.value = input.value.slice(0, input.value.lastIndexOf('.'));
    }

    var precioVenta = parseFloat(input.value);
    var precioCompra = parseFloat(document.getElementById("precioCompraMedicamentos").value);

    if (isNaN(precioCompra)) {
        alert("Ingresa primero el precio de compra.");
        input.value = '';
    } else if (precioVenta < precioCompra) {
        alert("El precio de venta no debe ser menor que el precio de compra.");
        input.value = '';
    }
}
</script>



<div class="mb-3">
  <label for="estadoMedicamentos" class="form-label">Estado del Medicamento</label>
  <select class="form-select" name="estadoMedicamentos" id="estadoMedicamentos" aria-describedby="helpId">
    <option value="Activo">Activo</option>
    <option value="Inactivo">Inactivo</option>
  </select>
</div>



<div class="mb-3">
  <label for="proveedorMedicamentos" class="form-label">Proveedor Medicamento</label>
  <select class="form-select" name="proveedorMedicamentos" id="proveedorMedicamentos" aria-describedby="helpId">
    <option value="Pharma">Pharma</option>
    <option value="Delta">Delta</option>
    <option value="Ophost">Ophost</option>
    <!-- Agrega más opciones según tus necesidades -->
  </select>
</div>



<div class="mb-3">
  <label for="categoria" class="form-label">Categoría</label>
  <select class="form-select" name="categoria" id="categoria" aria-describedby="helpId">
  <option value="Antiinflamatorios">Antiinflamatorios</option>
<option value="Analgésicos">Analgésicos</option>
<option value="Antibióticos">Antibióticos</option>
<option value="Antipiréticos">Antipiréticos</option>


  </select>
</div>



<div class="mb-3">
  <label for="fecha_ingreso" class="form-label">Fecha Ingreso</label>
  <input type="date"
    class="form-control" name="fecha_ingreso" id="fecha_ingreso" aria-describedby="helpId" placeholder="Fecha Ingreso" min="<?php echo date('Y-m-d'); ?>">
</div>

<div class="mb-3">
  <label for="fecha_vencimiento" class="form-label">Fecha Vencimiento</label>
  <input type="date"
    class="form-control" name="fecha_vencimiento" id="fecha_vencimiento" aria-describedby="helpId" placeholder="Fecha Vencimiento">

</div>


<div class="mb-3">
  <label for="unidad_medida" class="form-label">Unidad de Medida</label>
  <select class="form-select" name="unidad_medida" id="unidad_medida" aria-describedby="helpId">
    <option value="Tabletas">Tabletas</option>
    <option value="Cápsulas">Cápsulas</option>
    <option value="Mililitros (ml)">Mililitros (ml)</option>
    <option value="Miligramos (mg)">Miligramos (mg)</option>
    <option value="Gramos (g)">Gramos (g)</option>
    <option value="Oz (Onzas)">Oz (Onzas)</option>
    <option value="Supositorios">Supositorios</option>
    <option value="Gotas">Gotas</option>
    <option value="Unidades">Unidades</option>
    <option value="UI (Unidades Internacionales)">UI (Unidades Internacionales)</option>
    
  </select>
</div>

<div class="mb-3">
  <label for="numero_estanteria" class="form-label">Número de Estantería</label>
  <select class="form-select" name="numero_estanteria" id="numero_estanteria" aria-describedby="helpId">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    
  </select>
</div>


<div class="mb-3">
  <label for="nivel_estanteria" class="form-label">Nivel de Estantería</label>
  <select class="form-select" name="nivel_estanteria" id="nivel_estanteria" aria-describedby="helpId">
    <option value="1">Nivel 1</option>
    <option value="2">Nivel 2</option>
    <option value="3">Nivel 3</option>
    <option value="4">Nivel 4</option>
    <option value="5">Nivel 5</option>
    <option value="6">Nivel 6</option>
    <option value="7">Nivel 7</option>
    <option value="8">Nivel 8</option>
    <option value="9">Nivel 9</option>
    <option value="10">Nivel 10</option>
   
  </select>
</div>


<div class="mb-3">
  <label for="posicion_estanteria" class="form-label">Posición en Estantería</label>
  <select class="form-select" name="posicion_estanteria" id="posicion_estanteria" aria-describedby="helpId">
    <option value="1">Posición 1</option>
    <option value="2">Posición 2</option>
    <option value="3">Posición 3</option>
    <option value="4">Posición 4</option>
    <option value="5">Posición 5</option>
    <option value="6">Posición 6</option>
    <option value="7">Posición 7</option>
    <option value="8">Posición 8</option>
    <option value="9">Posición 9</option>
    <option value="10">Posición 10</option>
    
  </select>
</div>




<button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php
include("../../templates/footer.php");
?>