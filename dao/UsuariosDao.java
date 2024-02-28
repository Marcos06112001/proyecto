package Grupo2.Proyecto.dao;

import Grupo2.Proyecto.domain.Usuarios;
import org.springframework.data.jpa.repository.JpaRepository;


public interface UsuariosDao extends JpaRepository<Usuarios,String>{

    Usuarios findByCorreo(String correo);
}
