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
@Table(name="tab_encargos")

//Serialización funciona par aalmacenar ciertos datos en la RAM
public class Encargos implements Serializable{
   
    private static final long serialVersionUID = 1L; //Para poder hacer el ciclo de la sumatoria del IdCategoria
    
    @Id // Es la PK de la tabla
    @GeneratedValue(strategy = GenerationType.IDENTITY)//Los valores generados que tipo de estrategia utilizan BD == Clase
    @Column(name = "cod_encargo")//Idemtifica la columna para encontrar la tabla
    private int codEncargo;
    private String correo;
    private String nomDiseno;
    private String desDiseno;
    private String tamDiseno;
    private Double precioDiseno;
    private String rutaImagen;
    private String indEstado;
    private String indPagado;
    private String indExpress;
    private String codDireccionDest;
    
    public Encargos() {
    }

    public Encargos(int codEncargo, String correo, String nomDiseno, String desDiseno, String tamDiseno, Double precioDiseno, String indEstado, String indPagado, String indExpress, String codDireccionDest) {
        this.codEncargo = codEncargo;
        this.correo = correo;
        this.nomDiseno = nomDiseno;
        this.desDiseno = desDiseno;
        this.tamDiseno = tamDiseno;
        this.precioDiseno = precioDiseno;
        this.indEstado = indEstado;
        this.indPagado = indPagado;
        this.indExpress = indExpress;
        this.codDireccionDest = codDireccionDest;
    }

  
    
    
  
    
    
}
