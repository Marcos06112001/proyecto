/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Grupo2.Proyecto.service.impl;


import Grupo2.Proyecto.dao.MetodosPagUsuarioDao;
import Grupo2.Proyecto.domain.MetodosPagUsuario;
import Grupo2.Proyecto.service.MetodosPagUsuarioService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author jjvar
 */
@Service
public class MetodosPagUsuarioServiceImpl implements MetodosPagUsuarioService {
    @Autowired
    private MetodosPagUsuarioDao metodosPagUsuarioDao;

    
     @Override
    @Transactional(readOnly = true)
    public List<MetodosPagUsuario> findByCorreo(String correo) {
        return metodosPagUsuarioDao.findByCorreo(correo);
    }
    
    @Override
    @Transactional(readOnly = true)
    public List<MetodosPagUsuario> getMetodosPagUsuarios(boolean activos) {
        var lista = metodosPagUsuarioDao.findAll();
        return lista;
    }

    //Metodos CRUD
    
    @Override
    @Transactional(readOnly = true)
    public MetodosPagUsuario getMetodosPagUsuario(MetodosPagUsuario metodosPagUsuario) {
        return metodosPagUsuarioDao.findById(metodosPagUsuario.getCorreo()).orElse(null);
    }

    @Override
    @Transactional
    public void save(MetodosPagUsuario metodosPagUsuario) {
        metodosPagUsuarioDao.save(metodosPagUsuario);
    }

    @Override
    @Transactional
    public void delete(MetodosPagUsuario metodosPagUsuario) {
        metodosPagUsuarioDao.delete(metodosPagUsuario);
    }
}
