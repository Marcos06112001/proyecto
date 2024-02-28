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
@Table(name="tab_direcciones_usuario")

//Serialización funciona par aalmacenar ciertos datos en la RAM
public class DireccionesUsuario implements Serializable{
   
    private static final long serialVersionUID = 1L; //Para poder hacer el ciclo de la sumatoria del IdCategoria
    
    @Id // Es la PK de la tabla
    @GeneratedValue(strategy = GenerationType.IDENTITY)//Los valores generados que tipo de estrategia utilizan BD == Clase
    @Column(name = "cod_direccion")//Idemtifica la columna para encontrar la tabla
    private int codDireccion;
    private String correo;
    private String desDireccion;
  
    
    public DireccionesUsuario() {
    }

    public DireccionesUsuario(int codDireccion, String correo, String desDireccion) {
        this.codDireccion = codDireccion;
        this.correo = correo;
        this.desDireccion = desDireccion;
    }


    
    
  
    
    
}
