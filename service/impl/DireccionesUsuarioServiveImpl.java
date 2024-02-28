/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Grupo2.Proyecto.service.impl;

import Grupo2.Proyecto.dao.DireccionesUsuarioDao;
import Grupo2.Proyecto.domain.DireccionesUsuario;
import Grupo2.Proyecto.domain.DireccionesUsuario;
import Grupo2.Proyecto.domain.DireccionesUsuario;
import Grupo2.Proyecto.service.DireccionesUsuarioService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author jjvar
 */

@Service
public class DireccionesUsuarioServiveImpl implements DireccionesUsuarioService {
     @Autowired
    private DireccionesUsuarioDao direccionesUsuarioDao;

    @Override
    @Transactional(readOnly = true)
    public List<DireccionesUsuario> getDireccionesUsuarios(boolean activos) {
        var lista = direccionesUsuarioDao.findAll();
        return lista;
    }

    //Metodos CRUD
    
    @Override
    @Transactional(readOnly = true)
    public DireccionesUsuario getDireccionesUsuario(DireccionesUsuario direccionesusuario) {
        return direccionesUsuarioDao.findById(direccionesusuario.getCorreo()).orElse(null);
    }

    @Override
    @Transactional
    public void save(DireccionesUsuario direccionesusuario) {
        direccionesUsuarioDao.save(direccionesusuario);
    }

    @Override
    @Transactional
    public void delete(DireccionesUsuario direccionesusuario) {
        direccionesUsuarioDao.delete(direccionesusuario);
    }
    
}
