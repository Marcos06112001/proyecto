/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package Grupo2.Proyecto.service;

import Grupo2.Proyecto.domain.MetodosPagUsuario;
import java.util.List;

/**
 *
 * @author jjvar
 */
public interface MetodosPagUsuarioService {
    
    List<MetodosPagUsuario> findByCorreo(String correo);
    
    // Se declara uin metodo para obtener un ArrayList de los objetos de Categoria  
    public List<MetodosPagUsuario> getMetodosPagUsuarios(boolean activos);
    
    //Metodos del CRUD
    
    // Se obtiene un Categoria, a partir del id de un categoria
    public MetodosPagUsuario getMetodosPagUsuario(MetodosPagUsuario metodospagusuario);
    
    // Se inserta un nuevo categoria si el id del categoria esta vacío
    // Se actualiza un categoria si el id del categoria NO esta vacío
    public void save(MetodosPagUsuario metodospagusuario);
    
    // Se elimina el categoria que tiene el id pasado por parámetro
    public void delete(MetodosPagUsuario metodospagusuario);
}
