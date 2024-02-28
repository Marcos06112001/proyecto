package Grupo2.Proyecto.controller;

import Grupo2.Proyecto.domain.Foro;
import Grupo2.Proyecto.domain.Usuarios;
import Grupo2.Proyecto.service.ForoService;
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
@RequestMapping("/foro")
public class ForoController {
    
    @Autowired
    private ForoService foroService;
    
    @Autowired
    private UsuariosService usuariosService;

    @GetMapping
    public String mostrarPerfil(Model model, HttpSession session) {
        var comentarios = foroService.getForos();

        String correo = (String) session.getAttribute("correoGlobal");
        var search = new Usuarios(correo,"", "", "", "",null);
        var usuarioBuscado = usuariosService.getUsuarios(search);
        model.addAttribute("usuarioActual", usuarioBuscado);
        
        if(comentarios.size()>0)
        {
            model.addAttribute("comentarios", comentarios);
            var buscar = new Usuarios(comentarios.get(0).getCorreo(),"", "", "", "",null);
            var usuarios = usuariosService.getUsuarios(buscar);
            model.addAttribute("usuario", usuarios);
        }
        else
        {
            model.addAttribute("comentarios", comentarios);
            var usuarios = usuariosService.getUsuarioss(true);
            model.addAttribute("usuario", usuarios);
        }
        
        return "foro/index";
    }
    
    @GetMapping("/vermas/")
    public String verMasComs(Model model)
    {
        var comentarios = foroService.getForos();
        model.addAttribute("comentarios", comentarios);
        return "/foro/VerMasComentarios";
    }
    
    
    @PostMapping("/guardar")
    public String productoGuardar(Foro foro, HttpSession session) {   
        String correo = (String) session.getAttribute("correoGlobal");
        foro.setCorreo(correo);
        
        foroService.save(foro);
        return "redirect:/foro";
    }
    
    
    /*@GetMapping("/modificar/{idUsuarios}")*/
    @GetMapping("/modificar/")
    public String perfilModificar() {
        return "/foro/modifica";
    }
    /*public String categoriaModificar(Usuarios categoria, Model model) {
        categoria = usuariosService.getUsuarios(categoria);
        model.addAttribute("categoria", categoria);
        return "/categoria/modifica";
    }*/
    
    
    /*
    
    @GetMapping("/nuevo")
    public String categoriaNuevo(Usuarios categoria) {
        return "/categoria/modifica";
    }

    @Autowired
    private FireBaseStorageServiceImpl firebaseStorageService;
    
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
    }

    @GetMapping("/eliminar/{idUsuarios}")
    public String categoriaEliminar(Usuarios categoria) {
        categoriaService.delete(categoria);
        return "redirect:/categoria/listado";
    }*/

    
}