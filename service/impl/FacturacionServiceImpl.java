/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Grupo2.Proyecto.service.impl;

import Grupo2.Proyecto.dao.FacturacionDao;
import Grupo2.Proyecto.domain.Facturacion;
import Grupo2.Proyecto.service.FacturacionService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author jjvar
 */
@Service
public class FacturacionServiceImpl implements FacturacionService {
    @Autowired
    private FacturacionDao facturacionDao;

    @Override
    @Transactional(readOnly = true)
    public List<Facturacion> getFacturaciones(boolean activos) {
        var lista = facturacionDao.findAll();
        return lista;
    }

    //Metodos CRUD
    
    @Override
    @Transactional(readOnly = true)
    public Facturacion getFacturacion(Facturacion facturacion) {
        return facturacionDao.findById(facturacion.toString()).orElse(null);
    }

    @Override
    @Transactional
    public void save(Facturacion facturacion) {
        facturacionDao.save(facturacion);
    }

    @Override
    @Transactional
    public void delete(Facturacion facturacion) {
        facturacionDao.delete(facturacion);
    }
    
}
