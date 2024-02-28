package Grupo2.Proyecto.dao;

import Grupo2.Proyecto.domain.Galeria;
import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;


public interface GaleriaDao extends JpaRepository<Galeria,Long>{

    //Ejemplo de método utilizando Consultas con JPQL
    @Query("SELECT a FROM Galeria a WHERE (:nombre IS NULL OR a.nomDiseno LIKE %:nombre%) AND a.tipoDiseno = :tipo ORDER BY a.nomDiseno ASC")
    public List<Galeria> JQPLConsultaNombreTipo(@Param("nombre") String nombre, @Param("tipo") String tipo);

}
