<?php 

class ventas{



	public function obtenDatosArticulobarra($codigobarra){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql = "SELECT 
				    art.nombre,
				    art.descripcion,
				    art.cantidad,
				    img.ruta,
				    art.precio
				FROM
				    articulos AS art
				        INNER JOIN
				    imagenes AS img ON art.id_imagen = img.id_imagen
				        AND art.idCodigoBarra = '$codigobarra'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$d=explode('/', $ver[3]);

		$img=$d[1].'/'.$d[2].'/'.$d[3];

		$data=array(
			'nombre' => $ver[0],
			'descripcion' => $ver[1],
			'cantidad' => $ver[2],
			'ruta' => $img,
			'precio' => $ver[4]
		);		
		return $data;
	}

	public function crearVenta(){
		$c= new conectar();
		$conexion=$c->conexion();

		$fecha=date('Y-m-d');
		$idventa=self::creaFolio();
		$datos=$_SESSION['tablaComprasTemp'];
		$idusuario=$_SESSION['iduser'];
		$r=0;
		$cantidad=1;
		
		for ($i=0; $i < count($datos) ; $i++) { 
			$d=explode("||", $datos[$i]);
			
			$sql="INSERT into detalle_venta (id_producto,
										id_venta,
										cantidad,
										precio)
							values ('$d[0]',
									'$idventa',
									'$cantidad',
									'$d[3]')";
			$r=$r + $result=mysqli_query($conexion,$sql);
			$total=$d[3]+ $total;
			self::descuentaCantidad($d[0],1);
			$idcliente=$d[5];

		}
		self::insertarventa($idventa,$idcliente,$idusuario,$fecha,$total);

		return $r;
	}
	
	public function insertarventa($idventa,$idcliente,$idusuario,$fecha,$total){
		$c= new conectar();
		$conexion=$c->conexion();
		
		$sql="INSERT into ventas (id_venta,
										id_cliente,
										id_usuario,
										fechaCompra,
										total)
							values ('$idventa',
									'$idcliente',
									'$idusuario',
									'$fecha',
									'$total')";
			mysqli_query($conexion,$sql);



	}

public function descuentaCantidad($idproducto,$cantidad){ 
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="SELECT cantidad
				from articulos
				where idCodigoBarra='$idproducto'"; 
		
		$result=mysqli_query($conexion,$sql);
		$cantidad1=mysqli_fetch_row($result)[0];
		$cantidadNueva=abs($cantidad - $cantidad1);
		
		$sqll="UPDATE articulos set cantidad='$cantidadNueva' 
				where idCodigoBarra='$idproducto'";
		
		mysqli_query($conexion,$sqll);
	}

	public function creaFolio(){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="SELECT id_venta from ventas group by id_venta desc";

		$resul=mysqli_query($conexion,$sql);
		$id=mysqli_fetch_row($resul)[0];

		if($id=="" or $id==null or $id==0){
			return 1;
		}else{
			return $id + 1;
		}
	}
	public function nombreCliente($idCliente){
		$c= new conectar();
		$conexion=$c->conexion();

		 $sql="SELECT apellido,nombre 
			from usuarios 
			where id_usuario='$idCliente'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		return $ver[0]." ".$ver[1];
	}

	public function obtenerTotal($idventa){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="SELECT precio 
				from detalle_venta 
				where id_venta='$idventa'";
		$result=mysqli_query($conexion,$sql);

		$total=0;

		while($ver=mysqli_fetch_row($result)){
			$total=$total + $ver[0];
		}

		return $total;
}
}
	?>