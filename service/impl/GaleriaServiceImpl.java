/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Grupo2.Proyecto.service.impl;

import Grupo2.Proyecto.dao.GaleriaDao;
import Grupo2.Proyecto.domain.Galeria;
import Grupo2.Proyecto.service.GaleriaService;
import java.util.Collections;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author jjvar
 */
@Service
public class GaleriaServiceImpl implements GaleriaService {
    @Autowired
    private GaleriaDao galeriaDao;

    @Override
    @Transactional(readOnly = true)
    public List<Galeria> getGalerias() {
        
       
            var lista = galeriaDao.findAll();
            return lista;
       
        
    }

    //Metodos CRUD
    
    @Override
    @Transactional(readOnly = true)
    public Galeria getGaleria(Galeria galeria) {
        return galeriaDao.findById(galeria.getCodDiseno()).orElse(null);
    }

    @Override
    @Transactional
    public void save(Galeria galeria) {
        galeriaDao.save(galeria);
    }

    @Override
    @Transactional
    public void delete(Galeria galeria) {
        galeriaDao.delete(galeria);
    }

    @Override
    @Transactional(readOnly=true)
    public List<Galeria>JQPLConsultaNombreTipo(String nombre, String tipo)
    {
        return galeriaDao.JQPLConsultaNombreTipo(nombre, tipo);
    }
}
