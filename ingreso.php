<?php
include("DB.php");

$departamento = (isset($_POST['departamento'])) ? $_POST['departamento'] : '';
$provincia = (isset($_POST['provincia'])) ? $_POST['provincia'] : '';
$distrito = (isset($_POST['distrito'])) ? $_POST['distrito'] : '';
$dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
$tipo_ayuda = (isset($_POST['tipo_ayuda'])) ? $_POST['tipo_ayuda'] : '';
$calificacion_ayuda = (isset($_POST['calificacion_ayuda'])) ? $_POST['calificacion_ayuda'] : '';
$llego_estimado = (isset($_POST['llego_estimado'])) ? $_POST['llego_estimado'] : '';
$nivel_emergencia = (isset($_POST['nivel_emergencia'])) ? $_POST['nivel_emergencia'] : '';
$necesidad = (isset($_POST['necesidad'])) ? $_POST['necesidad'] : '';
$problema = (isset($_POST['problema'])) ? $_POST['problema'] : '';
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : '';



echo $departamento."<br/>";
echo $provincia."<br/>";
echo $distrito."<br/>";
echo $dni."<br/>";
echo $tipo_ayuda."<br/>";
echo $calificacion_ayuda."<br/>";
echo $llego_estimado."<br/>";
echo $nivel_emergencia."<br/>";
echo $necesidad."<br/>";
echo $problema."<br/>";

switch ($accion) {
    case 'Enviar':
        $senSQL = $conexion->prepare("INSERT INTO satisfaccion_encuesta (departamento, provincia, distrito, dni, tipo_ayuda, calificacion_ayuda, llego_estimado, nivel_emergencia, necesidad, problema) VALUES (:departamento, :provincia, :distrito, :dni , :helpType, :question1, :question2, :question3, :question4, :question5);");
        $senSQL->bindParam(':departamento', $departamento);
        $senSQL->bindParam(':provincia', $provincia);
        $senSQL->bindParam(':distrito', $distrito);
        $senSQL->bindParam(':dni', $dni);
        $senSQL->bindParam(':helpType', $tipo_ayuda);
        $senSQL->bindParam(':question1', $calificacion_ayuda);
        $senSQL->bindParam(':question2', $llego_estimado);
        $senSQL->bindParam(':question3', $nivel_emergencia);
        $senSQL->bindParam(':question4', $necesidad);
        $senSQL->bindParam(':question5', $problema);
        $senSQL->execute();
        break;
}


$senSQL = $conexion->prepare("SELECT * FROM satisfaccion_encuesta");
$senSQL->execute();
$listaMapa = $senSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include('mapa.html')?>


