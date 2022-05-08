SELECT * FROM  productos;

SELECT * FROM  productos p, productos_sucursal ps, sucursales s 
where p.id=ps.producto_id and ps.sucursal_id=s.id order by p.id desc;

SELECT * FROM  productos p, productos_sucursal ps, sucursales s 
where p.id=ps.producto_id and ps.sucursal_id=s.id  and p.codigo='48'
order by p.id desc;


SELECT * FROM  productos p, productos_sucursal ps, sucursales s, categorias c 
where 
p.id=ps.producto_id 
and ps.sucursal_id=s.id 
and p.categoria_id=c.id 
and p.codigo='404'
order by p.id desc;

delete from productos_sucursal where created_At is not null;
select * from categorias;

select * from productos_sucursal;
desc productos_sucursal;
 drop table productos_sucursal;

insert into productos_sucursal  values (34, 1, "2022-04-22 23:30:51", "2022-04-22 23:30:51");

insert into productos_sucursal (producto_id, sucursal_id, updated_at,created_at) values (18, 1, "2022-04-22 23:30:51", "2022-04-22 23:30:51");


select * from sucursales;