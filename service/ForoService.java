/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package Grupo2.Proyecto.service;

import Grupo2.Proyecto.domain.Foro;
import java.util.List;

/**
 *
 * @author jjvar
 */
public interface ForoService {
     // Se declara uin metodo para obtener un ArrayList de los objetos de Categoria  
    public List<Foro> getForos();
    
    //Metodos del CRUD
    
    // Se obtiene un Categoria, a partir del id de un categoria
    public Foro getForo(Foro foro);
    
    // Se inserta un nuevo categoria si el id del categoria esta vacío
    // Se actualiza un categoria si el id del categoria NO esta vacío
    public void save(Foro foro);
    
    // Se elimina el categoria que tiene el id pasado por parámetro
    public void delete(Foro foro);
}
