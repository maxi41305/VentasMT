
<?php 

class proveedor{

    public function agregaProveedor($datos){
        $c= new conectar();
        $conexion=$c->conexion();
        $telefono = $datos[3];
        $borrado=0;
        $nombreProveedor=$datos[1];
        $resultado=self::validarNombreproveedor($nombreProveedor);
		if($resultado==0){

        $telefonoresultado=self::validartelefono($telefono);
					if($telefonoresultado==0){
        
        $sql="INSERT into proveedores(id_usuario,
                                    nombreproveedor,
                                    direccion,
                                    borrado,
                                    telefono)
                    values ('$datos[0]',
                            '$datos[1]',
                            '$datos[2]',
                            '$borrado',
                            '$datos[3]')";

        return mysqli_query($conexion,$sql);
    }else{
        return 2;
    
        }
    }else{

        $resultadoU=self::validarnombrepapelera($nombreProveedor);
			if($resultadoU==1){
				return 3;		
			}else{
				return 4;
			}
    }
}

public function restaurarProveedor($idproveedor){
    $c= new conectar();
    $conexion=$c->conexion();
    
    $sql="UPDATE proveedores SET borrado=0 WHERE nombreproveedor='$idproveedor'";
    return mysqli_query($conexion,$sql);

}
    public function validartelefono($telefono){
        $c=new conectar();
        $conexion=$c->conexion();

        $sql="SELECT * from proveedores where telefono='$telefono'";
        $result=mysqli_query($conexion,$sql);
        
        if(mysqli_num_rows($result) == 0){
    
                return 0;
           }else{
            return 1;
        }
    }

    public function actualizaProveedor($datos){
        $c= new conectar();
        $conexion=$c->conexion();
        $nombree=$datos[2];
        $telefono=$datos[4];
        $resultado=self::buscartelefono($datos[1]);
        $nombreresultado=self::buscarnombre($datos[1]);
        $telefonoresultado=self::validartelefono($telefono);
        $nombreeresultado=self::validarnombre($nombree);
        $bandera=0;

if($telefono== $resultado){
    if( $nombree==$nombreresultado){
        $bandera=1;
    }else{ 
    
        if( $nombreeresultado>0){
        return 4;
        //nombre repetido
    }else{
        $bandera=1;
    }
}

}else { 

    if( $telefonoresultado>0){
    return 5;
    //telefono repetido
}else{ 
    if($nombree==$nombreresultado){
        $bandera=1;
}else {
    
    if($nombreeresultado>0){
    return 4;
    //nombre repetido

}else{
    $bandera=1;
}
}
}
}
if( $bandera==1){
    $sql="UPDATE proveedores set id_usuario='$datos[0]',
    nombreproveedor='$datos[2]',
    direccion='$datos[3]',
    telefono='$datos[4]'
    where id_proveedor='$datos[1]'";
    return mysqli_query($conexion,$sql);
}

}


public function buscartelefono($id_proveedor){
    $c=new conectar();
    $conexion=$c->conexion();
    $sql="SELECT telefono from proveedores where id_proveedor='$id_proveedor'";
    $result=mysqli_query($conexion,$sql);

    
    $ver=mysqli_fetch_row($result);

    $datos=$ver[0];
    return $datos;
}


    public function eliminaProveedor($id){
        $c= new conectar();
        $conexion=$c->conexion();

        $resultado=self::veruso($id);
        if($resultado==0){

        
        $sql="UPDATE proveedores SET borrado = 1 WHERE proveedores.id_proveedor = '$id'";
        return mysqli_query($conexion,$sql);
    
    
    }else{
        return 3;
    }
    
}
public function veruso($id){
    $c=new conectar();
    $conexion=$c->conexion();

    $sql="SELECT * from articulos where id_proveedor='$id'";
    $result=mysqli_query($conexion,$sql);
    
    if(mysqli_num_rows($result) == 0){

            return 0;
       }else{
        return 1;
    }
}
    
    
    
    public function validarnombre($nombre){
        $c=new conectar();
        $conexion=$c->conexion();

        $sql="SELECT * from proveedores where nombreproveedor='$nombre'";
        $result=mysqli_query($conexion,$sql);
        
        if(mysqli_num_rows($result) == 0){
    
                return 0;
           }else{
            return 1;
        }
    }
    public function buscarnombre($id_proveedor){
        $c=new conectar();
        $conexion=$c->conexion();
        $sql="SELECT nombreproveedor from proveedores where id_proveedor='$id_proveedor'";
        $result=mysqli_query($conexion,$sql);
    
        
        $ver=mysqli_fetch_row($result);
    
        $datos=$ver[0];
        return $datos;
    }
    public function validarNombreproveedor($nombreProveedor){
        $c=new conectar();
        $conexion=$c->conexion();

        $sql="SELECT * from proveedores where nombreproveedor='$nombreProveedor'";
        $result=mysqli_query($conexion,$sql);
        
        if(mysqli_num_rows($result) == 0){
    
                return 0;
           }else{
            return 1;
        }
    }

    public function validarnombrepapelera($nombreProveedor){
        $c=new conectar();
        $conexion=$c->conexion();

        $sql="SELECT * from proveedores where nombreproveedor='$nombreProveedor' and borrado=1";
        $result=mysqli_query($conexion,$sql);
        
        if(mysqli_num_rows($result) == 0){
    
                return 0;
           }else{
            return 1;
        }
    }
}

?>