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
@Table(name="tab_facturacion")

//Serialización funciona par aalmacenar ciertos datos en la RAM
public class Facturacion implements Serializable{
   
    private static final long serialVersionUID = 1L; //Para poder hacer el ciclo de la sumatoria del IdCategoria
    
    @Id // Es la PK de la tabla
    @GeneratedValue(strategy = GenerationType.IDENTITY)//Los valores generados que tipo de estrategia utilizan BD == Clase
    @Column(name = "num_tarjeta")//Idemtifica la columna para encontrar la tabla
    private String numTarjeta;
    private String pais;
    private String correo;
    private int codPostal;
    private String telefono;
    private String correoDest;
    
    public Facturacion() {
    }

    public Facturacion(String numTarjeta, String pais, String correo, int codPostal, String telefono, String correoDest) {
        this.numTarjeta = numTarjeta;
        this.pais = pais;
        this.correo = correo;
        this.codPostal = codPostal;
        this.telefono = telefono;
        this.correoDest = correoDest;
    }

   
    
    
  
    
    
}
