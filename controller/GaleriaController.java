package Grupo2.Proyecto.controller;

import Grupo2.Proyecto.domain.Usuarios;
import Grupo2.Proyecto.service.GaleriaService;
import Grupo2.Proyecto.service.UsuariosService;
import Grupo2.Proyecto.service.impl.FireBaseStorageServiceImpl;
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
@RequestMapping("/galeria")
public class GaleriaController {
    
    @Autowired
    private GaleriaService galeriaService;

    @GetMapping
    public String mostrarGaleria(Model model) {
        var productos = galeriaService.getGalerias();
        model.addAttribute("productos", productos);
        return "galeria/index";
    }
    
    @PostMapping("/query2")
    public String consultaNombreTipo(@RequestParam(value = "nombre") String nombre,@RequestParam(value = "tipo") String tipo, Model model) 
    {
        if(tipo.equals("T"))
        {
            return "redirect:/galeria";
        }
        else
        {
            var productos = galeriaService.JQPLConsultaNombreTipo(nombre, tipo);
            model.addAttribute("productos",productos);
             model.addAttribute("totalProductos",productos.size());
            model.addAttribute("nombre",nombre);
            model.addAttribute("tipo",tipo);
            return "/galeria/index";
        }
        
    }
    
    /*@GetMapping("/modificar/{idUsuarios}")*/
    @GetMapping("/modificar/")
    public String perfilModificar() {
        return "/galeria/modifica";
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