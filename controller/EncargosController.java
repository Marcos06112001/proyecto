package Grupo2.Proyecto.controller;

import Grupo2.Proyecto.domain.Encargos;
import Grupo2.Proyecto.domain.Usuarios;
import Grupo2.Proyecto.service.EncargosService;
import Grupo2.Proyecto.service.UsuariosService;
import jakarta.servlet.http.HttpSession;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
@Slf4j
@RequestMapping("/encargos")
public class EncargosController {
    
    @Autowired
    private EncargosService encargoService;
    @Autowired
    private UsuariosService usuariosService;

    @GetMapping
    public String mostrarEncargo(Model model,HttpSession session) {
        String correo = (String) session.getAttribute("correoGlobal");
        var search = new Usuarios(correo,"", "", "", "",null);
        var usuarioBuscado = usuariosService.getUsuarios(search);
        
        
        model.addAttribute("usuarioActual", usuarioBuscado);
        return "encargos/index";
    }
    
    
    @GetMapping("/nuevo")
    public String encargoNuevo(Encargos encargos) {
        return "redirect:/encargo";
    }
    
    @GetMapping("/modificar/")
    public String perfilModificar() {
        return "/encargo/modifica";
    }
    
    @PostMapping("/guardar")
    public String productoGuardar(Encargos encargos, HttpSession session) {   
        String correo = (String) session.getAttribute("correoGlobal");
        encargos.setCorreo(correo);
        
        encargoService.save(encargos);
        return "redirect:/encargos";
    }
    
   /* 
    @PostMapping("/query2")
    public String consultaNombreTipo(@RequestParam(value = "nombre") String nombre,@RequestParam(value = "tipo") String tipo, Model model) 
    {
        if(tipo.equals("T"))
        {
            return "redirect:/encargo";
        }
        else
        {
            var productos = encargoService.JQPLConsultaNombreTipo(nombre, tipo);
            model.addAttribute("productos",productos);
             model.addAttribute("totalProductos",productos.size());
            model.addAttribute("nombre",nombre);
            model.addAttribute("tipo",tipo);
            return "/encargo/index";
        }
        
    }
    
    @GetMapping("/modificar/{idUsuarios}")*/
    
    
    
    
    
    /*public String categoriaModificar(Usuarios categoria, Model model) {
        categoria = usuariosService.getUsuarios(categoria);
        model.addAttribute("categoria", categoria);
        return "/categoria/modifica";
    }*/
    
    
    
    
    
/*
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

    */
    
}