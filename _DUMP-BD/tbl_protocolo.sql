CREATE TABLE `tbl_protocolo` (
  `PK_CodProtocolo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `protocolo` varchar(45) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PK_CodProtocolo`)
)