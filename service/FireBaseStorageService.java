package Grupo2.Proyecto.service;

import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

@Service
public interface FireBaseStorageService {

    public String cargaImagen(MultipartFile archivoLocalCliente, String carpeta, Long id);

    //El BuketName es el <id_del_proyecto> + ".appspot.com#
    final String BucketName = "techshop-7645b.appspot.com";

    //Esta es la ruta básica de este proyecto Techshop
    final String rutaSuperiorStorage = "techshop";

    //Ubicación donde se encuentra el archivo de configuración Json
    final String rutaJsonFile = "FireBase";
    
    //El nombre del archivo Json
    final String archivoJsonFile = "techshop-7645b-firebase-adminsdk-sk3wu-f24a5c635e.json";
}

