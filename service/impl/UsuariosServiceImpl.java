package Grupo2.Proyecto.service.impl;

import Grupo2.Proyecto.dao.UsuariosDao;
import Grupo2.Proyecto.domain.Usuarios;
import Grupo2.Proyecto.service.UsuariosService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

@Service
public class UsuariosServiceImpl implements UsuariosService {

    @Autowired
    private UsuariosDao usuarioDao;

    @Override
    @Transactional(readOnly = true)
    public List<Usuarios> getUsuarioss(boolean activos) {
        var lista = usuarioDao.findAll();
        return lista;
    }

    //Metodos CRUD
    
    @Override
    @Transactional(readOnly = true)
    public Usuarios getUsuarios(Usuarios usuario) {
        return usuarioDao.findById(usuario.getCorreo()).orElse(null);
    }

    @Override
    @Transactional
    public void save(Usuarios usuario) {
        usuarioDao.save(usuario);
    }

    @Override
    @Transactional
    public void delete(Usuarios usuario) {
        usuarioDao.delete(usuario);
    }

    @Override
    public Usuarios findByCorreo(String correo) {
        return usuarioDao.findByCorreo(correo);
    }


}
