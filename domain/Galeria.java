package Grupo2.Proyecto.domain;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import java.io.Serializable;
import lombok.Data;

@Data
@Entity
@Table(name="tab_galeria")

//Serialización funciona par aalmacenar ciertos datos en la RAM
public class Galeria implements Serializable{
   
    private static final long serialVersionUID = 1L; //Para poder hacer el ciclo de la sumatoria del IdCategoria
    
    @Id // Es la PK de la tabla
    @GeneratedValue(strategy = GenerationType.IDENTITY)//Los valores generados que tipo de estrategia utilizan BD == Clase
    @Column(name = "cod_diseno")//Idemtifica la columna para encontrar la tabla
    private long codDiseno;
    @Column(name = "nom_diseno")
    private String nomDiseno;
    @Column(name = "des_diseno")
    private String desDiseno;
    @Column(name = "tipo_diseno")
    private String tipoDiseno;
    private String rutaImagen;
   
    
    
    
    
    
    public Galeria() {
    }

    public Galeria(long codDiseno, String nomDiseno, String desDiseno, String tipoDiseno) {
        this.codDiseno = codDiseno;
        this.nomDiseno = nomDiseno;
        this.desDiseno = desDiseno;
        this.tipoDiseno = tipoDiseno;
    }

    

    
    
    
  
    
    
}
