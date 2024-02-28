package Grupo2.Proyecto.controller;

import Grupo2.Proyecto.domain.Usuarios;
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
@RequestMapping("/menuprincipal")
public class MenuController {
    
    @Autowired
    private UsuariosService usuarioService;

    @GetMapping
    public String inicio(Model model) {
         return "menuprincipal/index";
    }
    
}