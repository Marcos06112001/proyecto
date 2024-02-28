/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Grupo2.Proyecto.service.impl;

import Grupo2.Proyecto.dao.ForoDao;
import Grupo2.Proyecto.domain.Foro;
import Grupo2.Proyecto.service.ForoService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author jjvar
 */
@Service
public class ForoServiceImpl implements ForoService {
    @Autowired
    private ForoDao foroDao;

    @Override
    @Transactional(readOnly = true)
    public List<Foro> getForos() {
        var lista = foroDao.findAll();
        for (Foro comentario : lista) {
            // Cargar el usuario asociado al comentario
            comentario.getUsuarios().getNombre();
        }
        return lista;
    }

    //Metodos CRUD
    
    @Override
    @Transactional(readOnly = true)
    public Foro getForo(Foro foro) {
        return foroDao.findById(foro.getCorreo()).orElse(null);
    }

    @Override
    @Transactional
    public void save(Foro foro) {
        foroDao.save(foro);
    }

    @Override
    @Transactional
    public void delete(Foro foro) {
        foroDao.delete(foro);
    }
}
