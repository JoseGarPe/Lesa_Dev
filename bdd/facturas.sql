SELECT enc.date_invoice as fecha,
       enc.number as factura,
	   enc.company_id,
       enc.origin as pedido,
       enc.state,
       enc.doc_type,
       enc.vendor_display_name as nombre_clie,
       paci.name as paciente,
       vende.name as vendedor,
       alm.name as almacen,
       alm.id as id_almacen,
       deta.product_id,
       temp.name as descripcion,
       cat.name as linea,
       marca.name as marca,
       subcate.name as subcategoria,
       model.name as modelo,
       brandt.name as tip_marca,
       tipvta.name as tip_venta,
       INV1.weight as tamaño,
       tip_ele.name as tip_prod,
       mate.name as Material,
       style.name as estilo,
       deta.sequence as num_par,
       deta.quantity,
       deta.price_unit,
       CASE
       WHEN deta.x_studio_costo ISNULL THEN 0
       ELSE
       deta.x_studio_costo
       END as costo,
			 deta.price_subtotal as subtotal,
			 deta.discount_subtotal as descuento,
			 ((deta.price_subtotal_signed)*0.13) as Iva,
	     deta.price_subtotal_plus_discount-deta.discount_subtotal as total
FROM public.account_invoice as enc
LEFT JOIN public.account_invoice_line as deta on enc.id=deta.invoice_id
LEFT JOIN public.product_product AS INV1 on deta.product_id=INV1.id
LEFT JOIN public.product_template as TEMP  on INV1.product_tmpl_id=TEMP.id
LEFT JOIN public.res_salesman as vende on enc.salesman_invoice=vende.id
LEFT JOIN public.sale_order as ped on enc.origin=ped.name
LEFT JOIN public.res_partner as paci on ped.dependant_id=paci.id
LEFT JOIN public.stock_warehouse as alm on ped.warehouse_id=alm.id
LEFT JOIN public.product_category as cat on TEMP.categ_id=CAT.id
LEFT JOIN public.product_brand as marca on TEMP.brand_id=marca.id
LEFT JOIN public.product_subcategory as subcate on TEMP.subcat_id=subcate.id
LEFT JOIN public.product_model as model on TEMP.model_id=model.id
LEFT JOIN public.product_brand_type as brandt on TEMP.brand_type_id=brandt.id
LEFT JOIN public.product_sell_type as tipvta on TEMP.sell_type_id=tipvta.id
LEFT JOIN public.product_material as mate on TEMP.material_id=mate.id
LEFT JOIN public.product_style as style on TEMP.style_id=style.id
LEFT JOIN public.product_type as tip_ele on TEMP.sec_type=tip_ele.id
WHERE enc.state not in('cancel','draft') and enc.date_invoice>='2020/01/01' 
AND enc.type='out_invoice' AND enc.company_id =1
ORDER BY ENC.DATE_INVOICE,ENC.NUMBER,deta.sequence;


 SELECT ap.*,so.name AS referencia,aj.name as TipoDiario, rp.name as cliente  FROM account_payment ap 
 JOIN account_journal aj ON aj.id = ap.journal_id 
 JOIN sale_order so ON so.id=ap.sale_id
 JOIN res_partner rp ON rp.id = ap.partner_id
  WHERE  ap.payment_date = '2021-08-11' AND ap.stock_warehouse_id = 37 AND ap.state != 'cancelled';

