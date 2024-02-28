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
@RequestMapping("/perfil")
public class PerfilController {
    
    @Autowired
    private UsuariosService usuariosService;

    @GetMapping
    public String mostrarPerfil(Model model, HttpSession session) {
        String correo = (String) session.getAttribute("correoGlobal");
        var usr = usuariosService.findByCorreo(correo);
         model.addAttribute("usuario", usr);
        return "perfil/index";
    }
    
    @GetMapping("/modificar/")
    public String perfilModificar(Model model, HttpSession session) {
        String correo = (String) session.getAttribute("correoGlobal");
        var usr = usuariosService.findByCorreo(correo);
         model.addAttribute("usuario", usr);
        return "/perfil/modifica";
    }
    /*
    @PostMapping("/guardar")
    public String categoriaGuardar(Usuarios categoria,
            @RequestParam("imagenFile") MultipartFile imagenFile) {        
        if (!imagenFile.isEmpty()) {
            categoriaService.save(categoria);
            categoria.setRutaImagen(
                    firebaseStorageService.cargaImagen(
                            imagenFile, 
                            "categoria", 
                            categoria.getIdUsuarios()));
        }
        categoriaService.save(categoria);
        return "redirect:/categoria/listado";
    }*/

    
}