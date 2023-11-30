<?php 

class ventas{

	public function actualizaArticulo($datos){
		$c=new conectar();
		$conexion=$c->conexion();

		$cantidadingresada=$datos[0];
		$stockactual=$datos[2];
		if($cantidadingresada>0){
			if($stockactual >= $cantidadingresada){
				
				$sql="UPDATE tablaarticulo set cantidad='$datos[0]'
				where 	idCodigoBarra='$datos[1]'";
	
	
				return mysqli_query($conexion,$sql);
	
	
			}else{
	
				return 4;
			}

		}else{
			return 5;
		}


	}

	public function eliminaArticulo($idCodigoBarra){
		$c=new conectar();
		$conexion=$c->conexion();
		$codigo=22;
		$sql="DELETE from tablaarticulo 
				where idCodigoBarra='$idCodigoBarra'";
		$result=mysqli_query($conexion,$sql);
		
		return $result;
	}

	public function insertaArticulo($datos){
		$c=new conectar();
		$conexion=$c->conexion();


		$stockactual=$datos[3];
		$cantidad=1;
		$codigobarra=$datos[5];

		$resultadotabla=self::validarCodigobarratabla($codigobarra);
		//con el codigo de barra preguntar si ya no existe en tabla 
		//si existe modificar cantidas sumandole
		if($resultadotabla==0){
			//si no existe 
		
		if($stockactual >= $cantidad){

			$sql= "INSERT into tablaarticulo (rutaimagen,
									nombre,
									descripcion,
									cantidad,
									precio,
									idCodigoBarra,
									stockActual) 
						values ('$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$cantidad',
								'$datos[4]',
								'$datos[5]',
								'$datos[3]')";
		 $result=mysqli_query($conexion,$sql);
			return $result;
		
		}else{
			return 4;
		}
	}else{
		//modificaria cantidad
		$modificacion=self::modificarcantidad($codigobarra,$stockactual);
		return $modificacion;
	}
	
   }
   
   public function modificarcantidad($codigobarra,$stockactual){
   $c= new conectar();
   $conexion=$c->conexion();


   $cantidadactual=self::traercantidad($codigobarra);
   $cantidadactual=$cantidadactual + 1;
	
   if($stockactual >= $cantidadactual){
   
   $sql="UPDATE tablaarticulo set cantidad='$cantidadactual'
   where 	idCodigoBarra='$codigobarra'";


	   $result=mysqli_query($conexion,$sql);
   return $result;
	}else{
		return 5;
	}
}
public function traercantidad($codigobarra){
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="SELECT cantidad from tablaarticulo where 	idCodigoBarra='$codigobarra'";
 
	
		$result=mysqli_query($conexion,$sql);
		$cantidad=mysqli_fetch_row($result)[0];
		return $cantidad;

}

   public function validarCodigobarratabla($codigobarra){
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT * from tablaarticulo where idCodigoBarra='$codigobarra'";
	$result=mysqli_query($conexion,$sql);
	
	if(mysqli_num_rows($result) == 0){

			return 0;
	   }else{
		return 1;
	}
}
	public function obtenDatosArticulobarra($codigobarra){
		$c=new conectar();
		$conexion=$c->conexion();
		
		$barraresultado=self::validarCodigobarra($codigobarra);
		if($barraresultado==0){

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
		if($ver[2]>0){
		
			$data=array(
			'nombre' => $ver[0],
			'descripcion' => $ver[1],
			'cantidad' => $ver[2],
			'ruta' => $img,
			'precio' => $ver[4],
			'codigobarra' => $codigobarra
		);	
		return $data;
	}else{
		return 5;
	}	
}else{
	return 0;
}
	}

	public function validarCodigobarra($codigobarra){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT * from articulos where idCodigoBarra='$codigobarra'";
		$result=mysqli_query($conexion,$sql);
		
		if(mysqli_num_rows($result) == 0){
	
				return 1;
		   }else{
			return 0;
		}
	}


	public function crearVenta($dato){
		$c= new conectar();
		$conexion=$c->conexion();
		//TENGO QUE RECORRER TABLA MSQL
		$idcliente=$dato[0];
		$total=0;
		$fecha=date('Y-m-d');
		$idventa=self::creaFolio();
		$idusuario=$_SESSION['iduser'];
		$r=0;

	$query = "SELECT idCodigoBarra,cantidad,precio FROM tablaarticulo";
	$result = mysqli_query($conexion,$query);
	if (mysqli_num_rows($result) > 0) {
	while($ver=mysqli_fetch_row($result)):
	
		
		$idCodigoBarra=$ver[0];
		$cantidad=$ver[1];
		$precio=$ver[2];
		$preciototal= $precio*$cantidad;
		$sql="INSERT into detalle_venta (id_producto,
										id_venta,
										cantidad,
										precio)
							values ('$idCodigoBarra',
									'$idventa',
									'$cantidad',
									'$preciototal')";
			$resultt=mysqli_query($conexion,$sql);
			$total=$preciototal + $total;
			$r=1;
			self::descuentaCantidad($idCodigoBarra,$cantidad);
	endwhile;

	self::insertarventa($idventa,$idcliente,$idusuario,$fecha,$total);
	$sqll="DELETE FROM id20447177_finalmaxi.tablaarticulo";
	$resulttt=mysqli_query($conexion,$sqll);
	
	return $r;
}else{

	return 5;
}
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
			$result=mysqli_query($conexion,$sql);
		return $result;
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