package Grupo2.Proyecto.controller;

import Grupo2.Proyecto.domain.Encargos;
import Grupo2.Proyecto.domain.Foro;
import Grupo2.Proyecto.domain.MetodosPagUsuario;
import Grupo2.Proyecto.domain.Usuarios;
import Grupo2.Proyecto.service.EncargosService;
import Grupo2.Proyecto.service.ForoService;
import Grupo2.Proyecto.service.MetodosPagUsuarioService;
import Grupo2.Proyecto.service.UsuariosService;
import Grupo2.Proyecto.service.impl.FireBaseStorageServiceImpl;
import jakarta.servlet.http.HttpSession;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;

@Controller
@Slf4j
@RequestMapping("/pagos")
public class MetodosPagoController {

    @Autowired
    private MetodosPagUsuarioService metodosPagUsuarioService;

    @Autowired
    private EncargosService encargosService;

    @GetMapping("/listado")
    public String mostrarPerfil(@RequestParam("codEncargo") int codEncargo, Model model, HttpSession session) {
        session.setAttribute("idEncargo", codEncargo);
        String correo = (String) session.getAttribute("correoGlobal");
        var metodos = metodosPagUsuarioService.findByCorreo(correo);
        model.addAttribute("metodos", metodos);
        return "pagosm/index";
    }

    @PostMapping("/delete/{numtarjeta}")
    public String categoriaEliminar(MetodosPagUsuario mp) {
        metodosPagUsuarioService.delete(mp);
        return "redirect:/pagos/listado";
    }

    @PostMapping("/pay/{numtarjeta}")
    public String categoriaEliminar(MetodosPagUsuario mp, HttpSession session) {
        String correo = (String) session.getAttribute("correoGlobal");
        int idEncargo = (int) session.getAttribute("idEncargo");
        var list = encargosService.findByCorreo(correo);

        for (Encargos encargo : list) {
            if (encargo.getCodEncargo()== idEncargo) {
                encargo.setIndPagado("S");
                encargosService.save(encargo);
                break;
            }
        }
        return "redirect:/historial";
    }

    @ModelAttribute("getCardImage")
    public String getCardImage(@RequestParam String numTarjeta) {
        char primerDigito = numTarjeta.charAt(0);

        switch (primerDigito) {
            case '4':
                return "https://www.visa.co.cr/dam/VCOM/regional/lac/SPA/Default/affluent/infinite-1.jpg";
            case '5':
                return "https://cam.mastercard.com/content/dam/public/mastercardcom/lac/co/home/consumidores/encuentra-tu-tarjeta/tarjetas-de-credito/tarjeta-black/tarjeta-black-credito-1280x720.jpg";
            // Agrega más casos según sea necesario para otros rangos de números.
            default:
                return "https://www.visa.co.cr/dam/VCOM/regional/lac/SPA/Default/affluent/infinite-1.jpg";
        }
    }

    @ModelAttribute("getCardTypeLabel")
    public String getCardTypeLabel(@RequestParam String numTarjeta) {
        char primerDigito = numTarjeta.charAt(0);

        switch (primerDigito) {
            case '4':
                return "Visa";
            case '5':
                return "Mastercard";
            // Agrega más casos según sea necesario para otros rangos de números.
            default:
                return "Desconocido";
        }
    }

    @ModelAttribute("getEncryptedCardNumber")
    public String getEncryptedCardNumber(@RequestParam String numTarjeta) {
        // Implementa tu lógica de encriptación aquí. Por ejemplo, puedes ocultar todos los dígitos excepto los últimos 4.
        // Asegúrate de utilizar prácticas seguras para la encriptación de datos sensibles.
        return "************" + numTarjeta.substring(numTarjeta.length() - 4);
    }
}
