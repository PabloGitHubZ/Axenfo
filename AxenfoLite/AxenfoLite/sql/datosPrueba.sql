-- Datos para pruebas

INSERT INTO usuarios (usuario, clave)
    VALUES ('admin', 'axenfo');

INSERT INTO controladoras (id, nombre, ip, numero_serie)
    VALUES ('1', 'controladora santiago', '25.24.55.44', '2342343234AAA');
INSERT INTO controladoras (id, nombre, ip, numero_serie)
    VALUES ('2', 'controladora vigo', '34.55.1.3', '2342343234VVC');
INSERT INTO controladoras (id, nombre, ip, numero_serie)
    VALUES ('3', 'controladora a coruña', '25.4.155.22', '2342343444GDF');
INSERT INTO controladoras (id, nombre, ip, numero_serie)
    VALUES ('4', 'controladora pontevedra', '233.224.45.5', '2342343234CVC');
INSERT INTO controladoras (id, nombre, ip, numero_serie)
    VALUES ('5', 'controladora ourense', '233.224.45.6', '2342343234YJY');
INSERT INTO controladoras (id, nombre, ip, numero_serie)
    VALUES ('6', 'controladora lugo', '233.224.45.7', '2342343234YYT');

INSERT INTO olts (id, nombre, ip, marca, modelo, numero_serie, numero_tarjetas)
    VALUES ('1', 'olt santiago', '123.33.2.10' , 'huawei', '4333Z' , '2343A35567F', '5');
INSERT INTO olts (id, nombre, ip, marca, modelo, numero_serie, numero_tarjetas)
    VALUES ('2', 'olt vigo', '123.33.2.11' , 'huawei', '4333Z' , '2343A38787F', '7');
INSERT INTO olts (id, nombre, ip, marca, modelo, numero_serie, numero_tarjetas)
    VALUES ('3', 'olt a coruña', '123.33.2.12' , 'huawei', '4333Z' , '3342A34324F', '6');
INSERT INTO olts (id, nombre, ip, marca, modelo, numero_serie, numero_tarjetas)
    VALUES ('4', 'olt pontevedra', '123.33.2.13' , 'nokia', '7Z45' , '2343AFSAG', '3');
INSERT INTO olts (id, nombre, ip, marca, modelo, numero_serie, numero_tarjetas)
    VALUES ('5', 'olt ourense', '123.33.2.14' , 'huawei', '4333Z' , '2343A34324F', '5');
INSERT INTO olts (id, nombre, ip, marca, modelo, numero_serie, numero_tarjetas)
    VALUES ('6', 'olt lugo', '123.33.2.15' , 'nokia', '7Z45' , '2343AASFDF', '4');

INSERT INTO switches (id, nombre, ip, marca, modelo, numero_serie)
  VALUES ('1', 'switch santiago', '44.34.123.2' , 'cisco', '34Z43', '4618811AB');
INSERT INTO switches (id, nombre, ip, marca, modelo, numero_serie)
  VALUES ('2', 'switch vigo', '44.34.123.3' , 'cisco', '34Z43', '4618811ZZ');
INSERT INTO switches (id, nombre, ip, marca, modelo, numero_serie)
  VALUES ('3', 'switch a coruña', '44.34.123.4' , 'cisco', '34Z43', '4618811ZX');
INSERT INTO switches (id, nombre, ip, marca, modelo, numero_serie)
  VALUES ('4', 'switch pontevedra', '44.34.123.5' , 'cisco', '34Z43', '4618811CV');
INSERT INTO switches (id, nombre, ip, marca, modelo, numero_serie)
  VALUES ('5', 'switch ourense', '44.34.123.6' , 'cisco', '34Z43', '4618811TR');
INSERT INTO switches (id, nombre, ip, marca, modelo, numero_serie)
  VALUES ('6', 'switch lugo', '44.34.123.7' , 'cisco', '34Z43', '4618811RE');

INSERT INTO nodos (id, nombre, ubicacion, direccion_fisica, latitud, longitud, controladora, switch, olt, estado, pendiente)
  VALUES ('1', 'Nodo Santiago', 'Santiago de Compostela' , 'rua castelao 12' , '42.879378', '-8.551017', '1' , '1' , '1', 'Funcionando', 'Nada Pendiente');
INSERT INTO nodos (id, nombre, ubicacion, direccion_fisica, latitud, longitud, controladora, switch, olt, estado, pendiente)
  VALUES ('2', 'Nodo Vigo', 'Vigo' , 'rua emilia pardo bazan 3' , '42.232302', '-8.726606', '2' , '2' , '2', 'En construcción', 'Instalación Equipos');
INSERT INTO nodos (id, nombre, ubicacion, direccion_fisica, latitud, longitud, controladora, switch, olt, estado, pendiente)
  VALUES ('3', 'Nodo A Coruña', 'A Coruña' , 'rua do faro 44' , '43.376055', '-8.437614', '3' , '3' , '3', 'Funcionando', 'Nada Pendiente');
INSERT INTO nodos (id, nombre, ubicacion, direccion_fisica, latitud, longitud, controladora, switch, olt, estado, pendiente)
  VALUES ('4', 'Nodo Pontevedra', 'Pontevedra' , 'rua valle inclán 5' , '42.433705', '-8.648891', '4' , '4' , '4', 'Funcionando', 'Nada Pendiente');
INSERT INTO nodos (id, nombre, ubicacion, direccion_fisica, latitud, longitud, controladora, switch, olt, estado, pendiente)
  VALUES ('5', 'Nodo Ourense', 'Ourense' , 'plaza do camiño s/n' , '42.342239', '-7.866024', '5' , '5' , '5', 'Funcionando', 'Nada Pendiente');
INSERT INTO nodos (id, nombre, ubicacion, direccion_fisica, latitud, longitud, controladora, switch, olt, estado, pendiente)
  VALUES ('6', 'Nodo Lugo', 'Lugo' , 'avda da muralla 5' , '43.011397', '-7.560246', '6' , '6' , '6', 'En construcción', 'Pruebas de red');


INSERT INTO incidencias (nodo, fecha_inicio, fecha_cierre, tipo, descripcion, estado)
  VALUES ('5', '2021-12-01', '2021-12-01' , 'CPD' , 'Fallo eléctrico nodo Ourense: recuperado automático', 'Cerrado');
INSERT INTO incidencias (nodo, fecha_inicio, fecha_cierre, tipo, descripcion, estado)
  VALUES ('3', '2021-12-08', '2021-12-09' , 'CPD' , 'Fallo temperatura nodo A Coruña: recuperado reinicio equipos', 'Cerrado');
INSERT INTO incidencias (nodo, fecha_inicio, fecha_cierre, tipo, descripcion, estado)
  VALUES ('1', '2021-12-09', '2021-12-10' , 'Planta Externa' , 'Fallo potencia fibra Santiago: recuperado actuación CableGal', 'Cerrado');
