create view img_sus as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="SUS";
create view img_v as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="V";
create view img_art as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="ART";
create view img_prp as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="PRP";
create view img_adp as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="ADP";
create view img_cct as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="CCT";
create view img_adv as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="ADV";
create view img_ltr as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="LTR";
create view img_adj as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="ADJ";
create view img_itg as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="ITG";
create view img_prn as select a.palabra, b.imagen from etiquetas a, senhas b, et_se c where a.id=c.ide and b.id=c.ids and a.etiqueta="PRN";



