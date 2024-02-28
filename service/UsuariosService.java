package Grupo2.Proyecto.service;

import Grupo2.Proyecto.domain.Usuarios;
import java.util.List;


public interface UsuariosService { 
    
    // Se declara uin metodo para obtener un ArrayList de los objetos de Usuarios  
    public List<Usuarios> getUsuarioss(boolean activos);
    
    //Metodos del CRUD
    
    // Se obtiene un Usuarios, a partir del id de un categoria
    public Usuarios getUsuarios(Usuarios usuario);
    
    // Se inserta un nuevo categoria si el id del categoria esta vacío
    // Se actualiza un categoria si el id del categoria NO esta vacío
    public void save(Usuarios usuarios);
    
    // Se elimina el categoria que tiene el id pasado por parámetro
    public void delete(Usuarios usuario);
    
     Usuarios findByCorreo(String correo);
}
