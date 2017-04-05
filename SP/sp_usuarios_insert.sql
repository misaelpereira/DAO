CREATE PROCEDURE `sp_usuarios_insert` (
pdeslogin VARCHAR(200),
pdessenha varchar(300)
)
BEGIN
	INSERT tab_usuario (deslogin, dessenha) values (pdeslogin, pdessenha);
    
    SELECT * FROM tab_usuario WHERE idusuario = LAST_INSERT_ID();
END
