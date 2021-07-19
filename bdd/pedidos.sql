drop table if exists pedidos;
drop table if exists costos;

create temp table pedidos as
SELECT enc.id,enc.date_order,(enc.confirmation_date-INTERVAL '6 hours')as confirmation_date,enc.name,
 alm.name as almacen,
 alm.id as id_almacen,
 alm.company_id,
 enc.state AS ESTATUS_P,
rp.name as nombre_cliente,
enc.invoice_status,
enc.x_studio_venta,
enc.salesman as vendedor,
vendedor.name as vendio,
EXTRACT(YEAR FROM (AGE(now()::date,(rp.dob)::date)))as edad_clie,
rp.gender as Sexo_Contacto,
enc.amount_total AS valorTotal 
FROM public.sale_order as ENC	
LEFT JOIN public.res_partner as rp on ENC.partner_id=rp.id 
LEFT JOIN public.res_salesman as vendedor on enc.salesman=vendedor.id
LEFT JOIN public.stock_warehouse as alm on ENC.warehouse_id=alm.id
WHERE enc.state in('sale') AND enc.invoice_status IN ('no','to invoice')
and enc.company_id =1 and (enc.confirmation_date-INTERVAL '6 hours')>='2021-01-01 00:00:00';

--WHERE enc.state in('sale')
--and enc.company_id =1 and (enc.confirmation_date-INTERVAL '6 hours')>='2021-01-01 00:00:00';

create temp table costos as
select company_id,product_id,avg(cost)as costo 
from product_price_history 

group by company_id,product_id;


select ped.id,ped.date_order,ped.confirmation_date,ped.name,ped.almacen,ped.id_almacen,
ped.company_id,ped.estatus_p,ped.nombre_cliente,ped.invoice_status,ped.x_studio_venta,
ped.vendedor,ped.vendio,ped.cve_art,ped.decripcion,ped.marca,ped.category,ped.forma,ped.edad_clie,
ped.sexo_contacto,ped.genero_aro,ped.product_uom_qty,
ped.precio,co.costo,ped.subtotal,ped.iva,ped.descuento,ped.total
from pedidos as ped
left join costos as co on ped.cve_art=co.product_id
order by ped.confirmation_date,ped.name;