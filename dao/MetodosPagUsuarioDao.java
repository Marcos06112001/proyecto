package Grupo2.Proyecto.dao;

import Grupo2.Proyecto.domain.Encargos;
import Grupo2.Proyecto.domain.MetodosPagUsuario;
import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;


public interface MetodosPagUsuarioDao extends JpaRepository<MetodosPagUsuario,String>{

    List<MetodosPagUsuario> findByCorreo(String correo);
}
