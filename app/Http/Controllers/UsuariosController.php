<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\User;
use Illuminate\Support\Facades\Validator;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class UsuariosController extends Controller
{
 

public function form_nuevo_usuario(){
    //carga el formulario para agregar un nuevo usuario
    $roles=Role::all();
    return view("formularios.form_nuevo_usuario")->with("roles",$roles);

}


public function form_nuevo_rol(){
    //carga el formulario para agregar un nuevo rol
    $roles=Role::all();
    return view("formularios.form_nuevo_rol")->with("roles",$roles);
}

public function form_nuevo_permiso(){
    //carga el formulario para agregar un nuevo permiso
     $roles=Role::all();
     $permisos=Permission::all();
    return view("formularios.form_nuevo_permiso")->with("roles",$roles)->with("permisos", $permisos);
}



public function listado_usuarios(){
    //presenta un listado de usuarios paginados de 100 en 100
	$usuarios=User::paginate(5);
	return view("listados.listado_usuarios")->with("usuarios",$usuarios);
}
public function listado_Roles(){
    //presenta un listado de roles paginados de 100 en 100
  $roles=Role::paginate(5);
  return view("listados.listado_roles")->with("roles",$roles);
}

public function listado_Permisos(){
    //presenta un listado de roles paginados de 100 en 100
  $roles=Role::all();
  $permisos=Permission::paginate(5);
  return view("listados.listado_permisos")->with("roles",$roles)->with("permisos", $permisos);
}




public function crear_usuario(Request $request){
    //crea un nuevo usuario en el sistema

	$reglas=[  'password' => 'required|min:6',
	             'email' => 'required|email|unique:users', ];
	 
	$mensajes=[  'password.min' => 'La contraseña debe tener al menos 6 caracteres',
	             'email.unique' => 'El correo ya se encuentra registrado en la base de datos', ];
	  
	$validator = Validator::make( $request->all(),$reglas,$mensajes );
	if( $validator->fails() ){ 
	  	return redirect('form_nuevo_usuario')->withInput(
    $request->except('password'))->with("msj","...Existen errores...")->withErrors($validator->errors());         
	}

	$usuario=new User;
  $usuario->name=strtoupper( $request->input("name")." ".$request->input("lastname") ) ;
  $usuario->name=strtoupper( $request->input("name") ) ;
    $usuario->lastname=strtoupper( $request->input("lastname") ) ;
  $usuario->telefhone=$request->input("telefhone");
	$usuario->email=$request->input("email");
	$usuario->password= bcrypt( $request->input("password") ); 
 
            
    if($usuario->save())
    {

  
       return redirect('form_nuevo_usuario')->with('status', 'Usuario Agregado!');
    }
   

}



public function crear_rol(Request $request){

   $rol=new Role;
   $rol->name=$request->input("rol_nombre") ;
   $rol->slug=$request->input("rol_slug") ;
   $rol->description=$request->input("rol_descripcion") ;
    if($rol->save())
    {
        return redirect('form_nuevo_rol')->with('status', 'Rol Agregado!');
    }
    else
    {
      return redirect('form_nuevo_rol')->with('status', 'Problema para agregar rol!');
    }
}




public function crear_permiso(Request $request){

  
   


}

public function asignar_permiso(Request $request){



     $roleid=$request->input("rol_sel");
     $idper=$request->input("permiso_rol");
     $rol=Role::find($roleid);
     $rol->assignPermission($idper);
    
    if($rol->save())
    {
        return redirect('form_nuevo_permiso')->with('status', 'Permiso  Agregado!');
    }
    else
    {
        return redirect('form_nuevo_permiso')->with('status', 'Problema para agregar permiso');
    }



}



public function form_editar_usuario($id){
    $usuario=User::find($id);
    $roles=Role::all();
    return view("formularios.form_editar_usuario")->with("usuario",$usuario)
	                                              ->with("roles",$roles);                                 
}

public function editar_usuario(Request $request){
          
    $idusuario=$request->input("id_usuario");
    $usuario=User::find($idusuario);
    $usuario->name=strtoupper( $request->input("name") ) ;
    $usuario->apellidos=strtoupper( $request->input("lastname") ) ;
    $usuario->telefono=$request->input("telefhone");
    
     if($request->has("rol")){
	    $rol=$request->input("rol");
	    $usuario->revokeAllRoles();
	    $usuario->assignRole($rol);
     }
	 
    if( $usuario->save()){
		return view("mensajes.msj_usuario_actualizado")->with("msj","Usuario actualizado correctamente")
	                                                   ->with("idusuario",$idusuario) ;
    }
    else
    {
		return view("mensajes.mensaje_error")->with("msj","..Hubo un error al agregar ; intentarlo nuevamente..");
    }
}


public function buscar_usuario(Request $request){
	$dato=$request->input("dato_buscado");
	$usuarios=User::where("name","like","%".$dato."%")->orwhere("lastname","like","%".$dato."%")                                              ->paginate(100);
	return view('listados.listado_usuarios')->with("usuarios",$usuarios);
      }




public function borrar_usuario(Request $request){

   
        $idusuario=$request->input("id_usuario");
        $usuario=User::find($idusuario);
    
        if($usuario->delete()){
             return view("mensajes.msj_usuario_borrado")->with("msj","Usuario borrado correctamente") ;
        }
        else
        {
            return view("mensajes.mensaje_error")->with("msj","..Hubo un error al agregar ; intentarlo nuevamente..");
        }
        
     
}

public function editar_acceso(Request $request){
         $idusuario=$request->input("id_usuario");
         $usuario=User::find($idusuario);
         $usuario->email=$request->input("email");
         $usuario->password= bcrypt( $request->input("password") ); 
          if( $usuario->save()){
        return view("mensajes.msj_usuario_actualizado")->with("msj","Usuario actualizado correctamente")->with("idusuario",$idusuario) ;
         }
          else
          {
        return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ; intentarlo nuevamente ...") ;
          }
}



public function asignar_rol($idusu,$idrol){

        $usuario=User::find($idusu);
        $usuario->assignRole($idrol);

        $usuario=User::find($idusu);
        $rolesasignados=$usuario->getRoles();
        
        return json_encode ($rolesasignados);


}


public function quitar_rol($idusu,$idrol){

    $usuario=User::find($idusu);
    $usuario->revokeRole($idrol);
    $rolesasignados=$usuario->getRoles();
    return json_encode ($rolesasignados);


}


public function form_borrado_usuario($id){
  $usuario=User::find($id);
  return view("confirmaciones.form_borrado_usuario")->with("usuario",$usuario);

}


public function quitar_permiso($idrole,$idper){ 
    
    $role = Role::find($idrole);
    $role->revokePermission($idper);
    $role->save();

    return "ok";
}


public function borrar_rol($idrole){

    $role = Role::find($idrole);
    $role->delete();
    return "ok";
}

}
