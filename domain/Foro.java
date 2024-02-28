package Grupo2.Proyecto.domain;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.OneToOne;
import jakarta.persistence.Table;
import java.io.Serializable;
import lombok.Data;

@Data
@Entity
@Table(name="tab_foro")

//Serialización funciona par aalmacenar ciertos datos en la RAM
public class Foro implements Serializable{
   
    private static final long serialVersionUID = 1L; //Para poder hacer el ciclo de la sumatoria del IdCategoria
    
    @Id // Es la PK de la tabla
    @GeneratedValue(strategy = GenerationType.IDENTITY)//Los valores generados que tipo de estrategia utilizan BD == Clase
    @Column(name = "cod_comentario")//Idemtifica la columna para encontrar la tabla
    private int codComentario;
    private String correo;
    private String comentario;
 
    @ManyToOne
    @JoinColumn(name="correo",insertable=false,updatable=false)
    Usuarios usuarios;
    
    
    
    public Foro() {
    }

    public Foro(int codComentario, String correo, String comentario) {
        this.codComentario = codComentario;
        this.correo = correo;
        this.comentario = comentario;
    }
 
}
