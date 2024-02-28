package Grupo2.Proyecto.domain;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.OneToMany;
import jakarta.persistence.Table;
import java.io.Serializable;
import java.util.List;
import lombok.Data;

@Data
@Entity
@Table(name="tab_usuarios")

//Serialización funciona par aalmacenar ciertos datos en la RAM
public class Usuarios implements Serializable{
   
    private static final long serialVersionUID = 1L; //Para poder hacer el ciclo de la sumatoria del IdCategoria
    
    @Id // Es la PK de la tabla
    @Column(name = "correo")//Idemtifica la columna para encontrar la tabla
    private String correo;
    private String contrasena;
    private String nombre;
    @Column(name = "apellido_1")
    private String apellido1;
    @Column(name = "apellido_2")
    private String apellido2;
    private String rutaImagen;
    
    
    @OneToMany
    @JoinColumn(name="correo", updatable=false)
    List<Foro> foros;
    
    public Usuarios() {
    }

    public Usuarios(String correo, String contrasena, String nombre, String apellido1, String apellido2, String rutaImagen) {
    this.correo = correo;
    this.contrasena = contrasena;
    this.nombre = nombre;
    this.apellido1 = apellido1;
    this.apellido2 = apellido2;
    this.rutaImagen = rutaImagen;
}

    
}
