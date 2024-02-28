package Grupo2.Proyecto.controller;

import Grupo2.Proyecto.domain.Usuarios;
import Grupo2.Proyecto.service.UsuariosService;
import Grupo2.Proyecto.service.impl.FireBaseStorageServiceImpl;
import jakarta.servlet.http.HttpSession;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;

@Controller
@Slf4j
@RequestMapping("")
public class UsuariosController {

    @Autowired
    private UsuariosService usuarioService;

    @PostMapping("/login")
    public String inicio(@RequestParam("correo") String correo, @RequestParam("pass") String pass, HttpSession session) {
        if (!correo.isEmpty() && !pass.isEmpty()) {
            Usuarios user = usuarioService.findByCorreo(correo);
            if (user != null) {
                if (user.getContrasena().equals(pass)) {
                    session.setAttribute("correoGlobal", correo);
                    return "redirect:/menuprincipal";
                } else {
                    return "redirect:/";
                }
            } else {
                return "redirect:/";
            }
        } else {
            return "redirect:/";
        }

    }

    @Autowired
    private FireBaseStorageServiceImpl firebaseStorageService;

    @GetMapping("/registrar")
    public String mostrarPerfil() {
        return "registrarse";
    }

    @PostMapping("/register")
    public String registrar(@RequestParam("correoR") String correo, @RequestParam("contrasenna") String pass, @RequestParam("contrasennaR") String passR, @RequestParam("nombre") String nombre, @RequestParam("apellido1") String ape1, @RequestParam("apellido2") String ape2) { //Agregar los valores que se solicitan en el form  //Validar que las contras sean las mismas
        if (pass.equals(passR)) {
            Usuarios usuarios = new Usuarios(correo, pass, nombre, ape1, ape2,null);
            usuarioService.save(usuarios);
            return "redirect:/";
        } else {
            return "registrarse";
        }

    }
}
