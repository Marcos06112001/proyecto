package Grupo2.Proyecto.dao;

import Grupo2.Proyecto.domain.Encargos;
import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;


public interface EncargosDao extends JpaRepository<Encargos,Integer>{

        List<Encargos> findByCorreo(String correo);
}
