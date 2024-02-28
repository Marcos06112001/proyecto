/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Grupo2.Proyecto.service.impl;

import Grupo2.Proyecto.dao.EncargosDao;
import Grupo2.Proyecto.domain.Encargos;
import Grupo2.Proyecto.service.EncargosService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author jjvar
 */

@Service
public class EncargosServiceImpl implements EncargosService{
     @Autowired
    private EncargosDao encargosDao;


    //Metodos CRUD
    
    @Override
    @Transactional(readOnly = true)
    public Encargos getEncargo(Encargos encargos) {
        return encargosDao.findById(encargos.getCodEncargo()).orElse(null);
    }

    @Override
    @Transactional
    public void save(Encargos encargos) {
        encargosDao.save(encargos);
    }

    @Override
    @Transactional
    public void delete(Encargos encargos) {
        encargosDao.delete(encargos);
    }

    @Override
    @Transactional(readOnly = true)
    public List<Encargos> findByCorreo(String correo) {
        return encargosDao.findByCorreo(correo);
    }
}
