package Grupo2.Proyecto.dao;

import Grupo2.Proyecto.domain.Facturacion;
import org.springframework.data.jpa.repository.JpaRepository;


public interface FacturacionDao extends JpaRepository<Facturacion,String>{

    
}
