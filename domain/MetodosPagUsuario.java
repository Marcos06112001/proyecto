package Grupo2.Proyecto.domain;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import java.io.Serializable;
import java.util.Date;
import lombok.Data;

@Data
@Entity
@Table(name="tab_metodos_pag_usuario")

//Serialización funciona par aalmacenar ciertos datos en la RAM
public class MetodosPagUsuario implements Serializable{
   
    private static final long serialVersionUID = 1L; //Para poder hacer el ciclo de la sumatoria del IdCategoria
    
    @Id // Es la PK de la tabla
    @GeneratedValue(strategy = GenerationType.IDENTITY)//Los valores generados que tipo de estrategia utilizan BD == Clase
    @Column(name = "num_tarjeta")//Idemtifica la columna para encontrar la tabla
    private String numTarjeta;
    private String correo;
    private String nombreTitular;
    private Date fecVencimiento;
    private int codSeguridad;
    
    public MetodosPagUsuario() {
    }

    public MetodosPagUsuario(String numTarjeta, String correo, String nombreTitular, Date fecVencimiento, int codSeguridad) {
        this.numTarjeta = numTarjeta;
        this.correo = correo;
        this.nombreTitular = nombreTitular;
        this.fecVencimiento = fecVencimiento;
        this.codSeguridad = codSeguridad;
    }


    
    
  
    
    
}
