package Grupo2.Proyecto.controller;

import Grupo2.Proyecto.domain.Encargos;
import Grupo2.Proyecto.domain.Usuarios;
import Grupo2.Proyecto.service.EncargosService;
import Grupo2.Proyecto.service.MetodosPagUsuarioService;
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
@RequestMapping("/historial")
public class HistorialController {
    
    @Autowired
    private EncargosService encargosService;
    
    @Autowired
    private MetodosPagUsuarioService metodosPagUsuarioService;

    @GetMapping
    public String inicio(Model model, HttpSession session) {
        String correo = (String) session.getAttribute("correoGlobal");
         var encargos = encargosService.findByCorreo(correo);
         model.addAttribute("encargos", encargos);
         return "historialc/index";
    }
    
    @GetMapping("/viewmore/{codEncargo}")
    public String Vermas(Encargos encargo, Model model) {
         encargo = encargosService.getEncargo(encargo);
         model.addAttribute("encargo", encargo);
         return "historialc/vermas";
    }
    
}